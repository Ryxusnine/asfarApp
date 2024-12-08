@extends('layouts.base')

@push('styles.page')
    <link
        href="{{ asset('templates/sneat/vendor/css/pages/page-auth.css') }}"
        rel="stylesheet"
    />
@endpush

@section('content')
    {{ $slot }}
@endsection
