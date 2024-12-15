<?php

namespace App\Livewire\Questionnaire;

use App\Models\Questionnaire;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Kuesioner')]
class Index extends Component
{
    #[Computed]
    public function questionnaires()
    {
        return Questionnaire::all();
    }

    public function render()
    {
        return view('livewire.questionnaire.index', [
            'questionnaires' => $this->questionnaires,
        ]);
    }
}
