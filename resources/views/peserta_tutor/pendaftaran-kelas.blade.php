<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Pendaftaran Kelas</title>
  
  <!-- Premium Font: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  
  <style>
    /* Luxury Animations */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes floatSlow {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(5deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }
    
    @keyframes shine {
      0% { left: -100%; }
      20% { left: 100%; }
      100% { left: 100%; }
    }

    .animate-fade-in-up {
      animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
      opacity: 0;
    }
    
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }

    .floating-shape {
      animation: floatSlow 8s ease-in-out infinite;
    }

    .btn-shine {
      position: relative;
      overflow: hidden;
    }
    .btn-shine::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 50%;
      height: 100%;
      background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
      transform: skewX(-25deg);
      animation: shine 4s infinite;
    }
  </style>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { 
            sans: ['"Plus Jakarta Sans"', 'sans-serif'] 
          },
          colors: {
            brand: {
              blue: '#0F4C81',    /* Royal Blue */
              yellow: '#F59E0B',  /* Amber/Gold */
              red: '#E11D48',     /* Crimson Red */
              white: '#FFFFFF',
              light: '#F8FAFC'
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-brand-light font-sans min-h-screen text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">

  <x-sidebar />

  <!-- Main Content -->
  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[10%] right-[10%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Layanan Belajar <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Pendaftaran Kelas</span>
      </div>
      <div class="flex items-center gap-3 relative z-10">
        <a href="{{ route('notifications.index') }}" class="relative w-10 h-10 rounded-[12px] border border-slate-200 bg-white flex items-center justify-center text-slate-500 hover:bg-brand-blue hover:text-brand-yellow hover:border-brand-blue transition-all shadow-sm group">
          <span class="iconify text-xl group-hover:scale-110 transition-transform" data-icon="lucide:bell"></span>
          @if(Auth::user()->notifications()->where('is_read', false)->exists())
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-brand-red rounded-full border-2 border-white animate-pulse shadow-sm"></span>
          @endif
        </a>
      </div>
    </header>

    <div class="p-6 md:p-10 flex-1 flex flex-col items-center justify-center relative z-10">
      
      <div class="w-full max-w-2xl bg-white/95 backdrop-blur-md rounded-[32px] p-10 relative overflow-hidden shadow-[0_20px_50px_rgba(15,76,129,0.08)] border border-slate-200 mt-4 md:mt-0 animate-fade-in-up">

        <div class="relative z-10">
          
          <a href="/informasi-kelas" class="inline-flex items-center gap-2 px-5 py-3 rounded-[12px] bg-slate-50 border border-slate-200 text-slate-500 hover:bg-brand-blue hover:text-white transition-colors text-[13px] font-extrabold mb-10 w-fit group shadow-sm">
            <span class="iconify transition-transform group-hover:-translate-x-1" data-icon="lucide:arrow-left"></span> Kembali ke Informasi Kelas
          </a>

          <!-- Header -->
          <div class="text-center mb-10 animate-fade-in-up stagger-1">
            <div class="w-20 h-20 bg-brand-yellow/10 border border-brand-yellow/30 rounded-[24px] mx-auto flex items-center justify-center text-4xl mb-6 shadow-sm">
                <span class="iconify text-brand-yellow" data-icon="lucide:file-edit"></span>
            </div>
            <h1 class="text-3xl md:text-[36px] font-extrabold text-brand-blue tracking-tight mb-3">Pendaftaran <span class="text-brand-yellow">Kelas</span></h1>
            <p class="text-[15px] text-slate-500 max-w-md mx-auto leading-relaxed font-medium">
              Silakan lengkapi formulir di bawah ini untuk mendaftar dan mengikuti kelas tutoring.
            </p>
          </div>

          @if(session('success'))
            <div class="animate-fade-in-up stagger-2 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold flex items-start gap-3 shadow-sm">
                <span class="iconify text-emerald-500 text-xl shrink-0 mt-0.5" data-icon="lucide:check-circle"></span> {{ session('success') }}
            </div>
          @endif

          <form action="/pendaftaran-kelas" method="post" class="space-y-6 animate-fade-in-up stagger-2">
            @csrf

            <!-- Nama Peserta -->
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                    <span class="iconify text-brand-blue" data-icon="lucide:user"></span> Nama Peserta
                </label>
                <div class="relative group">
                    <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]" data-icon="lucide:user-circle"></span>
                    <input type="text" value="{{ Auth::user()->name }}" disabled 
                           class="w-full pl-12 pr-4 py-4 bg-brand-light/50 border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-500 cursor-not-allowed">
                </div>
            </div>

            <!-- No Telepon -->
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                    <span class="iconify text-brand-blue" data-icon="lucide:phone"></span> No Telepon / WhatsApp <span class="text-brand-red">*</span>
                </label>
                <div class="relative group">
                    <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:smartphone"></span>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{ Auth::user()->no_telepon }}" placeholder="Contoh: 081234567890" required 
                           class="w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-sm placeholder:text-slate-400 placeholder:font-normal">
                </div>
            </div>

            <!-- Kelas Tutor -->
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                    <span class="iconify text-brand-blue" data-icon="lucide:book-open"></span> Pilih Kelas Tutor <span class="text-brand-red">*</span>
                </label>
                <div class="relative group">
                    <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] z-10 pointer-events-none group-focus-within:text-brand-blue transition-colors" data-icon="lucide:graduation-cap"></span>
                    <select name="teaching_schedule_id" required 
                            class="w-full pl-12 pr-12 py-4 bg-white border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer shadow-sm">
                        <option value="" disabled selected class="text-slate-500 font-normal">— Silakan Pilih Kelas —</option>
                        @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}" class="text-slate-800" {{ request('jadwal_id') == $schedule->id ? 'selected' : '' }}>
                          {{ $schedule->topik_pembahasan }} — (Oleh: {{ $schedule->user->name }}) | {{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('d M') }}
                        </option>
                        @endforeach
                    </select>
                    <!-- Custom Arrow for Select -->
                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none bg-gradient-to-l from-white via-white to-transparent rounded-r-[16px]">
                      <span class="iconify text-slate-400 text-lg" data-icon="lucide:chevron-down"></span>
                    </div>
                </div>
                <div class="text-[12px] text-slate-500 ml-1 mt-2 font-bold"><span class="iconify inline text-brand-yellow mr-1" data-icon="lucide:info"></span>Pengajuan akan diverifikasi langsung oleh tutor bersangkutan.</div>
            </div>

            <button type="submit" class="btn-shine w-full py-4 mt-8 bg-brand-yellow hover:bg-yellow-400 text-brand-blue font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2 text-[15px] group/btn">
                Daftar Kelas Sekarang <span class="iconify text-[20px] group-hover/btn:translate-x-1 transition-transform" data-icon="lucide:arrow-right"></span>
            </button>
          </form>

          <!-- Footer Note -->
          <div class="text-center mt-12 text-[13px] text-slate-500 font-medium leading-relaxed border-t border-slate-100 pt-8 animate-fade-in-up stagger-2">
            Dengan mendaftar, Anda menyetujui bahwa data yang diisi adalah benar.<br>
            Pantau status pendaftaran di halaman <a href="/aktivitas-peserta" class="text-brand-blue font-extrabold hover:text-brand-yellow transition-colors underline decoration-brand-blue/30 underline-offset-4">Aktivitas Peserta</a>.
          </div>

        </div>
      </div>
    </div>
  </main>

</body>
</html>