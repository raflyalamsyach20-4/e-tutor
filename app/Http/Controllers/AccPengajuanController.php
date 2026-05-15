<?php
namespace App\Http\Controllers;

use App\Models\PengajuanTutor;
use Illuminate\Http\Request;

class AccPengajuanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $query = PengajuanTutor::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('topik_pembahasan', 'like', "%{$search}%");
            });
        }

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $applications = $query->latest()->get();

        $stats = [
            'total' => PengajuanTutor::count(),
            'approved' => PengajuanTutor::where('status', 'approved')->count(),
            'pending' => PengajuanTutor::where('status', 'pending')->count(),
        ];

        return view('kaprodi.acc-pengajuan', compact('applications', 'stats', 'search', 'status'));
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