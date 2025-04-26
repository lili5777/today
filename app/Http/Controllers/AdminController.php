<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use App\Models\User;
use Carbon\Carbon;
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
        $tweet=Belajar::all();
        $user=User::all();
        return view('dashboard',compact('tweet','user'));
    }

    public function profil()
    {
        return view('profil');
    }

    public function posting(Request $request){
        $request->validate([
            'postingan' => 'required',
        ]);

        $post = new Belajar();
        $post->id_user = auth()->id(); 
        $post->topik = $request->postingan;
        $post->jam = Carbon::now()->format('H:i'); 
        $post->tanggal = Carbon::now()->format('Y-m-d'); 
        $post->save(); 

        return back()->with('success', 'Postingan berhasil dikirim!');
    }
    
    
}
