<?php

namespace App\Http\Controllers;

use App\Models\RecommendationLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationLetterController extends Controller
{
    /**
     * Tampilkan halaman form surat rekomendasi.
     * Auto-fill data jika sudah ada data tersimpan.
     */
    public function index()
    {
        $user = Auth::user();
        $letter = RecommendationLetter::where('user_id', $user->id)->latest()->first();

        // Auto-fill dari PengajuanTutor jika ada
        $pengajuan = $user->pengajuanTutor;

        return view('peserta_tutor.template', compact('letter', 'user', 'pengajuan'));
    }

    /**
     * Simpan atau update data surat ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lecturer_name' => 'required|string|max:255',
            'lecturer_nip' => 'required|string|max:50',
            'lecturer_position' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'student_nim' => 'required|string|max:50',
            'student_prodi' => 'required|string|max:255',
            'place' => 'required|string|max:100',
            'date' => 'required|date',
            'pa_lecturer_name' => 'required|string|max:255',
            'pa_lecturer_nip' => 'required|string|max:50',
            'course_lecturer_name' => 'required|string|max:255',
            'course_lecturer_nip' => 'required|string|max:50',
        ]);

        RecommendationLetter::updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($request->only([
                'lecturer_name', 'lecturer_nip', 'lecturer_position',
                'student_name', 'student_nim', 'student_prodi',
                'place', 'date',
                'pa_lecturer_name', 'pa_lecturer_nip',
                'course_lecturer_name', 'course_lecturer_nip',
            ]), ['user_id' => Auth::id()])
        );

        return redirect()->route('surat-rekomendasi.index')
            ->with('success', 'Surat rekomendasi berhasil disimpan!');
    }

    /**
     * Tampilkan pratinjau surat (read-only, tampilan penuh).
     */
    public function preview()
    {
        $letter = RecommendationLetter::where('user_id', Auth::id())->latest()->firstOrFail();

        return view('peserta_tutor.template-preview', compact('letter'));
    }

    /**
     * Generate dan download PDF surat rekomendasi.
     */
    public function download()
    {
        $letter = RecommendationLetter::where('user_id', Auth::id())->latest()->firstOrFail();

        $pdf = Pdf::loadView('peserta_tutor.template-pdf', compact('letter'))
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'defaultFont' => 'Times New Roman',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => false,
            ]);

        $filename = 'surat-rekomendasi-'.str_replace(' ', '-', strtolower($letter->student_name)).'.pdf';

        return $pdf->download($filename);
    }
}
