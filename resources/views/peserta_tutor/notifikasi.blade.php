<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Notifikasi</title>
  
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

    .animate-fade-in-up {
      animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
      opacity: 0;
    }
    
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }

    .floating-shape {
      animation: floatSlow 8s ease-in-out infinite;
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
<body class="bg-brand-light font-sans text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">

  <x-sidebar />

  <!-- Main Content -->
  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background (Blue, Yellow, Red) for Main Area -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[5%] left-[5%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] right-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute top-[40%] right-[30%] w-[300px] h-[300px] bg-brand-red/5 rounded-full blur-[80px] floating-shape" style="animation-delay: -4s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Home <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Notifikasi</span>
      </div>
      <div class="flex items-center gap-3 relative z-10">
        <button class="relative w-10 h-10 rounded-[12px] border border-slate-200 bg-white flex items-center justify-center text-slate-500 hover:bg-brand-blue hover:text-brand-yellow hover:border-brand-blue transition-all shadow-sm group">
          <span class="iconify text-xl group-hover:scale-110 transition-transform" data-icon="lucide:bell"></span>
          @if(Auth::user()->notifications()->where('is_read', false)->exists())
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-brand-red rounded-full border-2 border-white animate-pulse shadow-sm"></span>
          @endif
        </button>
      </div>
    </header>

    <div class="p-6 md:p-10 flex-1 relative z-10">
      
      <!-- Premium Page Header -->
      <div class="relative overflow-hidden bg-brand-blue px-10 py-12 rounded-[32px] shadow-[0_20px_40px_-15px_rgba(15,76,129,0.3)] mb-12 animate-fade-in-up">
        <!-- Decorative Orbs inside Header -->
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -3s;"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
          <div>
            <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Pusat <span class="text-brand-yellow">Notifikasi</span></h1>
            <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
              Pengingat jadwal kelas dan informasi penting dari sistem E-Tutor. Pastikan Anda memeriksa notifikasi secara berkala.
            </p>
          </div>
          <div class="flex gap-4">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[130px] shadow-lg">
                <div class="text-[11px] uppercase tracking-widest font-extrabold text-blue-200 mb-1">Total Pesan</div>
                <div class="text-4xl font-extrabold text-white leading-none">4</div>
            </div>
            <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[130px] shadow-lg relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
                <div class="relative z-10">
                  <div class="text-[11px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-1">Belum Dibaca</div>
                  <div class="text-4xl font-extrabold text-brand-yellow leading-none">4</div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section: Hari Ini -->
      <div class="flex items-center gap-4 mb-6 animate-fade-in-up stagger-1">
        <h2 class="text-[13px] font-extrabold text-brand-blue uppercase tracking-widest flex items-center gap-3">
            <span class="w-10 h-10 rounded-[12px] bg-brand-yellow/10 flex items-center justify-center text-brand-yellow border border-brand-yellow/20 shadow-sm">
                <span class="iconify text-[20px]" data-icon="lucide:zap"></span>
            </span> 
            Hari Ini
        </h2>
        <div class="flex-1 h-px bg-slate-200"></div>
      </div>

      <div class="space-y-5 mb-12">
        <!-- Notif 1 -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] border border-slate-200 border-l-[8px] border-l-brand-red p-7 shadow-[0_8px_30px_rgb(15,76,129,0.04)] hover:shadow-[0_15px_40px_rgb(15,76,129,0.08)] transition-all flex flex-col md:flex-row gap-6 items-start group animate-fade-in-up stagger-1">
            <div class="w-14 h-14 rounded-[16px] bg-brand-red/10 text-brand-red flex items-center justify-center shrink-0 text-2xl border border-brand-red/20 group-hover:scale-110 transition-transform">
                <span class="iconify" data-icon="lucide:bell-ring"></span>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-brand-red/10 text-brand-red text-[10px] font-extrabold uppercase tracking-widest border border-brand-red/20">
                        Urgent
                    </span>
                    <span class="w-2 h-2 rounded-full bg-brand-yellow shadow-[0_0_8px_rgba(245,158,11,0.6)] animate-pulse"></span>
                </div>
                <h3 class="text-[18px] font-extrabold text-brand-blue mb-2 leading-snug group-hover:text-blue-700 transition-colors">Kelas Statistika akan dimulai dalam 1 jam</h3>
                <p class="text-[14px] text-slate-500 font-medium">Topik: Distribusi Normal dan Aplikasinya — Tutor: Udin Saputra — Dimulai pukul 08:00</p>
            </div>
            <div class="flex md:flex-col items-center md:items-end gap-3 shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-[12px] text-[12px] font-bold text-slate-500 border border-slate-200">
                    <span class="iconify text-slate-400" data-icon="lucide:clock"></span> 14 Jan 2026, 07:00
                </div>
            </div>
        </div>

        <!-- Notif 2 -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] border border-slate-200 border-l-[8px] border-l-brand-red p-7 shadow-[0_8px_30px_rgb(15,76,129,0.04)] hover:shadow-[0_15px_40px_rgb(15,76,129,0.08)] transition-all flex flex-col md:flex-row gap-6 items-start group animate-fade-in-up stagger-2">
            <div class="w-14 h-14 rounded-[16px] bg-brand-red/10 text-brand-red flex items-center justify-center shrink-0 text-2xl border border-brand-red/20 group-hover:scale-110 transition-transform">
                <span class="iconify" data-icon="lucide:bell-ring"></span>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-brand-red/10 text-brand-red text-[10px] font-extrabold uppercase tracking-widest border border-brand-red/20">
                        Urgent
                    </span>
                    <span class="w-2 h-2 rounded-full bg-brand-yellow shadow-[0_0_8px_rgba(245,158,11,0.6)] animate-pulse"></span>
                </div>
                <h3 class="text-[18px] font-extrabold text-brand-blue mb-2 leading-snug group-hover:text-blue-700 transition-colors">Kelas Pemrograman Web akan dimulai dalam 1 jam</h3>
                <p class="text-[14px] text-slate-500 font-medium">Topik: CRUD dengan PHP & MySQL — Tutor: Siti Aminah — Dimulai pukul 13:00</p>
            </div>
            <div class="flex md:flex-col items-center md:items-end gap-3 shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-[12px] text-[12px] font-bold text-slate-500 border border-slate-200">
                    <span class="iconify text-slate-400" data-icon="lucide:clock"></span> 14 Jan 2026, 12:00
                </div>
            </div>
        </div>
      </div>

      <!-- Section: Besok -->
      <div class="flex items-center gap-4 mb-6 animate-fade-in-up stagger-3">
        <h2 class="text-[13px] font-extrabold text-brand-blue uppercase tracking-widest flex items-center gap-3">
            <span class="w-10 h-10 rounded-[12px] bg-brand-blue/10 flex items-center justify-center text-brand-blue border border-brand-blue/20 shadow-sm">
                <span class="iconify text-[20px]" data-icon="lucide:calendar-clock"></span>
            </span> 
            Nanti / Besok
        </h2>
        <div class="flex-1 h-px bg-slate-200"></div>
      </div>

      <div class="space-y-5 mb-12">
        <!-- Notif 3 -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] border border-slate-200 border-l-[8px] border-l-brand-yellow p-7 shadow-[0_8px_30px_rgb(15,76,129,0.04)] hover:shadow-[0_15px_40px_rgb(15,76,129,0.08)] transition-all flex flex-col md:flex-row gap-6 items-start group animate-fade-in-up stagger-3">
            <div class="w-14 h-14 rounded-[16px] bg-brand-yellow/10 text-brand-yellow flex items-center justify-center shrink-0 text-2xl border border-brand-yellow/20 group-hover:scale-110 transition-transform">
                <span class="iconify" data-icon="lucide:clock"></span>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-brand-yellow/10 text-brand-yellow text-[10px] font-extrabold uppercase tracking-widest border border-brand-yellow/20">
                        Reminder
                    </span>
                    <span class="w-2 h-2 rounded-full bg-brand-blue shadow-[0_0_8px_rgba(15,76,129,0.6)]"></span>
                </div>
                <h3 class="text-[18px] font-extrabold text-brand-blue mb-2 leading-snug group-hover:text-blue-700 transition-colors">Jadwal mengajar Anda besok pukul 08:00</h3>
                <p class="text-[14px] text-slate-500 font-medium">Topik: Normalisasi Database (1NF - 3NF) — Peserta: 8 orang — Dimulai pukul 10:00</p>
            </div>
            <div class="flex md:flex-col items-center md:items-end gap-3 shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-[12px] text-[12px] font-bold text-slate-500 border border-slate-200">
                    <span class="iconify text-slate-400" data-icon="lucide:calendar"></span> 15 Jan 2026
                </div>
            </div>
        </div>

        <!-- Notif 4 -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] border border-slate-200 border-l-[8px] border-l-blue-500 p-7 shadow-[0_8px_30px_rgb(15,76,129,0.04)] hover:shadow-[0_15px_40px_rgb(15,76,129,0.08)] transition-all flex flex-col md:flex-row gap-6 items-start group animate-fade-in-up stagger-4">
            <div class="w-14 h-14 rounded-[16px] bg-brand-blue/10 text-blue-500 flex items-center justify-center shrink-0 text-2xl border border-brand-blue/20 group-hover:scale-110 transition-transform">
                <span class="iconify" data-icon="lucide:info"></span>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-brand-blue/10 text-brand-blue text-[10px] font-extrabold uppercase tracking-widest border border-brand-blue/20">
                        Info
                    </span>
                    <span class="w-2 h-2 rounded-full bg-brand-blue shadow-[0_0_8px_rgba(15,76,129,0.6)]"></span>
                </div>
                <h3 class="text-[18px] font-extrabold text-brand-blue mb-2 leading-snug group-hover:text-blue-700 transition-colors">Peserta baru mendaftar pada kelas Anda</h3>
                <p class="text-[14px] text-slate-500 font-medium">Rina Safitri mendaftar pada kelas Statistika — Total peserta kini 6 dari 20 kuota</p>
            </div>
            <div class="flex md:flex-col items-center md:items-end gap-3 shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-[12px] text-[12px] font-bold text-slate-500 border border-slate-200">
                    <span class="iconify text-slate-400" data-icon="lucide:calendar"></span> 15 Jan 2026
                </div>
            </div>
        </div>
      </div>

      <div class="text-center pt-8 text-[13px] font-bold text-slate-400 animate-fade-in-up stagger-4">
        <span class="iconify inline text-xl mr-1 text-brand-yellow" data-icon="lucide:bell-electric"></span> Notifikasi otomatis muncul <span class="text-brand-blue">1 jam sebelum</span> kelas dimulai.
      </div>

    </div>
  </main>
</body>
</html>