<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="card border-danger mb-5 border">
    <div class="card-header">
        <h5 class="text-danger mb-1"><b>{{ __('Delete Account') }}</b></h5>
        Setelah akun dihapus, seluruh sumber dan datanya akan dihapus secara permanen. <br> Sebelum menghapus akun ini,
        harap unduh data atau informasi apapun yang berkaitan dengan akun ini yang ingin disimpan.
    </div>

    <div
        class="card-body"
        x-data="{ openDelete: false }"
    >
        <button
            class="btn btn-danger"
            x-on:click="openDelete = true"
        >Konfirmasi</button>

        <div
            class="card border-danger mt-3 border"
            x-show="openDelete"
            focusable
        >
            <form wire:submit="deleteUser">
                <div class="card-body">
                    <h5 class="text-danger mb-1"><b>{{ __('Are you sure you want to delete your account?') }}</b></h5>
                    <span>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</span>

                    <div class="form-password-toggle my-6">
                        <label
                            class="form-label"
                            for="password"
                        >Kata Sandi</label>

                        <div class="input-group input-group-merge">
                            <input
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                type="password"
                                aria-describedby="password"
                                wire:model="password"
                                required
                                autocomplete="current-password"
                                placeholder="masukkan kata sandi..."
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        x-on:click="openDelete = false"
                    >
                        {{ __('Cancel') }}
                    </button>

                    <button
                        class="btn btn-danger"
                        type="submit"
                    >{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
