<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Asfar App - Test</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/NCT-Emblem.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-white p-3 shadow-sm">
      <div class="container-fluid">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <img src="{{asset('assets/img/logo.png')}}" height="65px" alt="logo">
          </a>
    
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2" aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-ex-2">
          <div class="navbar-nav mx-auto" style="font-size: 18px">
            <a class="nav-item nav-link mx-3 px-3">Dashboard</a>
            <a class="nav-item nav-link mx-3 px-3">Kelola Kuesioner</a>
            <a class="nav-item nav-link mx-3 px-3">Kuesioner</a>
            <a class="nav-item nav-link mx-3 px-3">Tentang Kami</a>
            <a class="nav-item nav-link mx-3 px-3">Profile</a>
            {{-- <a class="nav-item nav-link mx-3 px-3 @if(Route::is('dashboard.index')) bg-success rounded-pill text-white @endif" href="{{route('dashboard.index')}}">Halaman Utama</a>
            <a class="nav-item nav-link mx-3 px-3 @if(Route::is('ulasan.index')) bg-success rounded-pill text-white @endif" href="{{route('ulasan.index')}}">Ulasan</a>
            <a class="nav-item nav-link mx-3 px-3 @if(Route::is('about.index')) bg-success rounded-pill text-white @endif" href="{{route('about.index')}}">Tentang Kami</a> --}}
          </div>
        </div>
        
      </div>
      </nav>

      <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
        <!-- Menu -->

        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          {{--  --}}

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            
            <div class="text-center p-3"><h5>&copy; Copyright 2024</h5></div>
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
