<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - List Pendaftar</title>
  
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

  <!-- Main Content -->
  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[5%] right-[10%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Pengajuan Tutor <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">List Pendaftar Kelas</span>
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

    <div class="p-6 md:p-10 flex-1 relative z-10">
      
      <!-- Premium Page Header -->
      <div class="relative overflow-hidden bg-brand-blue px-10 py-12 rounded-[32px] shadow-[0_20px_40px_-15px_rgba(15,76,129,0.3)] mb-10 animate-fade-in-up border border-brand-blue">
        <!-- Decorative Orbs -->
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -3s;"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>
        
        <div class="relative z-10 flex flex-col xl:flex-row items-center justify-between gap-8">
          <div class="text-center xl:text-left">
            <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Peserta <span class="text-brand-yellow">Kelas Anda</span></h1>
            <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
              Kelola peserta yang mendaftar pada kelas tutoring Anda. Tinjau pendaftaran dan berikan akses kepada mereka untuk mengikuti kelas.
            </p>
          </div>
          
          <!-- Stats Grid -->
          <div class="flex gap-4 flex-wrap justify-center xl:justify-end w-full xl:w-auto">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg">
                <div class="text-[32px] font-extrabold text-white leading-none mb-1.5">{{ $stats['total'] }}</div>
                <div class="text-[10px] uppercase font-extrabold text-blue-200 tracking-widest">Total Pendaftar</div>
            </div>
            <div class="bg-emerald-500/10 backdrop-blur-md border border-emerald-500/30 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-500/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="text-[32px] font-extrabold text-emerald-400 leading-none mb-1.5">{{ $stats['approved'] }}</div>
                    <div class="text-[10px] uppercase font-extrabold text-emerald-200/90 tracking-widest">Disetujui</div>
                </div>
            </div>
            <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg relative overflow-hidden hidden sm:block">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="text-[32px] font-extrabold text-brand-yellow leading-none mb-1.5">{{ $stats['pending'] }}</div>
                    <div class="text-[10px] uppercase font-extrabold text-yellow-200/90 tracking-widest">Menunggu</div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Filter & Search Toolbar -->
      <div class="flex flex-col md:flex-row gap-5 justify-between items-center mb-8 animate-fade-in-up stagger-1">
          <form action="/list-pendaftar" method="GET" class="relative w-full xl:max-w-md group">
              <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
              <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ $search }}" 
                     class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
              <input type="hidden" name="filter" value="{{ $filter }}">
          </form>

          <div class="flex items-center gap-2 p-2 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] shadow-[0_8px_30px_rgb(15,76,129,0.04)] overflow-x-auto w-full md:w-auto hide-scrollbar">
              <a href="/list-pendaftar?filter=all&search={{ $search }}" 
                 class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all whitespace-nowrap {{ $filter === 'all' ? 'bg-brand-blue text-white shadow-[0_4px_12px_rgba(15,76,129,0.2)]' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
                  Semua
              </a>
              <a href="/list-pendaftar?filter=approved&search={{ $search }}" 
                 class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all whitespace-nowrap {{ $filter === 'approved' ? 'bg-emerald-50 border border-emerald-200 text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
                  <span class="w-1.5 h-1.5 rounded-full {{ $filter === 'approved' ? 'bg-emerald-500' : 'bg-slate-300' }}"></span> Disetujui
              </a>
              <a href="/list-pendaftar?filter=pending&search={{ $search }}" 
                 class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all whitespace-nowrap {{ $filter === 'pending' ? 'bg-brand-yellow/10 border border-brand-yellow/30 text-yellow-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
                  <span class="w-1.5 h-1.5 rounded-full {{ $filter === 'pending' ? 'bg-brand-yellow' : 'bg-slate-300' }}"></span> Menunggu
              </a>
              <a href="/list-pendaftar?filter=rejected&search={{ $search }}" 
                 class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all whitespace-nowrap {{ $filter === 'rejected' ? 'bg-brand-red/10 border border-brand-red/20 text-brand-red shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
                  <span class="w-1.5 h-1.5 rounded-full {{ $filter === 'rejected' ? 'bg-brand-red' : 'bg-slate-300' }}"></span> Ditolak
              </a>
          </div>
      </div>

      <!-- Luxury Table -->
      <div class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden mb-8 relative z-0 animate-fade-in-up stagger-2">
        <div class="overflow-x-auto">
          <table class="w-full text-left min-w-[900px]">
            <thead class="bg-brand-light/50 border-b border-slate-200">
              <tr>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Data Peserta</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Informasi Kontak</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Kelas / Topik</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Status & Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($pendaftar as $index => $p)
              <tr class="hover:bg-brand-light/40 transition-colors group">
                <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                
                <td class="py-5 px-6 align-top">
                  <div class="flex items-center gap-4">
                      <div class="w-12 h-12 rounded-[16px] bg-brand-blue flex items-center justify-center text-white text-lg font-extrabold shadow-sm shrink-0">
                          {{ strtoupper(substr($p->user->name, 0, 2)) }}
                      </div>
                      <div class="flex flex-col gap-1">
                          <span class="text-[15px] font-extrabold text-slate-800">{{ $p->user->name }}</span>
                          <span class="text-[12px] font-bold text-slate-500">Mendaftar: {{ $p->created_at->format('d M, H:i') }}</span>
                      </div>
                  </div>
                </td>
                
                <td class="py-5 px-6 align-top">
                  <div class="flex flex-col gap-2">
                      <span class="inline-flex items-center gap-2 text-[13px] font-extrabold text-slate-600 bg-brand-light px-3 py-1.5 rounded-[12px] border border-slate-200 w-fit shadow-sm">
                          <span class="iconify text-brand-blue" data-icon="lucide:mail"></span> {{ $p->user->email }}
                      </span>
                  </div>
                </td>
                
                <td class="py-5 px-6 align-top">
                    <div class="text-[14px] font-extrabold text-brand-blue leading-snug line-clamp-2 mb-1.5">{{ $p->teachingSchedule->topik_pembahasan }}</div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-extrabold text-blue-700 bg-blue-50 border border-blue-200">
                        <span class="iconify" data-icon="lucide:calendar-clock"></span> 
                        {{ \Carbon\Carbon::parse($p->teachingSchedule->tanggal)->format('d M') }}, {{ explode(' - ', $p->teachingSchedule->waktu)[0] }}
                    </div>
                </td>
                
                <td class="py-5 px-6 align-top text-center">
                  
                  @php
                      $badgeClass = '';
                      $dotClass = '';
                      $label = '';
                      if($p->status == 'approved') { 
                          $badgeClass = 'bg-emerald-50 border-emerald-200 text-emerald-700 hover:bg-emerald-100'; 
                          $dotClass = 'bg-emerald-500';
                          $label = 'Disetujui'; 
                      } elseif($p->status == 'rejected') { 
                          $badgeClass = 'bg-brand-red/10 border-brand-red/20 text-brand-red hover:bg-brand-red/20'; 
                          $dotClass = 'bg-brand-red';
                          $label = 'Ditolak'; 
                      } else { 
                          $badgeClass = 'bg-brand-yellow/10 border-brand-yellow/30 text-yellow-700 hover:bg-brand-yellow/20'; 
                          $dotClass = 'bg-brand-yellow';
                          $label = 'Menunggu'; 
                      }
                  @endphp
                  
                  <div class="relative inline-block text-left group/dropdown">
                      <details class="group [&_summary::-webkit-details-marker]:hidden">
                          <summary class="inline-flex items-center gap-2 px-4 py-2.5 rounded-[12px] border {{ $badgeClass }} text-[11px] font-extrabold uppercase tracking-widest cursor-pointer transition-colors select-none shadow-sm">
                              <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                              {{ $label }}
                              <span class="iconify text-slate-400 group-open:rotate-180 transition-transform" data-icon="lucide:chevron-down"></span>
                          </summary>
                          
                          <!-- Dropdown Menu -->
                          <div class="absolute right-0 mt-2 w-52 origin-top-right rounded-[16px] bg-white shadow-[0_15px_40px_rgba(15,76,129,0.15)] ring-1 ring-slate-200 focus:outline-none p-2 z-50 overflow-hidden transform scale-95 opacity-0 group-open:scale-100 group-open:opacity-100 transition-all duration-200">
                              <div class="px-3 py-2 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest border-b border-slate-100 mb-1">
                                  Ubah Status
                              </div>
                              <form action="/list-pendaftar/{{ $p->id }}/approve" method="POST" class="m-0">
                                  @csrf
                                  <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-extrabold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 rounded-[10px] transition-colors">
                                      <span class="iconify text-emerald-500 text-[18px]" data-icon="lucide:check-circle-2"></span> Setujui Peserta
                                  </button>
                              </form>
                              <form action="/list-pendaftar/{{ $p->id }}/reject" method="POST" class="m-0 mt-1">
                                  @csrf
                                  <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-extrabold text-slate-700 hover:bg-brand-red/10 hover:text-brand-red rounded-[10px] transition-colors">
                                      <span class="iconify text-brand-red text-[18px]" data-icon="lucide:x-circle"></span> Tolak Peserta
                                  </button>
                              </form>
                          </div>
                      </details>
                  </div>

                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="py-24 text-center">
                  <div class="flex flex-col items-center justify-center text-slate-500">
                      <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                          <span class="iconify text-4xl text-slate-300" data-icon="lucide:users"></span>
                      </div>
                      <p class="text-[18px] font-extrabold text-brand-blue">Belum ada pendaftar</p>
                      <p class="text-[14px] mt-1 font-medium text-slate-500">Saat ini belum ada peserta yang mendaftar di kelas Anda.</p>
                  </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        <div class="bg-brand-light/50 border-t border-slate-100 p-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[13px] text-slate-500 font-medium">
          <div>Menampilkan <span class="font-extrabold text-brand-blue">{{ $pendaftar->count() }}</span> data</div>
          <div class="flex items-center gap-2 text-[12px] bg-white px-4 py-2 rounded-[12px] border border-slate-200 font-bold shadow-sm">
              <span class="iconify text-brand-yellow text-[16px]" data-icon="lucide:info"></span> Klik status untuk mengubah persetujuan.
          </div>
        </div>
      </div>

    </div>
  </main>

  <script>
    document.addEventListener('click', function(e) {
        const details = document.querySelectorAll('details');
        details.forEach(detail => {
            if (detail !== e.target.closest('details')) {
                detail.removeAttribute('open');
            }
        });
    });
  </script>
</body>
</html>