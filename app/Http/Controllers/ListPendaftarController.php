<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PendaftaranKelas;
use App\Models\TeachingSchedule;
use Illuminate\Http\Request;
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
            $query->whereHas('user', function ($q) use ($search) {
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

        // Kirim Notifikasi ke Peserta
        Notification::create([
            'user_id' => $pendaftaran->user_id,
            'title' => 'Pendaftaran Kelas Disetujui',
            'message' => "Selamat! Pendaftaran Anda untuk kelas dengan topik '{$schedule->topik_pembahasan}' (Tutor: {$schedule->user->name}) telah disetujui.",
            'type' => 'pendaftaran_kelas',
            'related_schedule_id' => $schedule->id,
        ]);

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

        // Kirim Notifikasi ke Peserta
        Notification::create([
            'user_id' => $pendaftaran->user_id,
            'title' => 'Pendaftaran Kelas Ditolak',
            'message' => "Maaf, pendaftaran Anda untuk kelas dengan topik '{$schedule->topik_pembahasan}' (Tutor: {$schedule->user->name}) ditolak.",
            'type' => 'pendaftaran_kelas',
            'related_schedule_id' => $schedule->id,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran ditolak.');
    }
}
