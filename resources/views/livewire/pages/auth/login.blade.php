<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] #[Title('Login')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $route = auth()->user()->role == 'admin' ? 'dashboard' : 'kuesioner.umkm.index';
        $this->redirectIntended(default: route($route), navigate: true);
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
                    <p class="mb-6">Silahkan masukkan data akun Anda untuk melanjutkan.</p>

                    <form
                        class="mb-6"
                        id="formAuthentication"
                        wire:submit="login"
                    >
                        <div class="mb-6">
                            <label
                                class="form-label"
                                for="email"
                            >Email</label>
                            <input
                                class="form-control @error('form.email') is-invalid @enderror"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Enter your email"
                                autofocus
                                wire:model="form.email"
                                required
                                autocomplete="username"
                            />
                            @error('form.email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-password-toggle mb-6">
                            <label
                                class="form-label"
                                for="password"
                            >Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                    class="form-control @error('form.password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    type="password"
                                    aria-describedby="password"
                                    wire:model="form.password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="*******"
                                />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('form.password')
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
                                        wire:model="form.remember"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="remember-me"
                                    > Remember Me </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button
                                class="btn btn-primary d-grid w-100"
                                type="submit"
                            >Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="{{ route('register') }}">
                            <span>Buat akun baru.</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
