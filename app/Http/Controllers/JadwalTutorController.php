<?php
namespace App\Http\Controllers;

use App\Models\TeachingSchedule;
use App\Models\PengajuanTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalTutorController extends Controller
{
    public function index()
    {
        $approvedCount = PengajuanTutor::where('user_id', Auth::id())->where('status', 'approved')->count();
        $scheduleCount = TeachingSchedule::where('user_id', Auth::id())->count();
        $schedules = TeachingSchedule::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();

        return view('peserta_tutor.jadwal-tutor', compact('approvedCount', 'scheduleCount', 'schedules'));
    }

    public function store(Request $request)
    {
        $approvedCount = PengajuanTutor::where('user_id', Auth::id())->where('status', 'approved')->count();
        $scheduleCount = TeachingSchedule::where('user_id', Auth::id())->count();
        
        if ($approvedCount === 0) {
            return redirect()->back()->with('error', 'Anda belum memiliki pengajuan tutor yang disetujui.');
        }

        if ($scheduleCount >= $approvedCount) {
            return redirect()->back()->with('error', 'Batas pembuatan jadwal tercapai. Satu pengajuan hanya berlaku untuk satu jadwal kelas. Silakan lakukan pengajuan tutor ulang untuk menambah kelas baru.');
        }

        $request->validate([
            'hari' => 'required|string',
            'tanggal' => 'required|date',
            'topik' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        TeachingSchedule::create([
            'user_id' => Auth::id(),
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'topik_pembahasan' => $request->topik,
            'waktu' => $request->waktu_mulai . ' - ' . $request->waktu_selesai,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }
}