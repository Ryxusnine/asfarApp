<?php

namespace App\Livewire\Questionnaire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Kuesioner')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.questionnaire.index');
    }
}
