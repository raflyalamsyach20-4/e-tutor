<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PengajuanTutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanTutorController extends Controller
{
    public function create()
    {
        return view('peserta_tutor.pengajuan-tutor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'topik' => 'required|string',
            'deskripsi' => 'required|string',
            'bukti_memenuhi' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $path = $request->file('bukti_memenuhi')->store('bukti', 'public');

        PengajuanTutor::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'nim' => $request->nim,
            'topik_pembahasan' => $request->topik,
            'deskripsi_job' => $request->deskripsi,
            'bukti_memenuhi' => $path,
            'status'         => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function status()
    {
        $application = PengajuanTutor::where('user_id', Auth::id())->first();
        return view('peserta_tutor.status-pengajuan', compact('application'));
    }
}