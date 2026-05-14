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
        $application = PengajuanTutor::where('user_id', Auth::id())->first();
        $schedules = TeachingSchedule::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();

        return view('peserta_tutor.jadwal-tutor', compact('application', 'schedules'));
    }

    public function store(Request $request)
    {
        $application = PengajuanTutor::where('user_id', Auth::id())->first();
        
        if (!$application || $application->status !== 'approved') {
            return redirect()->back()->with('error', 'Anda belum disetujui sebagai tutor.');
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