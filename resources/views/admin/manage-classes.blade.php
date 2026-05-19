<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Kelola Kelas</title>
  
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
      <div class="absolute top-[10%] left-[5%] w-[450px] h-[450px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] right-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Menu Admin <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Kelola Kelas</span>
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
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Kelola <span class="text-brand-yellow">Kelas</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Pantau dan kelola seluruh jadwal kelas tutoring di sistem. Hapus kelas yang sudah berlalu untuk menjaga data tetap bersih.
          </p>
        </div>
        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[180px] shadow-lg flex items-center justify-between gap-6 hover:bg-white/20 transition-all cursor-default">
            <div class="text-left">
              <div class="text-[12px] uppercase tracking-widest font-extrabold text-blue-200 mb-2">Total Kelas</div>
              <div class="text-[40px] font-extrabold text-white leading-none">{{ $classes->total() ?? 0 }}</div>
            </div>
            <div class="w-14 h-14 rounded-full bg-brand-yellow flex items-center justify-center text-brand-blue text-[24px] shadow-sm">
              <span class="iconify" data-icon="lucide:layout-grid"></span>
            </div>
        </div>
      </div>
    </div>

    <!-- Content Section -->
    <div class="p-6 md:p-8 flex-1 relative z-10">
      
      @if(session('success'))
        <div class="animate-fade-in-up stagger-1 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-[16px] mb-8 flex items-start gap-3 shadow-sm">
          <span class="iconify text-xl shrink-0 mt-0.5 text-emerald-500" data-icon="lucide:check-circle"></span>
          <span class="font-extrabold text-[14px]">{{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="animate-fade-in-up stagger-1 bg-brand-red/10 border border-brand-red/20 text-brand-red px-6 py-4 rounded-[16px] mb-8 flex items-start gap-3 shadow-sm">
          <span class="iconify text-xl shrink-0 mt-0.5 text-brand-red" data-icon="lucide:alert-circle"></span>
          <span class="font-extrabold text-[14px]">{{ session('error') }}</span>
        </div>
      @endif

      <!-- Toolbar -->
      <div class="flex items-center justify-between mb-8 animate-fade-in-up stagger-1">
        <form action="{{ route('admin.manage-classes') }}" method="GET" class="relative group w-full max-w-md">
          <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
          <input type="text" name="search" placeholder="Cari topik atau nama tutor..." value="{{ $search }}" 
                 class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
        </form>
      </div>

      <!-- Bento Table Card -->
      <div class="bg-white/95 backdrop-blur-md border border-slate-200 rounded-[24px] shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden animate-fade-in-up stagger-2">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead class="bg-brand-light/50 border-b border-slate-200">
              <tr>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Detail Kelas</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Tutor</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Waktu Pelaksanaan</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Peserta</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Status</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($classes as $index => $class)
                @php
                  $waktu_mulai = explode(' - ', $class->waktu)[0];
                  $start_time = \Carbon\Carbon::parse($class->tanggal->format('Y-m-d') . ' ' . $waktu_mulai);
                  $is_past = $start_time->isPast();
                @endphp
                <tr class="hover:bg-brand-light/40 transition-colors group">
                  <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400">{{ $classes->firstItem() + $index }}</td>
                  <td class="py-5 px-6">
                    <div class="font-extrabold text-brand-blue text-[15px] leading-tight mb-2 group-hover:text-brand-yellow transition-colors">{{ $class->topik_pembahasan }}</div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-[8px] text-[10px] font-extrabold bg-brand-light border border-slate-200 text-slate-500 uppercase tracking-widest shadow-sm">ID: #{{ str_pad($class->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                  </td>
                  <td class="py-5 px-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-[12px] bg-brand-blue flex items-center justify-center text-[13px] font-extrabold text-white shadow-sm border border-brand-blue/20">
                            {{ strtoupper(substr($class->user->name, 0, 2)) }}
                        </div>
                        <span class="font-extrabold text-slate-800 text-[14px]">{{ $class->user->name }}</span>
                    </div>
                  </td>
                  <td class="py-5 px-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-2 text-[14px] font-bold text-slate-800 bg-brand-light px-3 py-1.5 rounded-[10px] border border-slate-200 shadow-sm w-fit">
                            <span class="iconify text-brand-blue text-[16px]" data-icon="lucide:calendar"></span>
                            {{ $class->tanggal->translatedFormat('d M Y') }}
                        </div>
                        <div class="flex items-center gap-2 text-[13px] font-bold text-slate-600 px-1">
                            <span class="iconify text-brand-yellow text-[16px]" data-icon="lucide:clock"></span>
                            {{ $class->waktu }}
                        </div>
                    </div>
                  </td>
                  <td class="py-5 px-6 text-center">
                    <div class="inline-flex items-center justify-center min-w-[36px] h-9 bg-brand-light rounded-[10px] text-[14px] font-extrabold text-brand-blue border border-slate-200 shadow-sm">
                        {{ $class->pendaftaran_count }}
                    </div>
                  </td>
                  <td class="py-5 px-6">
                    @if($is_past)
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-slate-100/80 text-slate-600 border border-slate-200 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Selesai
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Akan Datang
                      </span>
                    @endif
                  </td>
                  <td class="py-5 px-6 text-right">
                    @if($is_past)
                      <button onclick="confirmDelete({{ $class->id }}, '{{ addslashes($class->topik_pembahasan) }}')" class="inline-flex items-center justify-center w-10 h-10 bg-brand-red/10 border border-brand-red/20 text-brand-red hover:bg-brand-red hover:text-white rounded-[12px] transition-all shadow-sm group/btn" title="Hapus Kelas">
                        <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:trash-2"></span>
                      </button>
                    @else
                      <button disabled title="Kelas aktif tidak bisa dihapus" class="inline-flex items-center justify-center w-10 h-10 bg-brand-light border border-slate-200 text-slate-400 rounded-[12px] cursor-not-allowed shadow-sm">
                        <span class="iconify text-[18px]" data-icon="lucide:trash-2"></span>
                      </button>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-500">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                            <span class="iconify text-[36px] text-slate-300" data-icon="lucide:layout-grid"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue">Tidak ada data kelas</p>
                        <p class="text-[14px] font-medium mt-1">Belum ada kelas yang didaftarkan ke sistem.</p>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        @if($classes->hasPages())
          <div class="px-6 py-5 border-t border-slate-200 bg-brand-light/30">
              {{ $classes->links() }}
          </div>
        @endif
      </div>
    </div>
  </main>

  <!-- Premium Delete Modal -->
  <div id="deleteModal" class="fixed inset-0 z-[200] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-brand-blue/80 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>
    <div class="bg-white rounded-[28px] w-full max-w-md relative z-10 shadow-[0_20px_60px_rgba(0,0,0,0.2)] overflow-hidden transform transition-all p-8 text-center border border-slate-200">
      <div class="w-20 h-20 bg-brand-red/10 text-brand-red rounded-[20px] flex items-center justify-center text-[36px] mx-auto mb-6 border border-brand-red/20 shadow-sm">
        <span class="iconify" data-icon="lucide:trash-2"></span>
      </div>
      <h3 class="text-[24px] font-extrabold text-brand-blue mb-3">Hapus Kelas?</h3>
      <p class="text-slate-500 text-[15px] leading-relaxed mb-8 font-medium">
        Anda yakin ingin menghapus kelas <br/><span id="deleteClassName" class="font-extrabold text-brand-blue"></span>?<br/> Data pendaftaran terkait tidak dapat dikembalikan.
      </p>
      <div class="flex gap-4">
        <button onclick="closeDeleteModal()" class="flex-1 px-6 py-4 bg-brand-light hover:bg-slate-100 border border-slate-200 text-slate-700 font-extrabold rounded-[16px] transition-colors text-[14px] shadow-sm">
          Batal
        </button>
        <form id="deleteForm" method="POST" class="flex-1">
          @csrf
          @method('DELETE')
          <button type="submit" class="w-full px-6 py-4 bg-brand-red hover:bg-red-700 text-white font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(225,29,72,0.3)] hover:shadow-[0_12px_25px_rgba(225,29,72,0.4)] transition-all text-[14px] hover:-translate-y-1">
            Ya, Hapus
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function confirmDelete(id, name) {
      const modal = document.getElementById('deleteModal');
      const form = document.getElementById('deleteForm');
      const nameSpan = document.getElementById('deleteClassName');
      
      nameSpan.textContent = name;
      form.action = `/admin/manage-classes/${id}`;
      
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeDeleteModal() {
      const modal = document.getElementById('deleteModal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }
  </script>
</body>
</html>
