<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
            $query->where(function ($q) use ($search) {
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
        $application->update([
            'status' => 'approved',
            'catatan_kaprodi' => null,
        ]);

        // Kirim Notifikasi ke Tutor
        Notification::create([
            'user_id' => $application->user_id,
            'title' => 'Pengajuan Tutor Disetujui',
            'message' => "Selamat! Pengajuan tutor Anda untuk topik '{$application->topik_pembahasan}' telah disetujui oleh Kaprodi. Anda sekarang dapat menambahkan jadwal mengajar.",
            'type' => 'pengajuan_tutor',
        ]);

        return redirect()->back()->with('success', 'Pengajuan disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string',
        ]);

        $application = PengajuanTutor::findOrFail($id);
        $application->update([
            'status' => 'rejected',
            'catatan_kaprodi' => $request->alasan,
        ]);

        // Kirim Notifikasi ke Tutor
        Notification::create([
            'user_id' => $application->user_id,
            'title' => 'Pengajuan Tutor Ditolak',
            'message' => "Pengajuan tutor Anda untuk topik '{$application->topik_pembahasan}' telah ditolak oleh Kaprodi.\nAlasan: {$request->alasan}",
            'type' => 'pengajuan_tutor',
        ]);

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}
