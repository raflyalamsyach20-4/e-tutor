<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PendaftaranKelasController;
use App\Http\Controllers\PengajuanTutorController;
use App\Http\Controllers\AccPengajuanController;
use App\Http\Controllers\JadwalTutorController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/informasi-kelas', function () {
    return view('peserta_tutor.informasi-kelas');
})->middleware('auth');

Route::post('/pendaftaran-kelas', [PendaftaranKelasController::class, 'store']);

Route::get('/informasi-kelas', function () {
    return view('peserta_tutor.informasi-kelas');
})->middleware('auth');

Route::get('/pendaftaran-kelas', function () {
    return view('peserta_tutor.pendaftaran-kelas');
});

Route::get('/list-pendaftar', function () {
    return view('peserta_tutor.list-pendaftar');
});

Route::get('/notifikasi', function () {
    return view('peserta_tutor.notifikasi');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/aktivitas-peserta', function () {
    return view('peserta_tutor.aktivitas-peserta');
});

Route::middleware('auth')->group(function () {
    // Tutor
    Route::get('/pengajuan-tutor', [PengajuanTutorController::class, 'create']);
    Route::post('/pengajuan-tutor', [PengajuanTutorController::class, 'store']);
    Route::get('/status-pengajuan', [PengajuanTutorController::class, 'status']);

    // Kaprodi
    Route::get('/acc-pengajuan', [AccPengajuanController::class, 'index']);
    Route::post('/acc-pengajuan/{id}/approve', [AccPengajuanController::class, 'approve']);
    Route::post('/acc-pengajuan/{id}/reject', [AccPengajuanController::class, 'reject']);

    // Jadwal
    Route::get('/jadwal-tutor', [JadwalTutorController::class, 'index']);
    Route::post('/jadwal-tutor', [JadwalTutorController::class, 'store']);
});