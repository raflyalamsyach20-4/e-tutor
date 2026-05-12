<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/informasi-kelas', function () {
    return view('informasi-kelas');
})->middleware('auth');

use App\Http\Controllers\PendaftaranKelasController;

Route::post('/pendaftaran-kelas', [PendaftaranKelasController::class, 'store']);

Route::get('/informasi-kelas', function () {
    return view('informasi-kelas');
});

Route::get('/pendaftaran-kelas', function () {
    return view('pendaftaran-kelas');
});

Route::get('/pengajuan-tutor', function () {
    return view('pengajuan-tutor');
});

Route::get('/status-pengajuan', function () {
    return view('status-pengajuan');
});

Route::get('/jadwal-tutor', function () {
    return view('jadwal-tutor');
});

Route::get('/list-pendaftar', function () {
    return view('list-pendaftar');
});

Route::get('/notifikasi', function () {
    return view('notifikasi');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/login', function () {
    return view('login');
});
