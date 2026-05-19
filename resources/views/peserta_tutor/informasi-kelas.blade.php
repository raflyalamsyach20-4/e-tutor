<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Informasi Kelas</title>
  
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
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }

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
<body class="bg-brand-light font-sans text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">
  
  <x-sidebar />

  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[5%] right-[5%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[10%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Top Bar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Layanan Belajar <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Informasi Kelas</span>
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

    <!-- Page Header (Luxury Bright Style) -->
    <div class="relative overflow-hidden bg-brand-blue px-10 py-12 mx-8 mt-8 rounded-[32px] shadow-[0_20px_40px_-15px_rgba(15,76,129,0.3)] animate-fade-in-up z-10">
      <!-- Decorative Orbs -->
      <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
      <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -3s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
        <div>
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Informasi <span class="text-brand-yellow">Kelas</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Jelajahi jadwal kelas eksklusif yang tersedia. Temukan topik pembahasan menarik dari tutor-tutor terbaik dan daftarkan diri Anda segera sebelum kuota terpenuhi.
          </p>
        </div>
        <div class="flex gap-4">
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[130px] shadow-lg">
              <div class="text-[11px] uppercase tracking-widest font-extrabold text-blue-200 mb-1">Tersedia</div>
              <div class="text-4xl font-extrabold text-white leading-none">{{ $schedules->count() }}</div>
          </div>
          <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[130px] shadow-lg relative overflow-hidden hidden md:block">
              <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
              <div class="relative z-10">
                <div class="text-[11px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-1">Hari Ini</div>
                <div class="text-4xl font-extrabold text-brand-yellow leading-none">{{ $schedules->where('tanggal', \Carbon\Carbon::today()->toDateString())->count() }}</div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="p-8 flex-1 relative z-10 animate-fade-in-up stagger-1">

      <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <form action="{{ route('informasi-kelas') }}" method="GET" class="relative group w-full xl:max-w-md">
          <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
          <input type="text" name="search" placeholder="Cari topik atau nama tutor..." value="{{ $search }}" 
                 class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
        </form>
        <button class="inline-flex items-center gap-2 px-6 py-4 rounded-[16px] bg-white/90 backdrop-blur-sm border border-slate-200 text-slate-600 text-[14px] font-extrabold hover:bg-brand-blue hover:border-brand-blue hover:text-brand-yellow transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] group">
            <span class="iconify text-[18px] group-hover:scale-110 transition-transform" data-icon="lucide:filter"></span> Filter Jadwal
        </button>
      </div>

      <!-- Luxury Table Card -->
      <div class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse min-w-[1000px]">
            <thead>
              <tr class="bg-brand-light/50 border-b border-slate-100">
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Jadwal Kelas</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Topik Pembahasan</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Waktu</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Kuota</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Status & Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($schedules as $index => $schedule)
              <tr class="hover:bg-brand-light/40 transition-colors group">
                <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                <td class="py-5 px-6 align-top">
                  <div class="flex flex-col gap-1">
                    <span class="text-[15px] font-extrabold text-slate-800">{{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('l') }}</span>
                    <span class="text-[13px] font-bold text-slate-500">{{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('d F Y') }}</span>
                  </div>
                </td>
                <td class="py-5 px-6 align-top max-w-sm">
                    <div class="text-[16px] font-extrabold text-brand-blue mb-1.5 leading-snug group-hover:text-blue-700 transition-colors">{{ $schedule->topik_pembahasan }}</div>
                    <div class="text-[13px] font-medium text-slate-500 mb-3">Tutor: <span class="font-extrabold text-slate-800">{{ $schedule->user->name ?? 'Tidak diketahui' }}</span></div>
                    
                    <details class="group/details">
                      <summary class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-brand-blue/20 bg-brand-light text-[12px] font-extrabold text-brand-blue cursor-pointer hover:bg-brand-blue hover:text-white transition-all list-none select-none shadow-sm">
                        <span class="iconify" data-icon="lucide:eye"></span> Info Tutor
                      </summary>
                      <div class="mt-3 p-4 bg-white border border-slate-100 rounded-[16px] space-y-3 shadow-[0_10px_25px_rgba(15,76,129,0.08)]">
                        <div class="flex items-center gap-3">
                          <div class="w-8 h-8 rounded-lg bg-brand-light border border-slate-200 flex items-center justify-center text-brand-blue shrink-0">
                              <span class="iconify text-[15px]" data-icon="lucide:user"></span>
                          </div>
                          <div class="flex flex-col">
                              <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Nama Tutor</span>
                              <span class="text-[13px] font-extrabold text-slate-800">{{ $schedule->user->name ?? 'Tidak diketahui' }}</span>
                          </div>
                        </div>
                        <div class="h-px bg-slate-100"></div>
                        <div class="flex items-center gap-3">
                          <div class="w-8 h-8 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-500 shrink-0">
                              <span class="iconify text-[15px]" data-icon="lucide:check-circle"></span>
                          </div>
                          <div class="flex flex-col">
                              <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Status Pengajar</span>
                              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[10px] font-extrabold bg-emerald-100 text-emerald-700 mt-1 border border-emerald-200/60 uppercase tracking-widest">
                                  <span class="iconify" data-icon="lucide:shield-check"></span> Verified
                              </span>
                          </div>
                        </div>
                      </div>
                    </details>
                </td>
                <td class="py-5 px-6 align-top">
                  <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-brand-light border border-slate-200 text-[14px] font-extrabold text-slate-700 shadow-sm">
                      <span class="iconify text-brand-yellow" data-icon="lucide:clock"></span>
                      {{ $schedule->waktu }}
                  </div>
                </td>
                <td class="py-5 px-6 align-top">
                  @php
                    $kuota_terisi = $schedule->pendaftaran->count();
                    $kuota_total = $schedule->kuota;
                    $percentage = $kuota_total > 0 ? ($kuota_terisi / $kuota_total) * 100 : 0;
                    $fill_class = $percentage < 50 ? 'from-[#0F4C81] to-[#1E3A8A]' : ($percentage < 90 ? 'from-[#F59E0B] to-[#D97706]' : 'from-[#E11D48] to-[#BE123C]');
                    $status_class = $kuota_terisi >= $kuota_total ? 'bg-brand-red/10 text-brand-red border-brand-red/20' : ($percentage >= 80 ? 'bg-brand-yellow/10 text-yellow-700 border-brand-yellow/20' : 'bg-brand-blue/10 text-brand-blue border-brand-blue/20');
                    $dot_class = $kuota_terisi >= $kuota_total ? 'bg-brand-red' : ($percentage >= 80 ? 'bg-brand-yellow' : 'bg-brand-blue');
                    $status_text = $kuota_terisi >= $kuota_total ? 'Penuh' : ($percentage >= 80 ? 'Hampir Penuh' : 'Tersedia');
                  @endphp
                  <div class="flex flex-col gap-2.5 max-w-[150px]">
                    <div class="flex justify-between items-center text-[12px] font-extrabold">
                        <span class="text-slate-800">{{ $kuota_terisi }} <span class="text-slate-400 font-bold">/ {{ $kuota_total }} org</span></span>
                    </div>
                    <div class="h-2.5 w-full bg-slate-100 rounded-full overflow-hidden shadow-inner border border-slate-200">
                      <div class="h-full rounded-full bg-gradient-to-r {{ $fill_class }} transition-all duration-500" style="width: {{ $percentage }}%"></div>
                    </div>
                  </div>
                </td>
                <td class="py-5 px-6 align-top">
                    <div class="flex flex-col items-center gap-3 w-[140px] mx-auto">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border text-[10px] font-extrabold tracking-widest uppercase shadow-sm {{ $status_class }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $dot_class }}"></span> {{ $status_text }}
                        </span>
                        
                        @php
                          $waktu_mulai = explode(' - ', $schedule->waktu)[0];
                          $start_time = \Carbon\Carbon::parse($schedule->tanggal->format('Y-m-d') . ' ' . $waktu_mulai);
                          $is_closed = now()->greaterThanOrEqualTo($start_time->subHour());
                        @endphp
                        
                        @if($is_closed)
                          <button disabled title="Pendaftaran ditutup (maksimal 1 jam sebelum kelas dimulai)" class="inline-flex items-center gap-1.5 px-4 py-3 bg-slate-50 text-slate-400 rounded-[12px] text-[13px] font-extrabold border border-slate-200 cursor-not-allowed w-full justify-center shadow-sm">
                              <span class="iconify text-[18px]" data-icon="lucide:lock"></span> Ditutup
                          </button>
                        @elseif($kuota_terisi >= $kuota_total)
                          <button disabled class="inline-flex items-center gap-1.5 px-4 py-3 bg-slate-50 text-slate-400 rounded-[12px] text-[13px] font-extrabold border border-slate-200 cursor-not-allowed w-full justify-center shadow-sm">
                              <span class="iconify text-[18px]" data-icon="lucide:ban"></span> Penuh
                          </button>
                        @else
                          <a href="/pendaftaran-kelas?jadwal_id={{ $schedule->id }}" class="btn-shine inline-flex items-center gap-1.5 px-4 py-3 bg-brand-yellow hover:bg-yellow-400 text-brand-blue rounded-[12px] text-[13px] font-extrabold shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transition-all transform hover:-translate-y-0.5 w-full justify-center group/btn">
                              <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:check-square"></span> Daftar
                          </a>
                        @endif
                    </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-400">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-4 border border-slate-200 shadow-sm">
                            <span class="iconify text-4xl text-slate-300" data-icon="lucide:search-x"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue mb-1">Belum ada kelas</p>
                        <p class="text-[14px] font-medium text-slate-500">Saat ini belum ada kelas yang dijadwalkan oleh tutor.</p>
                    </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        <div class="bg-brand-light/50 border-t border-slate-100 p-6 flex items-center justify-between text-[13px] text-slate-500 font-medium">
          <div>Menampilkan <span class="font-extrabold text-brand-blue">{{ $schedules->count() }}</span> kelas aktif</div>
        </div>
      </div>

    </div>
  </main>

  <script>
    document.querySelectorAll('details').forEach((detail) => {
        detail.addEventListener('toggle', (e) => {
            if (detail.open) {
                document.querySelectorAll('details').forEach((otherDetail) => {
                    if (otherDetail !== detail && otherDetail.open) {
                        otherDetail.removeAttribute('open');
                    }
                });
            }
        });
    });
  </script>
</body>
</html>