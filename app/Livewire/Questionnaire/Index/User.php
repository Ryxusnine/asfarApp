<?php

namespace App\Livewire\Questionnaire\Index;

use Livewire\Component;

class User extends Component
{
    public $questionnaires;

    public function mount($questionnaires)
    {
        $questionnaires->loadMissing('questions');

        $this->questionnaires = $questionnaires;
    }

    public function render()
    {
        return view('livewire.questionnaire.index.user', [
            'questionnaires' => $this->questionnaires,
        ]);
    }
}
