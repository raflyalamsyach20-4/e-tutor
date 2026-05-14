<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $achievements = Achievement::with('skillLetter')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Data for auto-fill
        $studentData = [
            'nama' => $user->name,
            'nim' => $user->pengajuanTutor->nim ?? '',
            'prodi' => $user->recommendationLetter->student_prodi ?? 'Informatika' // Default if not found
        ];

        return view('peserta_tutor.achievement', compact('achievements', 'studentData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'teaching_proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $proofPath = $request->file('teaching_proof')->store('teaching_proofs', 'public');

        Achievement::create([
            'user_id' => Auth::id(),
            'topic' => $request->topic,
            'description' => $request->description,
            'teaching_proof' => $proofPath,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan achievement berhasil dikirim!');
    }

    public function downloadSkillLetter($id)
    {
        $achievement = Achievement::with('skillLetter')->findOrFail($id);

        if ($achievement->user_id !== Auth::id() || $achievement->status !== 'approved' || !$achievement->skillLetter) {
            abort(403);
        }

        // Logic for PDF download (using SkillLetter pdf_file or generating on the fly)
        // For now, let's assume we use the stored PDF or generate it
        if ($achievement->skillLetter->pdf_file && Storage::disk('public')->exists($achievement->skillLetter->pdf_file)) {
            return Storage::disk('public')->download($achievement->skillLetter->pdf_file);
        }

        // Fallback: Generate if not stored (optional)
        return redirect()->back()->with('error', 'File PDF tidak ditemukan.');
    }
}
