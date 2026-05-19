<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Aktivitas Peserta</title>
  
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
<body class="bg-brand-light font-sans min-h-screen text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">
  <x-sidebar />

  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[10%] right-[5%] w-[450px] h-[450px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[10%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Layanan Tutor <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Aktivitas Peserta</span>
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
    <div class="relative overflow-hidden bg-brand-blue px-10 py-12 mx-6 mt-8 rounded-[32px] shadow-[0_20px_40px_-15px_rgba(15,76,129,0.3)] animate-fade-in-up border border-brand-blue z-10">
      <!-- Decorative Orbs -->
      <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
      <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -3s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        <div>
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Status <span class="text-brand-yellow">Pendaftaran</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Pantau dan ikuti perkembangan pengajuan pendaftaran kelas bimbingan yang telah kamu ajukan kepada tutor terkait.
          </p>
        </div>
      </div>
    </div>

    <!-- Content Section -->
    <div class="p-6 md:p-8 flex-1 relative z-10">
      
      <!-- Premium Profile Card -->
      <div class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] p-8 mb-10 flex items-center gap-6 animate-fade-in-up stagger-1">
        <div class="w-[72px] h-[72px] rounded-[20px] bg-brand-blue flex items-center justify-center text-white text-[28px] font-extrabold shadow-sm shrink-0">
            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
        </div>
        <div>
            <h2 class="text-[24px] font-extrabold text-brand-blue mb-2 leading-none">{{ Auth::user()->name }}</h2>
            <div class="flex items-center gap-4 flex-wrap">
                <span class="inline-flex items-center gap-2 text-[14px] font-extrabold text-slate-500 bg-brand-light px-4 py-2 rounded-[12px] border border-slate-200 shadow-sm">
                    <span class="iconify text-brand-blue" data-icon="lucide:mail"></span>
                    {{ Auth::user()->email }}
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-[12px] bg-emerald-50 text-emerald-700 text-[12px] font-extrabold border border-emerald-200 uppercase tracking-widest shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span> Aktif
                </span>
            </div>
        </div>
      </div>

      <!-- Toolbar -->
      <div class="flex flex-col xl:flex-row xl:items-center justify-between mb-8 gap-5 animate-fade-in-up stagger-1">
        <form action="/aktivitas-peserta" method="GET" class="relative group w-full xl:max-w-md">
          <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
          <input type="text" name="search" placeholder="Cari topik kelas yang didaftar..." value="{{ $search }}" 
                 class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
        </form>

        <div class="flex flex-wrap gap-2 p-2 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] shadow-[0_8px_30px_rgb(15,76,129,0.04)]">
          <a href="/aktivitas-peserta?status=all&search={{ $search }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ !$status || $status === 'all' ? 'bg-brand-blue text-white shadow-[0_4px_12px_rgba(15,76,129,0.2)]' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             Semua
          </a>
          <a href="/aktivitas-peserta?status=pending&search={{ $search }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'pending' ? 'bg-brand-yellow/10 border border-brand-yellow/30 text-yellow-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow"></span> Menunggu
          </a>
          <a href="/aktivitas-peserta?status=approved&search={{ $search }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'approved' ? 'bg-emerald-50 border border-emerald-200 text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
          </a>
          <a href="/aktivitas-peserta?status=rejected&search={{ $search }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'rejected' ? 'bg-brand-red/10 border border-brand-red/20 text-brand-red shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-red"></span> Ditolak
          </a>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12 animate-fade-in-up stagger-2">
        <div class="bg-white/95 backdrop-blur-md border border-slate-200 rounded-[24px] p-8 shadow-[0_20px_50px_rgba(15,76,129,0.05)] relative overflow-hidden group hover:-translate-y-1 transition-all">
          <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-brand-light rounded-full group-hover:scale-110 transition-transform"></div>
          <div class="relative z-10">
              <div class="text-[40px] font-extrabold text-brand-blue mb-2 leading-none">{{ $stats['total'] }}</div>
              <div class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Total Diajukan</div>
          </div>
        </div>
        <div class="bg-white/95 backdrop-blur-md border border-emerald-200 rounded-[24px] p-8 shadow-[0_20px_50px_rgba(16,185,129,0.05)] relative overflow-hidden group hover:-translate-y-1 transition-all">
          <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-110 transition-transform"></div>
          <div class="relative z-10">
              <div class="text-[40px] font-extrabold text-emerald-600 mb-2 leading-none">{{ $stats['approved'] }}</div>
              <div class="text-[11px] font-extrabold text-emerald-600/70 uppercase tracking-widest">Disetujui</div>
          </div>
        </div>
        <div class="bg-white/95 backdrop-blur-md border border-brand-yellow/30 rounded-[24px] p-8 shadow-[0_20px_50px_rgba(245,158,11,0.05)] relative overflow-hidden group hover:-translate-y-1 transition-all">
          <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-brand-yellow/10 rounded-full group-hover:scale-110 transition-transform"></div>
          <div class="relative z-10">
              <div class="text-[40px] font-extrabold text-brand-yellow mb-2 leading-none">{{ $stats['pending'] }}</div>
              <div class="text-[11px] font-extrabold text-yellow-700/70 uppercase tracking-widest">Menunggu</div>
          </div>
        </div>
        <div class="bg-white/95 backdrop-blur-md border border-brand-red/20 rounded-[24px] p-8 shadow-[0_20px_50px_rgba(225,29,72,0.05)] relative overflow-hidden group hover:-translate-y-1 transition-all">
          <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-brand-red/5 rounded-full group-hover:scale-110 transition-transform"></div>
          <div class="relative z-10">
              <div class="text-[40px] font-extrabold text-brand-red mb-2 leading-none">{{ $stats['rejected'] }}</div>
              <div class="text-[11px] font-extrabold text-red-600/70 uppercase tracking-widest">Ditolak</div>
          </div>
        </div>
      </div>

      <!-- Section Title -->
      <div class="flex items-center gap-4 mb-8 animate-fade-in-up stagger-3">
        <h2 class="text-[14px] font-extrabold text-brand-blue uppercase tracking-widest flex items-center gap-3">
            <span class="w-10 h-10 rounded-[12px] bg-brand-blue/10 flex items-center justify-center text-brand-blue border border-brand-blue/20 shadow-sm">
                <span class="iconify text-[20px]" data-icon="lucide:book-open"></span>
            </span> 
            Daftar Kelas Diajukan
        </h2>
        <div class="flex-1 h-px bg-slate-200"></div>
      </div>

      <!-- Registration List (Bento style) -->
      <div class="space-y-6 animate-fade-in-up stagger-3">
        @forelse($pendaftarans as $p)
          @php
              $statusClass = '';
              $statusIcon = '';
              $statusLabel = '';
              $borderClass = '';
              $bgIcon = '';
              $tlmClass = '';
              
              if($p->status == 'approved') { 
                  $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-200'; 
                  $borderClass = 'border-l-emerald-500';
                  $bgIcon = 'bg-emerald-50 text-emerald-600 border-emerald-200';
                  $statusIcon = 'lucide:check-circle-2'; 
                  $statusLabel = 'Disetujui'; 
                  $tlmClass = 'bg-emerald-500';
              }
              elseif($p->status == 'rejected') { 
                  $statusClass = 'bg-brand-red/10 text-brand-red border-brand-red/20'; 
                  $borderClass = 'border-l-brand-red';
                  $bgIcon = 'bg-brand-red/10 text-brand-red border-brand-red/20';
                  $statusIcon = 'lucide:x-circle'; 
                  $statusLabel = 'Ditolak'; 
                  $tlmClass = 'bg-brand-red';
              }
              else { 
                  $statusClass = 'bg-brand-yellow/10 text-yellow-700 border-brand-yellow/30'; 
                  $borderClass = 'border-l-brand-yellow';
                  $bgIcon = 'bg-brand-yellow/10 text-yellow-600 border-brand-yellow/30';
                  $statusIcon = 'lucide:clock'; 
                  $statusLabel = 'Menunggu'; 
                  $tlmClass = 'bg-brand-yellow animate-pulse';
              }
              
              $schedule = $p->teachingSchedule;
          @endphp
          
          <div class="bg-white rounded-[24px] border border-slate-200 border-l-[8px] {{ $borderClass }} p-8 shadow-[0_20px_50px_rgba(15,76,129,0.03)] hover:shadow-[0_25px_60px_rgba(15,76,129,0.08)] transition-all group relative overflow-hidden">
            <!-- Decorative blurred orb -->
            <div class="absolute -right-10 -bottom-10 w-48 h-48 {{ str_replace('text', 'bg', $bgIcon) }} opacity-15 rounded-full blur-[60px] pointer-events-none"></div>

            <div class="flex flex-col md:flex-row gap-8 relative z-10">
                <!-- Icon -->
                <div class="w-[64px] h-[64px] rounded-[20px] {{ $bgIcon }} flex items-center justify-center shrink-0 shadow-sm border">
                    <span class="iconify text-[32px]" data-icon="{{ $statusIcon }}"></span>
                </div>
                
                <!-- Info -->
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        <h3 class="text-[20px] font-extrabold text-brand-blue group-hover:text-brand-yellow transition-colors">{{ $schedule->topik_pembahasan }}</h3>
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-[10px] text-[11px] font-extrabold uppercase tracking-widest border {{ $statusClass }} shadow-sm">
                            <span class="iconify text-[14px]" data-icon="{{ $statusIcon }}"></span> {{ $statusLabel }}
                        </span>
                    </div>
                    
                    <div class="flex flex-wrap gap-x-6 gap-y-4 mb-6">
                        <span class="inline-flex items-center gap-2 text-[14px] font-bold text-slate-700 bg-brand-light px-4 py-2 rounded-[12px] border border-slate-200 shadow-sm">
                            <span class="iconify text-brand-blue text-[18px]" data-icon="lucide:calendar"></span>
                            {{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('l, d M Y') }}
                        </span>
                        <span class="inline-flex items-center gap-2 text-[14px] font-bold text-slate-700 bg-brand-light px-4 py-2 rounded-[12px] border border-slate-200 shadow-sm">
                            <span class="iconify text-brand-yellow text-[18px]" data-icon="lucide:clock"></span>
                            {{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} – {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}
                        </span>
                        <span class="inline-flex items-center gap-2 text-[14px] font-medium text-slate-600 bg-brand-light px-4 py-2 rounded-[12px] border border-slate-200 shadow-sm">
                            <span class="iconify text-brand-red text-[18px]" data-icon="lucide:user"></span>
                            Tutor: <span class="font-extrabold text-slate-800">{{ $schedule->user->name }}</span>
                        </span>
                    </div>

                    <!-- Timeline -->
                    <div class="pt-5 border-t border-slate-100 flex flex-wrap gap-x-6 gap-y-3">
                        <span class="inline-flex items-center gap-2 text-[13px] font-bold text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                            Diajukan: {{ $p->created_at->format('d M, H:i') }}
                        </span>
                        
                        @if($p->status == 'approved')
                        <span class="inline-flex items-center gap-2 text-[13px] font-extrabold text-emerald-600">
                            <span class="w-2 h-2 rounded-full {{ $tlmClass }}"></span>
                            Disetujui: {{ $p->updated_at->format('d M, H:i') }}
                        </span>
                        @elseif($p->status == 'rejected')
                        <span class="inline-flex items-center gap-2 text-[13px] font-extrabold text-brand-red">
                            <span class="w-2 h-2 rounded-full {{ $tlmClass }}"></span>
                            Ditolak: {{ $p->updated_at->format('d M, H:i') }}
                        </span>
                        @else
                        <span class="inline-flex items-center gap-2 text-[13px] font-extrabold text-yellow-600">
                            <span class="w-2 h-2 rounded-full {{ $tlmClass }}"></span>
                            Menunggu review tutor...
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Action -->
                <div class="md:self-center shrink-0">
                    @if($p->status == 'approved')
                    <a href="/informasi-kelas" class="inline-flex items-center gap-2 px-6 py-4 rounded-[16px] bg-brand-yellow hover:bg-yellow-400 text-brand-blue text-[15px] font-extrabold shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] hover:-translate-y-1 transition-all group/btn">
                        <span class="iconify text-[20px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:calendar-days"></span> Lihat Jadwal
                    </a>
                    @else
                    <button disabled class="inline-flex items-center gap-2 px-6 py-4 rounded-[16px] bg-slate-50 text-slate-400 border border-slate-200 text-[14px] font-extrabold cursor-not-allowed">
                        {{ $statusLabel }}
                    </button>
                    @endif
                </div>
            </div>
          </div>
        @empty
          <div class="bg-white rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] p-16 text-center">
            <div class="w-[100px] h-[100px] bg-brand-light rounded-full flex items-center justify-center mx-auto mb-6 border border-slate-200 shadow-sm">
                <span class="iconify text-[48px] text-slate-300" data-icon="lucide:search-x"></span>
            </div>
            <h3 class="text-[24px] font-extrabold text-brand-blue mb-2">Belum ada kelas</h3>
            <p class="text-[15px] font-medium text-slate-500">Kamu belum mendaftar kelas apapun saat ini.</p>
          </div>
        @endforelse
      </div>

    </div>
  </main>
</body>
</html>