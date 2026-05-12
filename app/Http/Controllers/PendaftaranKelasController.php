<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranKelasController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric',
            'kelas_tutor' => 'required|string',
            'no_telepon' => 'required|numeric',
        ]);

        // Simpan data ke database
        DB::table('pendaftaran_kelas')->insert([
            'nama_peserta' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas_tutor' => $request->input('kelas_tutor'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
