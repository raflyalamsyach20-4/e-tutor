<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingSchedule;

class InformasiKelasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = TeachingSchedule::with(['user.pengajuanTutor', 'pendaftaran' => function($q) {
            $q->where('status', 'approved');
        }])->whereHas('user.pengajuanTutor', function($q) {
            $q->where('status', 'approved');
        });

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('topik_pembahasan', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qu) use ($search) {
                      $qu->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $schedules = $query->orderBy('tanggal', 'asc')->get();

    // ✅ Pastikan kuota tidak null
    $schedules->each(function($schedule) {
        if (!$schedule->kuota || $schedule->kuota == 0) {
            $schedule->kuota = 20; // default kuota
        }
    });

    return view('peserta_tutor.informasi-kelas', compact('schedules', 'search'));
}
}
