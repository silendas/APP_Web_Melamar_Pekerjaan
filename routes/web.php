<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\TestController;

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

// Route::get('/', function () {
//     return view('Welcome');
// });

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('test',[TestController::class,'index'])->name('test');
Route::post('nilai',[TestController::class,'nilai'])->name('nilai');

Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/perbarui',[ProfileController::class,'perbarui'])->name('profile/perbarui');

Route::post('pendidikan/tambah',[ProfileController::class,'tambahPendidikan'])->name('pendidikan/tambah');
Route::post('pendidikan/ubah',[ProfileController::class,'ubahPendidikan'])->name('pendidikan/ubah');
Route::post('pendidikan/hapus',[ProfileController::class,'hapusPendidikan'])->name('pendidikan/hapus');

Route::post('pengalaman/tambah',[ProfileController::class,'tambahPengalaman'])->name('pengalaman/tambah');
Route::post('pengalaman/ubah',[ProfileController::class,'ubahPengalaman'])->name('pengalaman/ubah');
Route::post('pengalaman/hapus',[ProfileController::class,'hapusPengalaman'])->name('pengalaman/hapus');

Route::get('loker',[LokerController::class,'index'])->name('loker');
Route::get('search',[LokerController::class,'search'])->name('search');
Route::post('melamar',[LokerController::class,'melamar'])->name('melamar');

Route::get('histori',[HistoriController::class,'index'])->name('histori');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('register',[AuthController::class,'register'])->name('register');