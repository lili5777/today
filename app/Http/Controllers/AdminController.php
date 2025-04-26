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

      public function register() {
        return view('register');
    }
    public function registersubmit(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
         
        return redirect()->route('login');
        
    }


    public function beranda()
    {
        $tweet = Belajar::orderBy('created_at', 'desc')->get();
        $user = User::all();

        $today = Carbon::now('Asia/Makassar')->toDateString();
        $yesterday = Carbon::now('Asia/Makassar')->subDay()->toDateString();
        $idUser = auth()->id(); // ambil id user yang login

        // ambil postingan hari ini untuk user yang login
        $todayPost = Belajar::where('id_user', $idUser)
            ->where('tanggal', $today)
            ->orderBy('created_at', 'desc')
            ->first();

        // ambil postingan kemarin untuk user yang login
        $yesterdayPost = Belajar::where('id_user', $idUser)
            ->where('tanggal', $yesterday)
            ->orderBy('created_at', 'desc')
            ->first();

        // === Hitung Win Streak berdasarkan user login ===
        $streak = 0;
        $date = Carbon::now('Asia/Makassar');

        while (true) {
            $exists = Belajar::where('id_user', $idUser)
                ->where('tanggal', $date->toDateString())
                ->exists();

            if ($exists) {
                $streak++;
                $date->subDay();
            } else {
                break;
            }
        }
        // === End Win Streak ===

        return view('dashboard', compact('tweet', 'user', 'todayPost', 'yesterdayPost', 'streak'));
    }


    public function profil()
    {
        $user = auth()->user();
        $belajar = Belajar::where('id', auth()->id())->get(); // Tambahkan tanda kurung di auth()->id()
        return view('profil', compact('user', 'belajar'));
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
