<?php
namespace App\Http\Controllers;

use App\Models\PengajuanTutor;
use Illuminate\Http\Request;

class AccPengajuanController extends Controller
{
    public function index()
    {
        $applications = PengajuanTutor::latest()->get();

        $stats = [
            'total' => $applications->count(),
            'approved' => $applications->where('status', 'approved')->count(),
            'pending' => $applications->where('status', 'pending')->count(),
        ];

        return view('kaprodi.acc-pengajuan', compact('applications', 'stats'));
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