<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingSchedule;

class InformasiKelasController extends Controller
{
    public function index()
    {
        // Ambil semua jadwal yang tutor-nya sudah disetujui Kaprodi
        $schedules = TeachingSchedule::with(['user.pengajuanTutor', 'pendaftaran' => function($q) {
            $q->where('status', 'approved');
        }])->whereHas('user.pengajuanTutor', function($q) {
            $q->where('status', 'approved');
        })->orderBy('tanggal', 'asc')->get();

        return view('peserta_tutor.informasi-kelas', compact('schedules'));
    }
}
