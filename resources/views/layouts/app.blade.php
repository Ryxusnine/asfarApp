@extends('layouts.base')

@section('title', $title ?? '')

@push('styles.page')
    <link
        href="{{ asset('templates/sneat/vendor/css/pages/page-auth.css') }}"
        rel="stylesheet"
    />
    <style>
        .flex-wrapper {
            display: flex;
            flex-direction: column;
        }

        .flex-content {
            flex: 1;
        }

        .container {
            padding: 2rem 10rem !important;
        }
    </style>
@endpush

@section('content')
    <nav class="navbar navbar-example navbar-expand-lg navbar-light sticky-top bg-white p-3 shadow-sm">
        <div class="container-fluid">
            <div class="app-brand demo">
                <a
                    class="app-brand-link"
                    href="index.html"
                >
                    <img
                        src="{{ asset('UIM/logo.png') }}"
                        alt="logo"
                        height="65px"
                    >
                </a>

                <a
                    class="layout-menu-toggle menu-link text-large d-block d-xl-none ms-auto"
                    href="javascript:void(0);"
                >
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>
            <button
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-ex-2"
                type="button"
                aria-controls="navbar-ex-2"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="navbar-collapse collapse"
                id="navbar-ex-2"
            >
                <div
                    class="navbar-nav mx-auto"
                    style="font-size: 18px"
                >
                    <a
                        class="nav-item nav-link @if (Route::is('dashboard')) bg-success rounded-pill text-white @endif mx-3 px-3"
                        href="{{ route('dashboard') }}"
                    >
                        Beranda
                    </a>

                    <a
                        class="nav-item nav-link @if (Route::is('questionnaire*')) bg-success rounded-pill text-white @endif mx-3 px-3"
                        href="{{ route('questionnaire.index') }}"
                    >
                        Kuisioner
                    </a>

                    <a
                        class="nav-item nav-link @if (Route::is('about')) bg-success rounded-pill text-white @endif mx-3 px-3"
                        href="{{ route('about') }}"
                    >
                        Tentang Kami
                    </a>

                    <a
                        class="nav-item nav-link @if (Route::is('profile')) bg-success rounded-pill text-white @endif mx-3 px-3"
                        href="{{ route('profile') }}"
                    >
                        Profil
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="layout-wrapper layout-content-navbar layout-without-menu flex-wrapper">
        <div class="layout-container flex-content">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content">
                    <!-- Content -->
                    {{ $slot }}
                    <!-- / Content -->
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Footer -->
        <div class="p-3 text-center">
            <small>&copy; Copyright {{ date('Y') }}</small>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
