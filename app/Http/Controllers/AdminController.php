<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function login(){
        $user = Auth::user();
      
         if($user){
             return redirect()->route('beranda');
 
         }
        return view('login');
    }
    public function proses_login (Request $request){
       
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        
        $credential = $request->only('email','password');
       //  $unamenya=User::where('email', $credential['email'])->first();
       //  dd($credential);
       //  dd(Auth::attempt($credential));
        

        if(Auth::attempt($credential)){
            $user =  Auth::user();

            return redirect()->route('dashboard');
        }
       //  Alert::alert('Gagal login', 'Username atau Password anda salah', 'error');
        return redirect()->route('login')->with('login_error', 'Email atau Password salah, Silahkan coba lagi')
            ->withInput();
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
