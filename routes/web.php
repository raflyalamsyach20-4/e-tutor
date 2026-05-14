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

Route::middleware('auth')->group(function () {
    // Peserta
    Route::get('/informasi-kelas', [\App\Http\Controllers\InformasiKelasController::class, 'index']);
    
    Route::get('/pendaftaran-kelas', [\App\Http\Controllers\PendaftaranKelasController::class, 'create']);
    Route::post('/pendaftaran-kelas', [\App\Http\Controllers\PendaftaranKelasController::class, 'store']);
    
    Route::get('/aktivitas-peserta', [\App\Http\Controllers\AktivitasPesertaController::class, 'index']);

    // Tutor
    Route::get('/pengajuan-tutor', [PengajuanTutorController::class, 'create']);
    Route::post('/pengajuan-tutor', [PengajuanTutorController::class, 'store']);
    Route::get('/status-pengajuan', [PengajuanTutorController::class, 'status']);
    
    Route::get('/jadwal-tutor', [JadwalTutorController::class, 'index']);
    Route::post('/jadwal-tutor', [JadwalTutorController::class, 'store']);

    Route::get('/list-pendaftar', [\App\Http\Controllers\ListPendaftarController::class, 'index']);
    Route::post('/list-pendaftar/{id}/approve', [\App\Http\Controllers\ListPendaftarController::class, 'approve']);
    Route::post('/list-pendaftar/{id}/reject', [\App\Http\Controllers\ListPendaftarController::class, 'reject']);

    // Kaprodi
    Route::get('/acc-pengajuan', [AccPengajuanController::class, 'index']);
    Route::post('/acc-pengajuan/{id}/approve', [AccPengajuanController::class, 'approve']);
    Route::post('/acc-pengajuan/{id}/reject', [AccPengajuanController::class, 'reject']);
});