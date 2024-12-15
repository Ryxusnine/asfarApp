<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] #[Title('Register')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }
}; ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card px-sm-6 px-0">
                <div class="card-body">
                    @if (session('status'))
                        <div
                            class="alert alert-danger alert-dismissible"
                            role="alert"
                        >
                            {{ session('status') }}

                            <button
                                class="btn-close"
                                data-bs-dismiss="alert"
                                type="button"
                                aria-label="Close"
                            ></button>
                        </div>
                    @endif

                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <img
                            src="{{ asset('UIM/logo.png') }}"
                            alt="logo-app"
                            width="150"
                        >
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Selamat Datang! 👋</h4>
                    <p class="mb-6">Silahkan masukkan data diri Anda untuk membuat akun baru.</p>

                    <form
                        class="mb-6"
                        id="formAuthentication"
                        wire:submit="register"
                    >
                        <div class="mb-6">
                            <label
                                class="form-label"
                                for="name"
                            >Nama Lengkap</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                type="name"
                                placeholder="masukkan nama lengkap..."
                                autofocus
                                wire:model="name"
                                required
                                autocomplete="name"
                            />
                            @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label
                                class="form-label"
                                for="email"
                            >Surel</label>
                            <input
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="masukkkan surel..."
                                autofocus
                                wire:model="email"
                                required
                                autocomplete="username"
                            />
                            @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-password-toggle mb-6">
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
                                    autocomplete="new-password"
                                    placeholder="masukkan kata sandi..."
                                />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-password-toggle mb-6">
                            <label
                                class="form-label"
                                for="password_confirmation"
                            >Konfirmasi Kata Sandi</label>
                            <div class="input-group input-group-merge">
                                <input
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    aria-describedby="password"
                                    wire:model="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="masukan konfirmasi kata sandi..."
                                />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="d-flex justify-content-between mt-8">
                                <div class="form-check mb-0 ms-2">
                                    <input
                                        class="form-check-input"
                                        id="remember-me"
                                        name="remember"
                                        type="checkbox"
                                        wire:model="remember"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="remember-me"
                                    > Ingat akun? </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button
                                class="btn btn-primary d-grid w-100"
                                type="submit"
                            >Daftar</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('login') }}">
                            <span>Masuk.</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
