<?php

namespace App\Livewire\Questionnaire\Answer;

use App\Models\Answer;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public $questionnaire;

    public $answers = [];

    public $isSubmitted = false;

    public $rules = [
        'answers.*' => 'required',
    ];

    public function mount($id)
    {
        $this->questionnaire = Questionnaire::with('questions.answer')->findOrFail($id);

        foreach ($this->questionnaire->questions as $question) {
            $this->answers[$question->id] = $question->answer->answer ?? null;
        }

        if (! in_array(null, array_values($this->answers))) {
            $this->isSubmitted = true;
        }
    }

    public function save()
    {
        DB::beginTransaction();

        $this->validate();

        try {
            foreach ($this->answers as $questionId => $answer) {
                Answer::updateOrCreate([
                    'questionnaire_id' => $this->questionnaire->id,
                    'question_id' => $questionId,
                    'user_id' => auth()->user()->id,
                ], [
                    'answer' => $answer,
                ]);
            }

            DB::commit();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil menambahkan kuisioner. Terima kasih telah berpartisipasi.',
            ]);

            return redirect()->route('questionnaire.index');
        } catch (\Exception $e) {
            session()->flash('message', [
                'color' => 'danger',
                'title' => 'Maaf, terjadi kesalahan!',
                'sub-title' => 'Gagal menjawab kuisioner.',
            ]);

            DB::rollBack();

            return;
        }
    }

    public function render()
    {
        $title = 'Kuesioner: '.$this->questionnaire->title;

        return view('livewire.questionnaire.answer.show', [
            'current' => $this->questionnaire,
        ])->title($title);
    }
}
