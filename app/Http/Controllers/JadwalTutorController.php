<?php
namespace App\Http\Controllers;

use App\Models\JadwalTutor;
use App\Models\PengajuanTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalTutorController extends Controller
{
    public function index()
    {
        $application = PengajuanTutor::where('user_id', Auth::id())->first();

        $schedules = JadwalTutor::where('user_id', Auth::id())->get();

        return view('jadwal-tutor', compact('application', 'schedules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string',
        ]);

        JadwalTutor::create([
            'user_id' => Auth::id(),
            'mata_kuliah' => $request->mata_kuliah,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan' => $request->ruangan,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }
}