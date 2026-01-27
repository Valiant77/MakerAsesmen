<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\VerifikasiController;

Route::get('/profil', [UserController::class, 'profil'])->name('profil');

Route::get('/login', function () { return view('login'); });
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('user', UserController::class);
Route::resource('admin', UserController::class)->parameters(['admins' => 'id']);

Route::get('/rekap/{user}', [AbsenController::class, 'show'])->name('rekap.show');

Route::get('/search', [UserController::class, 'search'])->name('search');

Route::get('/users/export', [UserController::class, 'export'])->name('user.export');
Route::get('/rekap/{user}/export', [AbsenController::class, 'export'])->name('rekap.export');

Route::get('/verifikasi', [VerifikasiController::class, 'show'])->name('verifikasi.show');
Route::post('/verifikasi/diterima/{id}', [VerifikasiController::class, 'diterima'])->name('verifikasi.diterima');
Route::post('/verifikasi/ditolak/{id}', [VerifikasiController::class, 'ditolak'])->name('verifikasi.ditolak');