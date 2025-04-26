<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function beranda()
    {
        return view('dashboard');
    }

    public function profil()
    {
        return view('profil');
    }
    
    
}
