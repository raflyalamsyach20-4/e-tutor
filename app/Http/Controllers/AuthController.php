<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'peserta') {
                return redirect('/informasi-kelas');
            } elseif ($user->role === 'kaprodi') {
                return redirect('/kaprodi/acc-pengajuan');
            } elseif ($user->role === 'admin') {
                return redirect('/admin/acc-achievement');
            }

            Auth::logout();
            return redirect('/login')->withErrors(['role' => 'Role tidak valid.']);
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // ✅ Tambahkan ini
    public function showRegister()
    {
        return view('registrasi');
    }

    // ✅ Tambahkan ini juga
    public function register(Request $request)
{
    $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|min:8|confirmed',
    ]);

    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'peserta', // ✅ default role langsung di sini
    ]);

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
}
}