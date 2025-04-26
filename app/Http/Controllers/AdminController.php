<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use App\Models\User;
use Carbon\Carbon;
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

        if(Auth::attempt($credential)){
            $user =  Auth::user();

            return redirect()->route('beranda');
        }
        return redirect()->route('login')->with('login_error', 'Email atau Password salah, Silahkan coba lagi')
            ->withInput();
     }
     public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect()->route('login');
      }

    public function register()
    {
        return view('register');
    }

    public function beranda()
    {
        $tweet = Belajar::orderBy('created_at', 'desc')->get();
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
        $now = Carbon::now('Asia/Makassar');

        $cek = Belajar::where('id_user', auth()->id())
            ->whereDate('tanggal', $now->format('Y-m-d'))
            ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah posting hari ini. Tunggu besok ya! 🌟');
        }

        $post = new Belajar();
        $post->id_user = auth()->id();
        $post->topik = $request->postingan;


        $post->jam = $now->format('H:i');
        $post->tanggal = $now->format('Y-m-d');
        $post->save();

        return back()->with('success', 'Postingan berhasil dikirim!');
    }
    
    
}
