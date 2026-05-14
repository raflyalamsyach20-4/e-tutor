<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password — E-Tutor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .glass-effect {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .btn-primary {
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }
  </style>
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full glass-effect rounded-3xl shadow-2xl overflow-hidden p-8">
    <div class="text-center mb-8">
      <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-blue-100">
        <span class="iconify text-3xl text-blue-600" data-icon="lucide:key-round"></span>
      </div>
      <h1 class="text-2xl font-800 text-slate-900 tracking-tight mb-2">Lupa Password?</h1>
      <p class="text-slate-500 text-sm">Jangan khawatir! Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.</p>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
      <span class="iconify text-xl" data-icon="lucide:check-circle"></span>
      <p class="text-sm font-600">{{ session('success') }}</p>
    </div>
    @endif

    @if($errors->any())
    <div class="bg-rose-50 border border-rose-100 text-rose-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
      <span class="iconify text-xl" data-icon="lucide:alert-circle"></span>
      <p class="text-sm font-600">{{ $errors->first() }}</p>
    </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label class="block text-sm font-700 text-slate-700 mb-2 ml-1" for="email">Alamat Email</label>
        <div class="relative">
          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="lucide:mail"></span>
          <input type="email" id="email" name="email" required
                 class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-12 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all text-slate-900 placeholder:text-slate-400"
                 placeholder="nama@email.com">
        </div>
      </div>

      <button type="submit" class="btn-primary w-full py-4 rounded-xl text-white font-700 tracking-wide">
        Kirim Link Reset
      </button>
    </form>

    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
      <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-600 text-slate-500 hover:text-blue-600 transition-colors">
        <span class="iconify" data-icon="lucide:arrow-left"></span>
        Kembali ke Halaman Login
      </a>
    </div>
  </div>
</body>
</html>
