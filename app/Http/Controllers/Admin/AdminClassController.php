<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeachingSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminClassController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $query = TeachingSchedule::with(['user', 'pendaftaran'])
            ->withCount('pendaftaran');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('topik_pembahasan', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qu) use ($search) {
                      $qu->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $classes = $query->orderBy('tanggal', 'desc')->paginate(10);

        return view('admin.manage-classes', compact('classes', 'search'));
    }

    public function destroy($id)
    {
        $class = TeachingSchedule::findOrFail($id);

        // Validasi: Hanya kelas yang sudah selesai atau lewat jamnya
        $waktu_mulai = explode(' - ', $class->waktu)[0];
        $start_time = Carbon::parse($class->tanggal->format('Y-m-d') . ' ' . $waktu_mulai);
        
        // Kelas dianggap bisa dihapus jika waktu sekarang sudah melewati waktu mulai (atau bisa ditambah durasi jika mau lebih ketat)
        // User minta: "kelas yang statusnya sudah selesai atau kelas yang tanggal/jamnya sudah lewat"
        if ($start_time->isFuture()) {
            return redirect()->back()->with('error', 'Kelas yang belum dimulai tidak dapat dihapus.');
        }

        // Soft delete related data
        $class->pendaftaran()->delete();
        $class->user->notifications()->where('related_schedule_id', $class->id)->delete();
        
        $class->delete();

        return redirect()->back()->with('success', 'Kelas berhasil dihapus (Soft Delete).');
    }
}
