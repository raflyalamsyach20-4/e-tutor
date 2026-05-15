<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Facades\Auth;

class AktivitasPesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $query = PendaftaranKelas::with(['teachingSchedule.user'])
            ->where('user_id', Auth::id());

        if ($search) {
            $query->whereHas('teachingSchedule', function($q) use ($search) {
                $q->where('topik_pembahasan', 'like', "%{$search}%");
            });
        }

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $pendaftarans = $query->orderBy('created_at', 'desc')->get();

        $allPendaftarans = PendaftaranKelas::where('user_id', Auth::id())->get();
        $stats = [
            'total' => $allPendaftarans->count(),
            'approved' => $allPendaftarans->where('status', 'approved')->count(),
            'pending' => $allPendaftarans->where('status', 'pending')->count(),
            'rejected' => $allPendaftarans->where('status', 'rejected')->count(),
        ];

        return view('peserta_tutor.aktivitas-peserta', compact('pendaftarans', 'stats', 'search', 'status'));
    }
}
