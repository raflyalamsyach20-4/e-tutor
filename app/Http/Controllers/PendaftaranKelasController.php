<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingSchedule;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Facades\Auth;

class PendaftaranKelasController extends Controller
{
    public function create()
    {
        // Hanya tampilkan tutor yang punya jadwal
        $schedules = TeachingSchedule::with('user')->orderBy('tanggal', 'asc')->get();
        return view('peserta_tutor.pendaftaran-kelas', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teaching_schedule_id' => 'required|exists:teaching_schedules,id',
            'no_telepon' => 'required|string|max:20',
        ]);

        // Update no telepon user jika berubah atau baru diisi
        $user = Auth::user();
        if ($request->no_telepon !== $user->no_telepon) {
            $user->update(['no_telepon' => $request->no_telepon]);
        }

        // Cek apakah sudah pernah mendaftar ke kelas ini
        $existing = PendaftaranKelas::where('user_id', Auth::id())
            ->where('teaching_schedule_id', $request->teaching_schedule_id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar pada kelas ini.');
        }

        // Simpan pendaftaran
        PendaftaranKelas::create([
            'user_id' => Auth::id(),
            'teaching_schedule_id' => $request->teaching_schedule_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim! Menunggu persetujuan tutor.');
    }
}
