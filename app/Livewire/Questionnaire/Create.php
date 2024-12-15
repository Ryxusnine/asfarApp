<?php

namespace App\Livewire\Questionnaire;

use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Tambah Kuesioner')]
class Create extends Component
{
    use WithFileUploads;

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

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $questionnaire = Questionnaire::create([
                'shop_name' => $this->namaUmkm,
                'title' => $this->judul,
                'description' => $this->deskripsi,
                'address' => $this->alamat,
                'image' => $this->gambar ? $this->gambar->store('images/kuisioner', 'public') : null,
            ]);

            foreach ($this->pertanyaan as $question) {
                $questionnaire->questions()->create([
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
                'sub-title' => 'Berhasil menambahkan kuisioner.',
            ]);

            return redirect()->route('questionnaire.index');
        } catch (\Exception $e) {
            session()->flash('message', [
                'color' => 'danger',
                'title' => 'Gagal!',
                'sub-title' => 'Gagal menambahkan kuisioner.',
            ]);

            DB::rollBack();

            return;
        }
    }

    public function render()
    {
        return view('livewire.questionnaire.create');
    }
}
