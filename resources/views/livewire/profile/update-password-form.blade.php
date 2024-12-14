<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<div class="card mb-5">
    <div class="card-header">
        <h5 class="mb-1"><b>{{ __('Update Password') }}</b></h5>
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </div>

    <form wire:submit="updatePassword">
        <div class="card-body">
            <div class="form-password-toggle mb-5">
                <label
                    class="form-label"
                    for="update_password_current_password"
                >{{ __('Current Password') }}</label>

                <div class="input-group input-group-merge">
                    <input
                        class="form-control @error('current_password') is-invalid @enderror"
                        id="update_password_current_password"
                        name="current_password"
                        type="password"
                        aria-describedby="current_password"
                        wire:model="current_password"
                        required
                        autocomplete="current-password"
                        placeholder="masukkan kata sandi sekarang..."
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('current_password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="form-password-toggle mb-5">
                <label
                    class="form-label"
                    for="update_password_password"
                >{{ __('New Password') }}</label>

                <div class="input-group input-group-merge">
                    <input
                        class="form-control @error('password') is-invalid @enderror"
                        id="update_password_password"
                        name="password"
                        type="password"
                        aria-describedby="password"
                        wire:model="password"
                        required
                        autocomplete="new-password"
                        placeholder="masukkan kata sandi baru..."
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="form-password-toggle mb-5">
                <label
                    class="form-label"
                    for="update_password_password_confirmation"
                >{{ __('New Password') }}</label>

                <div class="input-group input-group-merge">
                    <input
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="update_password_password_confirmation"
                        name="password_confirmation"
                        type="password"
                        aria-describedby="password"
                        wire:model="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="masukkan konfirmasi kata sandi baru..."
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password_confirmation')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer d-flex align-items-center">
            <button
                class="btn btn-primary"
                type="submit"
            >{{ __('Save') }}</button>

            <x-action-message
                class="ms-3"
                on="password-updated"
            >
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
