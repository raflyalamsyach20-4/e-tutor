<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Facades\Auth;

class AktivitasPesertaController extends Controller
{
    public function index()
    {
        // Ambil pendaftaran milik user yang login
        $pendaftarans = PendaftaranKelas::with(['teachingSchedule.user'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $pendaftarans->count(),
            'approved' => $pendaftarans->where('status', 'approved')->count(),
            'pending' => $pendaftarans->where('status', 'pending')->count(),
            'rejected' => $pendaftarans->where('status', 'rejected')->count(),
        ];

        return view('peserta_tutor.aktivitas-peserta', compact('pendaftarans', 'stats'));
    }
}
