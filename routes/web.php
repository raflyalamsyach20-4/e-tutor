<?php

use App\Http\Controllers\AccPengajuanController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AktivitasPesertaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiKelasController;
use App\Http\Controllers\JadwalTutorController;
use App\Http\Controllers\ListPendaftarController;
use App\Http\Controllers\PendaftaranKelasController;
use App\Http\Controllers\PengajuanTutorController;
use App\Http\Controllers\RecommendationLetterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

// =====================
// Root Redirect
// =====================
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'peserta') {
            return redirect('/informasi-kelas');
        } elseif ($user->role === 'kaprodi') {
            return redirect('/kaprodi/acc-pengajuan');
        } elseif ($user->role === 'admin') {
            return redirect('/admin/acc-achievement');
        }
    }
    return redirect()->route('login');
});

// =====================
// Auth Routes
// =====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'showRegister']);
Route::post('/registrasi', [AuthController::class, 'register']);

// Lupa Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

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
        Route::get('/informasi-kelas', [InformasiKelasController::class, 'index'])->name('informasi-kelas');
        Route::get('/pendaftaran-kelas', [PendaftaranKelasController::class, 'create']);
        Route::post('/pendaftaran-kelas', [PendaftaranKelasController::class, 'store']);
        Route::get('/aktivitas-peserta', [AktivitasPesertaController::class, 'index']);
        Route::get('/pengajuan-tutor', [PengajuanTutorController::class, 'create']);
        Route::post('/pengajuan-tutor', [PengajuanTutorController::class, 'store']);
        Route::get('/status-pengajuan', [PengajuanTutorController::class, 'status']);
        Route::get('/jadwal-tutor', [JadwalTutorController::class, 'index']);
        Route::post('/jadwal-tutor', [JadwalTutorController::class, 'store']);
        Route::get('/list-pendaftar', [ListPendaftarController::class, 'index']);
        Route::post('/list-pendaftar/{id}/approve', [ListPendaftarController::class, 'approve']);
        Route::post('/list-pendaftar/{id}/reject', [ListPendaftarController::class, 'reject']);
        // Achievement Tutor
        Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement.index');
        Route::post('/achievement', [AchievementController::class, 'store'])->name('achievement.store');
        Route::get('/achievement/download/{id}', [AchievementController::class, 'downloadSkillLetter'])->name('achievement.download');

        // Notifikasi
        Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('/notifikasi/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
        Route::post('/notifikasi/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');

        // Surat Rekomendasi
        Route::get('/surat-rekomendasi', [RecommendationLetterController::class, 'index'])->name('surat-rekomendasi.index');
        Route::post('/surat-rekomendasi', [RecommendationLetterController::class, 'store'])->name('surat-rekomendasi.store');
        Route::get('/surat-rekomendasi/preview', [RecommendationLetterController::class, 'preview'])->name('surat-rekomendasi.preview');
        Route::get('/surat-rekomendasi/download', [RecommendationLetterController::class, 'download'])->name('surat-rekomendasi.download');
    });

    // Kaprodi
    Route::middleware('role:kaprodi')->group(function () {
        Route::get('/kaprodi/acc-pengajuan', [AccPengajuanController::class, 'index'])->name('kaprodi.acc-pengajuan');
        Route::post('/acc-pengajuan/{id}/approve', [AccPengajuanController::class, 'approve']);
        Route::post('/acc-pengajuan/{id}/reject', [AccPengajuanController::class, 'reject']);
    });

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/acc-achievement', [\App\Http\Controllers\Admin\AdminAchievementController::class, 'index'])->name('admin.acc-achievement');
        Route::post('/admin/acc-achievement/{id}/approve', [\App\Http\Controllers\Admin\AdminAchievementController::class, 'approve'])->name('admin.acc-achievement.approve');
        Route::post('/admin/acc-achievement/{id}/reject', [\App\Http\Controllers\Admin\AdminAchievementController::class, 'reject'])->name('admin.acc-achievement.reject');
        Route::get('/admin/acc-achievement/{id}/preview', [\App\Http\Controllers\Admin\AdminAchievementController::class, 'previewLetter'])->name('admin.acc-achievement.preview');

        // Manage Classes
        Route::get('/admin/manage-classes', [\App\Http\Controllers\Admin\AdminClassController::class, 'index'])->name('admin.manage-classes');
        Route::delete('/admin/manage-classes/{id}', [\App\Http\Controllers\Admin\AdminClassController::class, 'destroy'])->name('admin.manage-classes.destroy');
    });
});
