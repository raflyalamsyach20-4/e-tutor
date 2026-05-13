<?php
namespace App\Http\Controllers;

use App\Models\PengajuanTutor;
use Illuminate\Http\Request;

class AccPengajuanController extends Controller
{
    public function index()
    {
        $applications = PengajuanTutor::all();
        return view('kaprodi.acc-pengajuan', compact('applications'));
    }

    public function approve($id)
    {
        $application = PengajuanTutor::findOrFail($id);
        $application->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Pengajuan disetujui.');
    }

    public function reject($id)
    {
        $application = PengajuanTutor::findOrFail($id);
        $application->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}