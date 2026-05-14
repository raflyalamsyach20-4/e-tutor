<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password — E-Tutor</title>
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
        <span class="iconify text-3xl text-blue-600" data-icon="lucide:lock"></span>
      </div>
      <h1 class="text-2xl font-800 text-slate-900 tracking-tight mb-2">Reset Password</h1>
      <p class="text-slate-500 text-sm">Silakan masukkan password baru Anda di bawah ini.</p>
    </div>

    @if(session('error'))
    <div class="bg-rose-50 border border-rose-100 text-rose-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
      <span class="iconify text-xl" data-icon="lucide:alert-circle"></span>
      <p class="text-sm font-600">{{ session('error') }}</p>
    </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <div>
        <label class="block text-sm font-700 text-slate-700 mb-2 ml-1" for="email">Konfirmasi Email</label>
        <div class="relative">
          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="lucide:mail"></span>
          <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required
                 class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-12 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all text-slate-900 placeholder:text-slate-400"
                 placeholder="nama@email.com">
        </div>
        @error('email') <p class="text-rose-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-700 text-slate-700 mb-2 ml-1" for="password">Password Baru</label>
        <div class="relative">
          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="lucide:lock"></span>
          <input type="password" id="password" name="password" required
                 class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-12 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all text-slate-900 placeholder:text-slate-400">
        </div>
        @error('password') <p class="text-rose-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-700 text-slate-700 mb-2 ml-1" for="password_confirmation">Konfirmasi Password Baru</label>
        <div class="relative">
          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="lucide:shield-check"></span>
          <input type="password" id="password_confirmation" name="password_confirmation" required
                 class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-12 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all text-slate-900 placeholder:text-slate-400">
        </div>
      </div>

      <button type="submit" class="btn-primary w-full py-4 rounded-xl text-white font-700 tracking-wide mt-2">
        Reset Password
      </button>
    </form>
  </div>
</body>
</html>
