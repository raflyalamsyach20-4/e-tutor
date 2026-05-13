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
       /* $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'topik_pembahasan' => 'required|string',
            'deskripsi_job' => 'required|string',
            'bukti_memenuhi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
*/
        $path = $request->file('bukti_memenuhi')->store('bukti', 'public');

        PengajuanTutor::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'nim' => $request->nim,
            'topik_pembahasan' => $request->topik_pembahasan,
            'deskripsi_job' => $request->deskripsi_job,
            'bukti_memenuhi' => $path,
            'status'         => 'Menunggu',
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function status()
    {
        $application = PengajuanTutor::where('user_id', Auth::id())->first();
        return view('peserta_tutor.status-pengajuan', compact('application'));
    }
}