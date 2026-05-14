<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranKelasController;
use App\Http\Controllers\PengajuanTutorController;
use App\Http\Controllers\AccPengajuanController;
use App\Http\Controllers\JadwalTutorController;

// =====================
// Auth Routes
// =====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'showRegister']);
Route::post('/registrasi', [AuthController::class, 'register']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// =====================
// Authenticated Routes
// =====================
Route::middleware('auth')->group(function () {

    // Peserta & Tutor
    Route::middleware('role:peserta,tutor')->group(function () {
        Route::get('/informasi-kelas', [\App\Http\Controllers\InformasiKelasController::class, 'index'])->name('informasi-kelas');
        Route::get('/pendaftaran-kelas', [PendaftaranKelasController::class, 'create']);
        Route::post('/pendaftaran-kelas', [PendaftaranKelasController::class, 'store']);
        Route::get('/aktivitas-peserta', [\App\Http\Controllers\AktivitasPesertaController::class, 'index']);
        Route::get('/pengajuan-tutor', [PengajuanTutorController::class, 'create']);
        Route::post('/pengajuan-tutor', [PengajuanTutorController::class, 'store']);
        Route::get('/status-pengajuan', [PengajuanTutorController::class, 'status']);
        Route::get('/jadwal-tutor', [JadwalTutorController::class, 'index']);
        Route::post('/jadwal-tutor', [JadwalTutorController::class, 'store']);
        Route::get('/list-pendaftar', [\App\Http\Controllers\ListPendaftarController::class, 'index']);
        Route::post('/list-pendaftar/{id}/approve', [\App\Http\Controllers\ListPendaftarController::class, 'approve']);
        Route::post('/list-pendaftar/{id}/reject', [\App\Http\Controllers\ListPendaftarController::class, 'reject']);
    });

    // Kaprodi
    Route::middleware('role:kaprodi')->group(function () {
        Route::get('/kaprodi/acc-pengajuan', [AccPengajuanController::class, 'index'])->name('kaprodi.acc-pengajuan');
        Route::post('/acc-pengajuan/{id}/approve', [AccPengajuanController::class, 'approve']);
        Route::post('/acc-pengajuan/{id}/reject', [AccPengajuanController::class, 'reject']);
    });

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/acc-achievement', function () {
            return view('admin.acc-achievement');
        })->name('admin.acc-achievement');
    });
});