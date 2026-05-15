<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranKelas;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;

class ListPendaftarController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $search = $request->get('search');

        // Cari jadwal milik tutor yang sedang login
        $schedules = TeachingSchedule::where('user_id', Auth::id())->pluck('id');

        // Cari pendaftaran yang menuju ke jadwal-jadwal tersebut
        $query = PendaftaranKelas::with(['user', 'teachingSchedule'])
            ->whereIn('teaching_schedule_id', $schedules);

        if ($search) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($filter !== 'all') {
            $query->where('status', $filter); // pending, approved, rejected
        }

        $pendaftar = $query->orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => PendaftaranKelas::whereIn('teaching_schedule_id', $schedules)->count(),
            'approved' => PendaftaranKelas::whereIn('teaching_schedule_id', $schedules)->where('status', 'approved')->count(),
            'rejected' => PendaftaranKelas::whereIn('teaching_schedule_id', $schedules)->where('status', 'rejected')->count(),
            'pending' => PendaftaranKelas::whereIn('teaching_schedule_id', $schedules)->where('status', 'pending')->count(),
        ];

        return view('peserta_tutor.list-pendaftar', compact('pendaftar', 'stats', 'filter', 'search'));
    }

    public function approve($id)
    {
        $pendaftaran = PendaftaranKelas::findOrFail($id);
        $schedule = $pendaftaran->teachingSchedule;

        // Pastikan jadwal ini milik tutor yang sedang login
        if ($schedule->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        // Cek kuota
        $approvedCount = PendaftaranKelas::where('teaching_schedule_id', $schedule->id)
            ->where('status', 'approved')->count();

        if ($approvedCount >= 20) {
            return redirect()->back()->with('error', 'Kelas ini sudah penuh (maksimal 20 peserta).');
        }

        $pendaftaran->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Pendaftaran disetujui.');
    }

    public function reject($id)
    {
        $pendaftaran = PendaftaranKelas::findOrFail($id);
        $schedule = $pendaftaran->teachingSchedule;

        if ($schedule->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        $pendaftaran->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Pendaftaran ditolak.');
    }
}
