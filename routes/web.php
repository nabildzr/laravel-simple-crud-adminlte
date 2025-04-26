<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;



Route::middleware(['guest'])->group(function () {
  Route::get('/login', function () {
    return view('login');
  })->name('login')->middleware('guest');

  Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
});





Route::middleware(['auth'])->group(function () {
  Route::get('/', [KelasController::class, 'index']);
  Route::get('kelas/add', [KelasController::class, 'create']);
  Route::post('kelas/add', [KelasController::class, 'store']);
  Route::get('kelas/{id}/edit', [KelasController::class, 'edit']);
  Route::patch('kelas/{id}/edit', [KelasController::class, 'update']);
  Route::delete('kelas/{id}/delete', [KelasController::class, 'destroy']);

  // siswa
  Route::get('/siswa', [SiswaController::class, 'index']);
  Route::get('siswa/add', [SiswaController::class, 'create']);
  Route::post('siswa/add', [SiswaController::class, 'store']);
  Route::get('siswa/{id}/edit', [SiswaController::class, 'edit']);
  Route::patch('siswa/{id}/edit', [SiswaController::class, 'update']);
  Route::delete('siswa/{id}/delete', [SiswaController::class, 'destroy']);

  // logout

  Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
