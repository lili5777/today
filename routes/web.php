<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AdminController::class,'login'])->name('login');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::get('/profil', [AdminController::class, 'profil'])->name('register');
Route::get('/beranda', [AdminController::class, 'beranda'])->name('beranda');
