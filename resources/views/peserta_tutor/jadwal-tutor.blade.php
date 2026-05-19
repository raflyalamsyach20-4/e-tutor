<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Jadwal Tutor</title>
  
  <!-- Premium Font: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
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
  <style>
    /* Handling CSS routing */
    .page-wrapper { display: none; }
    #page-jadwal { display: flex; } /* Default visible */
    
    body:has(#page-jadwal-add:target) #page-jadwal { display: none; }
    body:has(#page-jadwal-add:target) #page-jadwal-add { display: flex; }
    
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
</head>
<body class="bg-brand-light font-sans min-h-screen text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">

  <x-sidebar />

  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[5%] right-[5%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[10%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute top-[40%] right-[30%] w-[300px] h-[300px] bg-brand-red/5 rounded-full blur-[80px] floating-shape" style="animation-delay: -4s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>
    
    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Portal Tutor <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Jadwal Mengajar</span>
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

    <!-- ====================================================================
         ✅ HALAMAN JADWAL TUTOR — DEFAULT PAGE
         ==================================================================== -->
    <div id="page-jadwal" class="page-wrapper flex-col flex-1 p-6 md:p-8 items-center justify-center min-h-[calc(100vh-80px)] z-10 relative">
      
      <div class="w-full max-w-5xl bg-white/95 backdrop-blur-xl rounded-[32px] p-8 md:p-12 relative overflow-hidden shadow-[0_20px_50px_rgba(15,76,129,0.08)] border border-slate-200">

        <div class="relative z-10">
          <!-- Header -->
          <div class="text-center mb-10 animate-fade-in-up">
            <div class="w-20 h-20 bg-brand-blue border border-brand-blue/20 rounded-[24px] mx-auto flex items-center justify-center text-4xl mb-6 shadow-[0_10px_25px_rgba(15,76,129,0.2)]">
                <span class="iconify text-brand-yellow" data-icon="lucide:calendar-days"></span>
            </div>
            <h1 class="text-3xl md:text-[40px] font-extrabold text-brand-blue tracking-tight mb-4 leading-none">Jadwal <span class="text-brand-yellow">Mengajar</span></h1>
            <p class="text-[15px] text-slate-500 max-w-lg mx-auto leading-relaxed font-medium">
              Kelola jadwal kelas premium Anda. Tambahkan jadwal baru atau perbarui jadwal yang sudah berjalan sesuai kapasitas Anda.
            </p>
          </div>

          <!-- Add Button & Validation -->
          <div class="mb-10 flex flex-col items-center animate-fade-in-up stagger-1">
            @if($approvedCount > 0 && $scheduleCount < $approvedCount)
                <a href="#page-jadwal-add" class="inline-flex items-center gap-2 px-8 py-4 bg-brand-yellow hover:bg-yellow-400 text-brand-blue font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] hover:-translate-y-1 transition-all text-[15px] group">
                    <span class="iconify text-xl group-hover:rotate-90 transition-transform duration-300" data-icon="lucide:plus"></span> Buat Jadwal Baru
                </a>
            @else
                <button type="button" disabled class="inline-flex items-center gap-2 px-8 py-4 bg-slate-100 text-slate-400 border border-slate-200 font-extrabold rounded-[16px] shadow-sm cursor-not-allowed text-[15px]">
                    <span class="iconify text-xl" data-icon="lucide:plus"></span> Buat Jadwal Baru
                </button>
                
                @if($approvedCount == 0)
                    <div class="mt-6 px-6 py-4 bg-brand-red/10 border border-brand-red/20 rounded-[16px] text-brand-red text-[13px] font-bold flex items-center gap-3 shadow-sm">
                        <span class="iconify text-brand-red text-xl" data-icon="lucide:shield-alert"></span> Anda belum memiliki pengajuan tutor yang disetujui.
                    </div>
                @elseif($scheduleCount >= $approvedCount)
                    <div class="mt-6 px-6 py-5 bg-brand-blue/10 border border-brand-blue/20 rounded-[16px] text-brand-blue text-[13px] font-medium flex items-start gap-4 max-w-lg text-left shadow-sm">
                        <span class="iconify text-brand-yellow text-2xl shrink-0 mt-0.5" data-icon="lucide:alert-circle"></span> 
                        <p class="leading-relaxed">Kuota pembuatan jadwal habis (1 Pengajuan = 1 Jadwal). Silakan <a href="/pengajuan-tutor" class="font-extrabold text-blue-700 hover:text-brand-yellow transition-colors border-b border-brand-blue/30 hover:border-brand-yellow pb-0.5">ajukan permohonan baru</a> untuk menambah slot kelas lain.</p>
                    </div>
                @endif
            @endif
          </div>

          <!-- Table -->
          <div class="bg-white border border-slate-200 rounded-[24px] overflow-hidden shadow-[0_10px_30px_rgba(15,76,129,0.05)] animate-fade-in-up stagger-2">
            <div class="overflow-x-auto">
              <table class="w-full text-left min-w-[800px]">
                <thead class="bg-brand-light/50 border-b border-slate-200">
                  <tr>
                    <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                    <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Hari & Tanggal</th>
                    <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Topik Pembahasan</th>
                    <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Waktu</th>
                    <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  @forelse($schedules as $index => $schedule)
                  <tr class="hover:bg-brand-light/40 transition-colors group/row">
                    <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                    <td class="py-5 px-6 align-top">
                      <div class="flex flex-col gap-1">
                        <span class="text-[15px] font-extrabold text-slate-800">{{ ucfirst($schedule->hari) }}</span>
                        <span class="text-[13px] font-bold text-slate-500">{{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('d F Y') }}</span>
                      </div>
                    </td>
                    <td class="py-5 px-6 align-top">
                      <div class="text-[15px] font-extrabold text-brand-blue leading-snug max-w-xs group-hover/row:text-blue-700 transition-colors">{{ $schedule->topik_pembahasan }}</div>
                    </td>
                    <td class="py-5 px-6 align-top">
                      <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 text-slate-700 text-[13px] font-extrabold border border-slate-200 shadow-sm">
                          <span class="iconify text-brand-yellow" data-icon="lucide:clock"></span> {{ $schedule->waktu }}
                      </span>
                    </td>
                    <td class="py-5 px-6 align-top text-center">
                      <div class="flex flex-wrap items-center justify-center gap-2">
                        <a href="/informasi-kelas" title="Lihat di Informasi Kelas" class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 text-slate-400 hover:bg-brand-blue hover:text-white hover:border-brand-blue flex items-center justify-center transition-all shadow-sm">
                            <span class="iconify text-lg" data-icon="lucide:external-link"></span>
                        </a>
                        <button type="button" class="btn-edit w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 text-slate-400 hover:bg-brand-yellow hover:text-brand-blue hover:border-brand-yellow flex items-center justify-center transition-all shadow-sm"
                                data-id="{{ $schedule->id }}"
                                data-hari="{{ $schedule->hari }}"
                                data-tanggal="{{ $schedule->tanggal->format('Y-m-d') }}"
                                data-topik="{{ $schedule->topik_pembahasan }}"
                                data-waktu-mulai="{{ explode(' - ', $schedule->waktu)[0] }}"
                                data-waktu-selesai="{{ explode(' - ', $schedule->waktu)[1] }}"
                                title="Edit Jadwal">
                            <span class="iconify text-lg" data-icon="lucide:edit-3"></span>
                        </button>
                        <button type="button" class="btn-delete-tutor w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 text-slate-400 hover:bg-brand-red hover:text-white hover:border-brand-red flex items-center justify-center transition-all shadow-sm"
                                data-id="{{ $schedule->id }}"
                                data-topik="{{ $schedule->topik_pembahasan }}"
                                title="Hapus Jadwal">
                            <span class="iconify text-lg" data-icon="lucide:trash-2"></span>
                        </button>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="py-24 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-500">
                            <div class="w-20 h-20 bg-brand-light border border-slate-200 rounded-full flex items-center justify-center mb-4 shadow-sm">
                                <span class="iconify text-4xl text-slate-300" data-icon="lucide:calendar-off"></span>
                            </div>
                            <p class="text-[18px] font-extrabold text-brand-blue">Belum ada jadwal</p>
                            <p class="text-[14px] mt-1 font-medium text-slate-500">Anda belum membuat jadwal kelas apapun.</p>
                        </div>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          <!-- Footer Info -->
          <div class="text-center mt-8 text-[13px] text-slate-500 font-bold flex items-center justify-center gap-2 animate-fade-in-up stagger-3">
            <span class="iconify text-brand-yellow text-xl" data-icon="lucide:info"></span> Jadwal yang dibuat akan otomatis muncul di halaman Pendaftaran Kelas.
          </div>

        </div>
      </div>
    </div>


    <!-- ====================================================================
         ✅ HALAMAN TAMBAH JADWAL (OVERLAY/SEPARATE PAGE)
         ==================================================================== -->
    <div id="page-jadwal-add" class="page-wrapper flex-col flex-1 p-6 md:p-8 items-center justify-center min-h-[calc(100vh-80px)] z-10 relative">
      
      <div class="w-full max-w-4xl bg-brand-blue rounded-[32px] p-8 md:p-12 relative overflow-hidden shadow-[0_20px_50px_rgba(15,76,129,0.2)] border border-brand-blue">
        <!-- Decor in add page -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -2s;"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>

        <div class="relative z-10">
          
          <a href="#page-jadwal" class="inline-flex items-center gap-2 px-5 py-3 rounded-[12px] bg-white/10 border border-white/20 text-white hover:bg-white/20 hover:text-brand-yellow transition-all text-[13px] font-extrabold mb-10 backdrop-blur-sm w-fit group">
            <span class="iconify transition-transform group-hover:-translate-x-1" data-icon="lucide:arrow-left"></span> Kembali
          </a>

          <div class="mb-10 animate-fade-in-up">
            <div class="flex items-center gap-5 mb-3">
                <div class="w-16 h-16 bg-white/10 border border-white/20 rounded-[20px] flex items-center justify-center text-brand-yellow backdrop-blur-md shadow-[0_8px_20px_rgba(0,0,0,0.1)]">
                    <span class="iconify text-3xl" data-icon="lucide:calendar-plus"></span>
                </div>
                <div>
                    <h1 class="text-3xl md:text-[36px] font-extrabold text-white tracking-tight leading-tight">Tambah Jadwal <span class="text-brand-yellow">Baru</span></h1>
                    <p class="text-[15px] text-blue-100/90 mt-1 font-medium">
                      Atur topik dan waktu pelaksanaan kelas Anda.
                    </p>
                </div>
            </div>
          </div>

          @if(session('success'))
            <div class="animate-fade-in-up stagger-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold flex items-start gap-3 backdrop-blur-md shadow-sm">
                <span class="iconify text-emerald-400 text-xl shrink-0 mt-0.5" data-icon="lucide:check-circle-2"></span> {{ session('success') }}
            </div>
          @endif
          @if(session('error'))
            <div class="animate-fade-in-up stagger-1 bg-brand-red/10 border border-brand-red/30 text-red-200 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold flex items-start gap-3 backdrop-blur-md shadow-sm">
                <span class="iconify text-brand-red text-xl shrink-0 mt-0.5" data-icon="lucide:alert-circle"></span> {{ session('error') }}
            </div>
          @endif

          <div class="bg-white rounded-[24px] p-8 md:p-10 shadow-2xl animate-fade-in-up stagger-1">
            <form action="/jadwal-tutor" method="post" class="space-y-6">
              @csrf
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- Hari -->
                  <div class="space-y-2">
                      <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                          Hari <span class="text-brand-red">*</span>
                      </label>
                      <div class="relative group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-brand-blue transition-colors pointer-events-none z-10" data-icon="lucide:calendar-days"></span>
                          <select name="hari" required class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer relative z-0">
                              <option value="" disabled selected class="text-slate-400">— Pilih Hari —</option>
                              <option value="senin">Senin</option>
                              <option value="selasa">Selasa</option>
                              <option value="rabu">Rabu</option>
                              <option value="kamis">Kamis</option>
                              <option value="jumat">Jumat</option>
                              <option value="sabtu">Sabtu</option>
                              <option value="minggu">Minggu</option>
                          </select>
                          <span class="iconify absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none z-10" data-icon="lucide:chevron-down"></span>
                      </div>
                  </div>

                  <!-- Tanggal -->
                  <div class="space-y-2">
                      <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                          Tanggal <span class="text-brand-red">*</span>
                      </label>
                      <div class="relative group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:calendar"></span>
                          <input type="date" name="tanggal" required class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                      </div>
                  </div>
              </div>

              <!-- Topik -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Topik Pembahasan <span class="text-brand-red">*</span>
                  </label>
                  <div class="relative group">
                      <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:book-open"></span>
                      <input type="text" name="topik" placeholder="Contoh: Algoritma & Struktur Data (Pertemuan 1)" required class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400">
                  </div>
              </div>

              <!-- Waktu -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Waktu Pelaksanaan <span class="text-brand-red">*</span>
                  </label>
                  <div class="flex items-center gap-4">
                      <div class="relative flex-1 group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:play-circle"></span>
                          <input type="time" name="waktu_mulai" required value="08:00" class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                      </div>
                      <span class="text-slate-400 font-extrabold">—</span>
                      <div class="relative flex-1 group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:stop-circle"></span>
                          <input type="time" name="waktu_selesai" required value="10:00" class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                      </div>
                  </div>
              </div>

              <!-- Deskripsi -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Catatan Khusus <span class="text-[10px] text-slate-400 font-bold normal-case ml-1">(Opsional)</span>
                  </label>
                  <textarea name="deskripsi" rows="3" placeholder="Tambahkan informasi seperti link Zoom, peralatan yang perlu dibawa, dll..." class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400 resize-none"></textarea>
              </div>

              <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-brand-yellow hover:bg-yellow-400 text-brand-blue font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2 text-[15px] group">
                    Simpan & Publish Jadwal <span class="iconify text-xl group-hover:translate-x-1 transition-transform" data-icon="lucide:arrow-right"></span>
                </button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>


  </main>


  <!-- ====================================================================
       ✅ MODAL EDIT JADWAL (Luxury Theme)
       ==================================================================== -->
  <div id="modal-edit" class="fixed inset-0 z-[100] bg-brand-blue/60 backdrop-blur-sm hidden items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-[32px] p-8 md:p-10 w-full max-w-2xl shadow-[0_20px_60px_rgba(15,76,129,0.3)] border border-slate-200 relative transform scale-95 transition-transform duration-300">
        <button type="button" class="btn-close-modal absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 hover:bg-brand-red/10 hover:text-brand-red text-slate-500 transition-colors">
            <span class="iconify text-xl" data-icon="lucide:x"></span>
        </button>
        
        <div class="flex items-center gap-5 mb-8">
            <div class="w-14 h-14 bg-brand-yellow/10 border border-brand-yellow/20 rounded-[16px] flex items-center justify-center text-brand-yellow shadow-sm">
                <span class="iconify text-2xl" data-icon="lucide:edit-3"></span>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-brand-blue">Edit Jadwal</h2>
                <p class="text-[14px] font-medium text-slate-500 mt-1">Perbarui informasi jadwal kelas.</p>
            </div>
        </div>

        <form id="form-edit-jadwal" method="post" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Hari</label>
                    <select id="edit-hari" name="hari" required class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Tanggal</label>
                    <input type="date" id="edit-tanggal" name="tanggal" required class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Topik Pembahasan</label>
                <input type="text" id="edit-topik" name="topik" required class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
            </div>

            <div class="space-y-2">
                <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Waktu</label>
                <div class="flex items-center gap-4">
                    <input type="time" id="edit-mulai" name="waktu_mulai" required class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                    <span class="text-slate-400 font-extrabold">—</span>
                    <input type="time" id="edit-selesai" name="waktu_selesai" required class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                </div>
            </div>

            <div class="pt-4 flex gap-4">
                <button type="button" class="btn-close-modal flex-1 py-4 bg-slate-100 text-slate-600 font-extrabold rounded-[16px] hover:bg-slate-200 transition-colors text-[14px]">
                    Batal
                </button>
                <button type="submit" class="flex-1 py-4 bg-brand-blue text-white font-extrabold rounded-[16px] hover:bg-blue-800 shadow-[0_8px_20px_rgba(15,76,129,0.3)] transition-all transform hover:-translate-y-1 text-[14px]">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
  </div>


  <!-- ====================================================================
       ✅ MODAL HAPUS JADWAL (Luxury Theme)
       ==================================================================== -->
  <div id="modal-delete" class="fixed inset-0 z-[100] bg-brand-blue/60 backdrop-blur-sm hidden items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-[32px] p-8 md:p-10 w-full max-w-md shadow-[0_20px_60px_rgba(15,76,129,0.3)] border border-slate-200 relative transform scale-95 transition-transform duration-300">
        <button type="button" class="btn-close-modal absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 hover:bg-brand-red/10 hover:text-brand-red text-slate-500 transition-colors">
            <span class="iconify text-xl" data-icon="lucide:x"></span>
        </button>
        
        <div class="text-center mb-8 mt-2">
            <div class="w-20 h-20 bg-brand-red/10 border border-brand-red/20 rounded-[24px] mx-auto flex items-center justify-center text-4xl mb-6 text-brand-red shadow-sm">
                <span class="iconify" data-icon="lucide:trash-2"></span>
            </div>
            <h2 class="text-2xl font-extrabold text-brand-blue mb-3">Hapus Jadwal Ini?</h2>
            <p class="text-[14px] text-slate-500 font-medium">Anda akan menghapus kelas <br><strong id="delete-topik-name" class="text-slate-800 mt-2 block font-extrabold text-[15px]"></strong></p>
        </div>

        <div class="bg-brand-blue/5 border border-brand-blue/10 rounded-[16px] p-5 flex gap-4 items-start mb-8 shadow-sm">
            <span class="iconify text-brand-blue text-xl shrink-0 mt-0.5" data-icon="lucide:info"></span>
            <p class="text-[13px] text-brand-blue leading-relaxed font-bold">
                Penghapusan ini hanya membersihkan tampilan. Informasi kelas tidak akan hilang dari riwayat sistem.
            </p>
        </div>

        <form id="form-delete-jadwal" method="post" class="flex flex-col gap-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full py-4 bg-brand-red text-white font-extrabold rounded-[16px] hover:bg-red-700 shadow-[0_8px_20px_rgba(225,29,72,0.3)] transform hover:-translate-y-1 transition-all text-[14px]">
                Ya, Hapus Jadwal
            </button>
            <button type="button" id="btn-cancel-delete" class="w-full py-4 bg-slate-100 text-slate-600 font-extrabold rounded-[16px] hover:bg-slate-200 transition-colors text-[14px]">
                Batal
            </button>
        </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal Handlers
        const closeBtns = document.querySelectorAll('.btn-close-modal, #btn-cancel-delete');
        
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            // small delay for transition
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.firstElementChild.classList.remove('scale-95');
                modal.firstElementChild.classList.add('scale-100');
            }, 10);
        }

        function closeModal(modal) {
            modal.classList.add('opacity-0');
            modal.firstElementChild.classList.remove('scale-100');
            modal.firstElementChild.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        closeBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                closeModal(btn.closest('.fixed.inset-0'));
            });
        });

        // Edit Data Binding
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('form-edit-jadwal').setAttribute('action', `/jadwal-tutor/${this.dataset.id}`);
                document.getElementById('edit-hari').value = this.dataset.hari.toLowerCase();
                document.getElementById('edit-tanggal').value = this.dataset.tanggal;
                document.getElementById('edit-topik').value = this.dataset.topik;
                document.getElementById('edit-mulai').value = this.dataset.waktuMulai;
                document.getElementById('edit-selesai').value = this.dataset.waktuSelesai;
                openModal('modal-edit');
            });
        });

        // Delete Data Binding
        document.querySelectorAll('.btn-delete-tutor').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('form-delete-jadwal').setAttribute('action', `/jadwal-tutor/${this.dataset.id}`);
                const topik = this.dataset.topik;
                document.getElementById('delete-topik-name').textContent = topik.length > 40 ? topik.substring(0, 37) + '...' : topik;
                openModal('modal-delete');
            });
        });
    });
  </script>
</body>
</html>