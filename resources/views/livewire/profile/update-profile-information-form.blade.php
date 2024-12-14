<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<div class="card mb-5">
    <div class="card-header">
        <h5 class="mb-1"><b>{{ __('Profile Information') }}</b></h5>
        {{ __("Update your account's profile information and email address.") }}
    </div>

    <form wire:submit="updateProfileInformation">
        <div class="card-body">
            <div class="mb-5">
                <label
                    class="form-label"
                    for="name"
                >Nama Lengkap</label>
                <input
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="masukkan nama lengkap..."
                    autofocus
                    wire:model="name"
                    required
                />
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-5">
                <label
                    class="form-label"
                    for="email"
                >Surel</label>
                <input
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="masukkan surel..."
                    autofocus
                    wire:model="email"
                    required
                />
                @error('email')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="card-footer d-flex align-items-center">
            <button
                class="btn btn-primary"
                type="submit"
            >{{ __('Save') }}</button>

            <x-action-message
                class="ms-3"
                on="profile-updated"
            >
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
