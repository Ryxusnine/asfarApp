@extends('layout.navbar')
@section('content')
    <div class="container p-5 bg-white m-5 mx-auto rounded">
        <label for="firstName" class="form-label">First Name</label>
        <input class="form-control mb-3" type="text" id="firstName" name="firstName" value="John">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="text" id="email" name="email" value="John@example.com">
        <button class="mt-3 btn btn-primary">Update</button>
    </div>

    <div class="container p-5 bg-white m-5 mx-auto rounded">
        <label for="password" class="form-label">Password</label>
        <input class="form-control mb-3" type="text" id="password" name="password" value="John">
        <label for="confirm" class="form-label">Confirm Password</label>
        <input class="form-control" type="text" id="confirm" name="confirm" value="John@example.com">
        <button class="mt-3 btn btn-primary">Update</button>
    </div>
    <div class="container p-5 bg-white rounded mb-5">
        <p>Tekan logout untuk keluar dari website ini.</p>
        <button class="btn btn-danger">LOGOUT</button>
    </div>
    @endsection