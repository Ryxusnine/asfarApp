<?php

namespace App\Livewire\Questionnaire;

use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Sunting Kuesioner')]
class Edit extends Component
{
    use WithFileUploads;

    public $currentQuestionnaire;

    public $namaUmkm = '';

    public $judul = '';

    public $deskripsi = '';

    public $alamat = '';

    public $gambar;

    public $pertanyaan = [
        [
            'urutan' => 1,
            'pertanyaan' => '',
            'gambar' => null,
        ],
    ];

    public function addQuestion()
    {
        $this->pertanyaan[] = [
            'urutan' => count($this->pertanyaan) + 1,
            'pertanyaan' => '',
            'gambar' => null,
        ];
    }

    public function removeQuestion($index)
    {
        unset($this->pertanyaan[$index]);
        $this->pertanyaan = array_values($this->pertanyaan);

        if (count($this->pertanyaan) < 1) {
            $this->addQuestion();
        }
    }

    public $rules = [
        'namaUmkm' => ['required'],
        'judul' => ['required'],
        'deskripsi' => ['nullable'],
        'alamat' => ['nullable'],
        'gambar' => ['nullable', 'image', 'max:1024'],

        'pertanyaan' => ['required', 'array', 'min:1'],
        'pertanyaan.*.urutan' => ['required', 'integer'],
        'pertanyaan.*.pertanyaan' => ['required'],
        'pertanyaan.*.gambar' => ['nullable', 'image', 'max:1024'],
    ];

    public function mount($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        $this->currentQuestionnaire = $questionnaire;

        $this->namaUmkm = $questionnaire->shop_name;
        $this->judul = $questionnaire->title;
        $this->deskripsi = $questionnaire->description;
        $this->alamat = $questionnaire->address;
        $this->gambar = null;

        $this->pertanyaan = $questionnaire->questions->map(function ($question) {
            return [
                'urutan' => $question->order,
                'pertanyaan' => $question->question,
                'gambar' => $question->image ? $question->image : false,
            ];
        })->toArray();
    }

    public function save()
    {
        $this->pertanyaan = collect($this->pertanyaan)
            ->map(function ($question) {
                if (is_string($question['gambar'])) {
                    $question['gambar'] = null;
                }

                return $question;
            })
            ->sortBy('urutan')
            ->values()
            ->toArray();

        $this->validate();

        DB::beginTransaction();

        try {
            $this->currentQuestionnaire->update([
                'shop_name' => $this->namaUmkm,
                'title' => $this->judul,
                'description' => $this->deskripsi,
                'address' => $this->alamat,
            ]);

            if ($this->gambar) {
                $oldImagePath = $this->currentQuestionnaire->image;
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }

                $this->currentQuestionnaire->update([
                    'image' => $this->gambar->store('images/kuisioner', 'public'),
                ]);
            }

            foreach ($this->currentQuestionnaire->questions as $question) {
                if ($question->image && Storage::disk('public')->exists($question->image)) {
                    Storage::disk('public')->delete($question->image);
                }
                $question->delete();
            }

            foreach ($this->pertanyaan as $question) {
                $this->currentQuestionnaire->questions()->create([
                    'question' => $question['pertanyaan'],
                    'question_type' => 'options',
                    'options' => [
                        5 => 'Sangat Suka',
                        4 => 'Suka',
                        3 => 'Netral',
                        2 => 'Tidak Suka',
                        1 => 'Sangat Tidak Suka',
                    ],
                    'image' => $question['gambar'] ? $question['gambar']->store('images/pertanyaan', 'public') : null,
                    'order' => $question['urutan'],
                ]);
            }

            DB::commit();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil menyunting kuisioner.',
            ]);

            return redirect()->route('questionnaire.index');
        } catch (\Exception $e) {
            session()->flash('message', [
                'color' => 'danger',
                'title' => 'Gagal!',
                'sub-title' => 'Gagal menyunting kuisioner.',
            ]);

            DB::rollBack();

            return;
        }
    }

    public function render()
    {
        return view('livewire.questionnaire.edit', [
            'current' => $this->currentQuestionnaire,
        ]);
    }
}
