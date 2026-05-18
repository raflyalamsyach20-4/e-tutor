<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Notification;
use App\Models\SkillLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminAchievementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $query = Achievement::with(['user.pengajuanTutor', 'skillLetter']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('topic', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($qu) use ($search) {
                        $qu->where('name', 'like', "%{$search}%")
                            ->orWhereHas('pengajuanTutor', function ($qp) use ($search) {
                                $qp->where('nim', 'like', "%{$search}%");
                            });
                    });
            });
        }

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $achievements = $query->latest()->get();

        return view('admin.acc-achievement', compact('achievements', 'search', 'status'));
    }

    public function approve($id)
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses.');
        }

        $achievement->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
        ]);

        // Auto-generate Skill Letter data
        $user = $achievement->user;
        $nim = $user->pengajuanTutor->nim ?? '-';
        $prodi = 'Informatika'; // Default or fetch from profile/rec-letter

        $letterNumber = 'SK/'.now()->format('Ymd').'/'.str_pad($achievement->id, 4, '0', STR_PAD_LEFT);

        $content = [
            'letter_number' => $letterNumber,
            'student_name' => $user->name,
            'student_nim' => $nim,
            'student_prodi' => $prodi,
            'topic' => $achievement->topic,
            'description' => $achievement->description,
            'date' => now()->translatedFormat('d F Y'),
            'place' => 'Palembang',
        ];

        // Generate PDF
        $pdf = Pdf::loadView('pdf.skill-letter', ['data' => $content]);
        $pdfPath = 'skill_letters/'.str_replace('/', '_', $letterNumber).'.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        SkillLetter::create([
            'achievement_id' => $achievement->id,
            'letter_number' => $letterNumber,
            'generated_content' => $content,
            'pdf_file' => $pdfPath,
        ]);

        // Kirim Notifikasi ke Tutor
        Notification::create([
            'user_id' => $achievement->user_id,
            'title' => 'Pengajuan Achievement Disetujui',
            'message' => "Selamat! Pengajuan achievement Anda untuk topik '{$achievement->topic}' telah disetujui. Surat Keterangan Skills Anda kini siap diunduh.",
            'type' => 'achievement',
        ]);

        return redirect()->back()->with('success', 'Pengajuan disetujui dan Surat Skills telah dibuat.');
    }

    public function reject($id)
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses.');
        }

        $achievement->update([
            'status' => 'rejected',
        ]);

        // Kirim Notifikasi ke Tutor
        Notification::create([
            'user_id' => $achievement->user_id,
            'title' => 'Pengajuan Achievement Ditolak',
            'message' => "Pengajuan achievement Anda untuk topik '{$achievement->topic}' ditolak oleh Admin.",
            'type' => 'achievement',
        ]);

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }

    public function previewLetter($id)
    {
        $achievement = Achievement::with('skillLetter')->findOrFail($id);

        if (! $achievement->skillLetter) {
            // Generate temporary preview if not approved yet
            $user = $achievement->user;
            $nim = $user->pengajuanTutor->nim ?? '-';
            $content = [
                'letter_number' => 'DRAFT/SK/XXXX',
                'student_name' => $user->name,
                'student_nim' => $nim,
                'student_prodi' => 'Informatika',
                'topic' => $achievement->topic,
                'description' => $achievement->description,
                'date' => now()->translatedFormat('d F Y'),
                'place' => 'Palembang',
            ];

            return view('pdf.skill-letter', ['data' => $content]);
        }

        return view('pdf.skill-letter', ['data' => $achievement->skillLetter->generated_content]);
    }
}
