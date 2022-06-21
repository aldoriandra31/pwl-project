<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Admin\AdminKasusController;
use App\Http\Controllers\Admin\AdminSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->middleware(['auth', 'level:admin'])->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin.home');
  Route::resource('/guru', AdminGuruController::class); // crud guru
  Route::resource('/siswa', AdminSiswaController::class); // crud siswa
  Route::resource('/kasus', AdminKasusController::class); // crud Kasus
});

Route::prefix('guru')->middleware(['auth', 'level:guru'])->group(function () {
  Route::get('/', [GuruController::class, 'index'])->name('guru.home');
});

Route::prefix('siswa')->middleware(['auth', 'level:siswa'])->group(function () {
  Route::get('/', [SiswaController::class, 'index'])->name('siswa.home');
  Route::get('/pelangaran', [SiswaController::class, 'pelanggaran'])->name('siswa.pelanggaran');
  Route::get('/cetak', [SiswaController::class, 'cetakPdf'])->name('export.pdf');
});

Route::middleware(['auth', 'level:admin,guru'])->group(function () {
  Route::resource('/pelanggaran', PelanggaranController::class);
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
  Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
  Route::view('/', 'home');
  Route::get('/login', [LoginController::class, 'create'])->name('login');
  Route::post('/login', [LoginController::class, 'store'])->name('proses.login');

  Route::get('/register', [RegisterController::class, 'create'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('proses.register');
});

