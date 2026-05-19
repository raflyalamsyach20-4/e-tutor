<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Status Pengajuan</title>
  
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
      <div class="absolute top-[5%] right-[10%] w-[350px] h-[350px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[10%] left-[10%] w-[450px] h-[450px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Pengajuan Tutor <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Status Pengajuan</span>
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

    <div class="p-6 md:p-10 flex-1 flex flex-col items-center relative z-10">
      
      <div class="w-full max-w-5xl">
        <!-- Premium Page Header -->
        <div class="relative overflow-hidden bg-brand-blue px-10 py-12 rounded-[32px] shadow-[0_20px_40px_-15px_rgba(15,76,129,0.3)] mb-12 animate-fade-in-up border border-brand-blue">
          <!-- Decorative Orbs -->
          <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
          <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -3s;"></div>
          <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>
          
          <div class="relative z-10 flex flex-col xl:flex-row items-center justify-between gap-8">
            <div class="text-center xl:text-left flex-1">
              <div class="w-16 h-16 bg-white/10 border border-white/20 rounded-[24px] flex items-center justify-center text-3xl mb-6 backdrop-blur-md mx-auto xl:mx-0 shadow-sm text-brand-yellow">
                  <span class="iconify" data-icon="lucide:clipboard-check"></span>
              </div>
              <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Status <span class="text-brand-yellow">Pengajuan</span></h1>
              <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium mx-auto xl:mx-0">
                Pantau status formulir pengajuan Anda untuk menjadi E-Tutor. Verifikasi dilakukan langsung oleh Kepala Program Studi (Kaprodi).
              </p>
            </div>

            <!-- Stats Grid -->
            <div class="flex gap-4 flex-wrap justify-center w-full xl:w-auto">
              <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg">
                  <div class="text-[32px] font-extrabold text-white leading-none mb-1.5">{{ $stats['total'] }}</div>
                  <div class="text-[10px] uppercase font-extrabold text-blue-200 tracking-widest">Total Diajukan</div>
              </div>
              <div class="bg-emerald-500/10 backdrop-blur-md border border-emerald-500/30 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg relative overflow-hidden">
                  <div class="absolute inset-0 bg-gradient-to-t from-emerald-500/10 to-transparent"></div>
                  <div class="relative z-10">
                      <div class="text-[32px] font-extrabold text-emerald-400 leading-none mb-1.5">{{ $stats['approved'] }}</div>
                      <div class="text-[10px] uppercase font-extrabold text-emerald-200/90 tracking-widest">Disetujui</div>
                  </div>
              </div>
              <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-6 py-5 min-w-[120px] text-center shadow-lg relative overflow-hidden">
                  <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
                  <div class="relative z-10">
                      <div class="text-[32px] font-extrabold text-brand-yellow leading-none mb-1.5">{{ $stats['pending'] }}</div>
                      <div class="text-[10px] uppercase font-extrabold text-yellow-200/90 tracking-widest">Menunggu</div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Section Title -->
        <div class="flex items-center gap-4 mb-6 animate-fade-in-up stagger-1">
          <h2 class="text-[13px] font-extrabold text-brand-blue uppercase tracking-widest flex items-center gap-3">
              <span class="w-10 h-10 rounded-[12px] bg-brand-blue/10 flex items-center justify-center text-brand-blue border border-brand-blue/20 shadow-sm">
                  <span class="iconify text-[20px]" data-icon="lucide:history"></span>
              </span> 
              Riwayat Pengajuan
          </h2>
          <div class="flex-1 h-px bg-slate-200"></div>
        </div>

        <!-- Luxury Table -->
        <div class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden mb-8 relative z-0 animate-fade-in-up stagger-1">
          <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[900px]">
              <thead class="bg-brand-light/50 border-b border-slate-200">
                <tr>
                  <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                  <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Data Pemohon</th>
                  <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Topik & Deskripsi</th>
                  <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Bukti Kelayakan</th>
                  <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-48">Status Approval</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100/80">
                @forelse($applications as $index => $app)
                <tr class="hover:bg-brand-light/40 transition-colors group">
                  <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                  
                  <td class="py-5 px-6 align-top">
                    <div class="flex flex-col gap-1.5">
                      <span class="text-[15px] font-extrabold text-slate-800">{{ $app->nama }}</span>
                      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-[8px] bg-slate-50 text-slate-500 text-[12px] font-extrabold border border-slate-200 w-fit font-mono tracking-wider shadow-sm">
                        <span class="iconify text-brand-blue" data-icon="lucide:hash"></span> {{ $app->nim }}
                      </span>
                    </div>
                  </td>
                  
                  <td class="py-5 px-6 align-top">
                    <div class="text-[15px] font-extrabold text-brand-blue leading-snug max-w-xs mb-2">{{ $app->topik_pembahasan }}</div>
                    <p class="text-[13px] font-medium text-slate-500 leading-relaxed max-w-[280px] line-clamp-3 bg-brand-light/80 p-3 rounded-[12px] border border-slate-200 shadow-sm">
                        {{ $app->deskripsi_job }}
                    </p>
                  </td>
                  
                  <td class="py-5 px-6 align-top text-center">
                    <a href="{{ Storage::url($app->bukti_memenuhi) }}" target="_blank" class="inline-flex flex-col items-center justify-center gap-1.5 w-[72px] h-[72px] rounded-[16px] bg-white text-brand-blue hover:bg-brand-blue hover:text-brand-yellow transition-all border border-slate-200 shadow-sm mx-auto group/btn">
                        <span class="iconify text-[28px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:file-text"></span>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest">Buka</span>
                    </a>
                  </td>
                  
                  <td class="py-5 px-6 align-top text-center">
                    
                    @if($app->status === 'pending')
                        <span class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-[12px] bg-brand-yellow/10 text-yellow-700 border border-brand-yellow/30 text-[11px] font-extrabold uppercase tracking-widest w-full shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow animate-pulse"></span> Menunggu
                        </span>
                    @elseif($app->status === 'approved')
                        <span class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-[12px] bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-extrabold uppercase tracking-widest w-full shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
                        </span>
                        <div class="mt-2 text-[11px] font-extrabold text-emerald-600/80">Dapat membuat jadwal kelas.</div>
                    @else
                        <span class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-[12px] bg-brand-red/10 text-brand-red border border-brand-red/20 text-[11px] font-extrabold uppercase tracking-widest w-full shadow-sm mb-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-red"></span> Ditolak
                        </span>
                        @if($app->catatan_kaprodi)
                            <div class="text-left p-3 bg-red-50 border border-red-100 rounded-[12px] text-[12px] text-red-800 leading-relaxed font-medium shadow-sm">
                                <span class="font-extrabold block mb-1 text-brand-red text-[10px] uppercase tracking-widest"><span class="iconify inline align-text-bottom mr-0.5 text-[14px]" data-icon="lucide:info"></span> Catatan Kaprodi:</span>
                                {{ $app->catatan_kaprodi }}
                            </div>
                        @endif
                    @endif

                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-500">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                            <span class="iconify text-4xl text-slate-300" data-icon="lucide:inbox"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue">Belum ada pengajuan</p>
                        <p class="text-[14px] mt-1 font-medium text-slate-500 mb-6">Anda belum pernah mengajukan diri sebagai tutor.</p>
                        <a href="/pengajuan-tutor" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-yellow text-brand-blue hover:bg-yellow-400 font-extrabold rounded-[16px] transition-all shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] hover:-translate-y-0.5 text-[13px]">
                            <span class="iconify text-[18px]" data-icon="lucide:plus"></span> Buat Pengajuan Baru
                        </a>
                    </div>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="text-center text-[13px] font-medium text-slate-500 bg-white rounded-[16px] py-4 px-6 border border-slate-200 shadow-[0_4px_15px_rgba(15,76,129,0.02)] max-w-2xl mx-auto animate-fade-in-up stagger-2">
            <span class="iconify inline text-emerald-500 mr-1 text-[18px] align-text-bottom" data-icon="lucide:check-circle-2"></span> Status <strong class="text-emerald-600 font-extrabold">Disetujui</strong> berarti pengajuan telah diterima dan Anda berhak membuka kelas E-Tutor.
        </div>

      </div>
    </div>
  </main>

</body>
</html>