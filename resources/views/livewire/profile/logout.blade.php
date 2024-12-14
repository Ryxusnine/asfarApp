<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="card mb-5">
    <div class="card-header">
        <h5 class="mb-1"><b>{{ __('Logout') }}</b></h5>
        Klik tombol di bawah ini untuk keluar dari aplikasi.
    </div>

    <div class="card-body">
        <button
            class="btn btn-danger"
            wire:click="logout"
            wire:loading.attr="disabled"
        >{{ __('Logout') }}</button>
    </div>
</div>
