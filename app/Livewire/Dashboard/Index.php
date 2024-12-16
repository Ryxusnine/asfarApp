<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Beranda')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
