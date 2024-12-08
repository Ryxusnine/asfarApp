<!doctype html>

<html
    class="light-style layout-wide"
    data-theme="theme-default"
    data-sneat-path="{{ asset('templates/sneat') }}"
    data-style="light"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="ltr"
>

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title', 'Beranda') | {{ env('APP_NAME') }}</title>

    <meta
        name="description"
        content="Aplikasi Kuesioner UMKM - Universitas Islam Makassar"
    />

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <!-- Favicon -->
    <link
        type="image/x-icon"
        href="{{ asset('UIM/favicon.png') }}"
        rel="icon"
    />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com"
        rel="preconnect"
    />
    <link
        href="https://fonts.gstatic.com"
        rel="preconnect"
        crossorigin
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <link
        href="{{ asset('templates/sneat/vendor/fonts/boxicons.css') }}"
        rel="stylesheet"
    />

    <!-- Core CSS -->
    <link
        class="template-customizer-core-css"
        href="{{ asset('templates/sneat/vendor/css/core.css') }}"
        rel="stylesheet"
    />
    <link
        class="template-customizer-theme-css"
        href="{{ asset('templates/sneat/vendor/css/theme-default.css') }}"
        rel="stylesheet"
    />

    <!-- Vendors CSS -->
    <link
        href="{{ asset('templates/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
        rel="stylesheet"
    />

    <!-- Page CSS -->
    @stack('styles.page')

    <!-- Helpers -->
    <script src="{{ asset('templates/sneat/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('templates/sneat/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->
    @yield('content')
    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js sneat/vendor/js/core.js -->

    <script src="{{ asset('templates/sneat/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('templates/sneat/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('templates/sneat/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('templates/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('templates/sneat/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    @stack('scripts.vendor')

    <!-- Main JS -->
    <script src="{{ asset('templates/sneat/js/main.js') }}"></script>

    <!-- Page JS -->
    @stack('scripts.page')
</body>

</html>
