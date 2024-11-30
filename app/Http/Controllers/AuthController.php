<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function HalamanLogin(){
        return view('welcome');
    }

    public function Login(){
        return view('dashboard');
    }

    public function Create(){
        return view('buat-akun');
    }
}
