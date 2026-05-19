<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Verifikasi Surat Skills</title>
  
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
      <div class="absolute top-[5%] right-[5%] w-[450px] h-[450px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Menu Admin <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Verifikasi Surat Skills</span>
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
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Verifikasi <span class="text-brand-yellow">Surat Skills</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Tinjau bukti mengajar dari tutor dan setujui untuk menerbitkan sertifikat/Surat Keterangan Skills resmi dari sistem.
          </p>
        </div>
        <div class="flex gap-4">
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg">
              <div class="text-[12px] uppercase tracking-widest font-extrabold text-blue-200 mb-2">Total Validasi</div>
              <div class="text-[40px] font-extrabold text-white leading-none">{{ $achievements->count() }}</div>
          </div>
          <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
              <div class="relative z-10">
                <div class="text-[12px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-2">Menunggu</div>
                <div class="text-[40px] font-extrabold text-brand-yellow leading-none">{{ $achievements->where('status', 'pending')->count() }}</div>
              </div>
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

      <!-- Toolbar -->
      <div class="flex flex-col xl:flex-row xl:items-center justify-between mb-8 gap-5 animate-fade-in-up stagger-1">
        <form action="{{ route('admin.acc-achievement') }}" method="GET" class="relative group w-full xl:max-w-md">
          <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
          <input type="text" name="search" placeholder="Cari tutor atau topik..." value="{{ $search }}" 
                 class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
        </form>

        <div class="flex flex-wrap gap-2 p-2 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] shadow-[0_8px_30px_rgb(15,76,129,0.04)]">
          <a href="{{ route('admin.acc-achievement', ['status' => 'all', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ !$status || $status === 'all' ? 'bg-brand-blue text-white shadow-[0_4px_12px_rgba(15,76,129,0.2)]' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             Semua
          </a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'pending', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'pending' ? 'bg-brand-yellow/10 border border-brand-yellow/30 text-yellow-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow"></span> Pending
          </a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'approved', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'approved' ? 'bg-emerald-50 border border-emerald-200 text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Approved
          </a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'rejected', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'rejected' ? 'bg-brand-red/10 border border-brand-red/20 text-brand-red shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-red"></span> Rejected
          </a>
        </div>
      </div>

      <!-- Bento Table Card -->
      <div class="bg-white/95 backdrop-blur-md border border-slate-200 rounded-[24px] shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden animate-fade-in-up stagger-2">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead class="bg-brand-light/50 border-b border-slate-200">
              <tr>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Tutor</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Topik Bahasan</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Bukti Mengajar</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Surat Draft</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Status</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Tindakan</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($achievements as $index => $item)
                <tr class="hover:bg-brand-light/40 transition-colors group">
                  <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-middle">{{ $index + 1 }}</td>
                  <td class="py-5 px-6 align-middle">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-[14px] bg-brand-blue flex items-center justify-center text-[13px] font-extrabold text-white shadow-sm">
                            {{ strtoupper(substr($item->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="font-extrabold text-brand-blue text-[15px] leading-tight mb-1 group-hover:text-brand-yellow transition-colors">{{ $item->user->name }}</div>
                            <div class="text-[12px] font-bold text-slate-500 uppercase tracking-widest">NIM: {{ $item->user->pengajuanTutor->nim ?? '-' }}</div>
                        </div>
                    </div>
                  </td>
                  <td class="py-5 px-6 align-middle">
                      <div class="text-[14px] font-extrabold text-slate-800 leading-snug max-w-[220px]">
                          {{ $item->topic }}
                      </div>
                  </td>
                  <td class="py-5 px-6 text-center align-middle">
                    <button class="inline-flex items-center justify-center w-12 h-12 rounded-[14px] border border-slate-200 bg-brand-light text-brand-blue hover:bg-brand-yellow hover:text-brand-blue hover:border-brand-yellow transition-all shadow-sm group/btn" 
                            title="Lihat Bukti Foto"
                            onclick="openModal('Bukti Mengajar: {{ addslashes($item->topic) }}', '{{ asset('storage/'.$item->teaching_proof) }}')">
                      <span class="iconify text-[22px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:image"></span>
                    </button>
                  </td>
                  <td class="py-5 px-6 text-center align-middle">
                    <button class="inline-flex items-center justify-center w-12 h-12 rounded-[14px] border border-slate-200 bg-brand-light text-brand-blue hover:bg-brand-blue hover:text-brand-yellow hover:border-brand-blue transition-all shadow-sm group/btn" 
                            title="Preview Draft Surat"
                            onclick="openModal('Preview Draft Surat Skills', '{{ route('admin.acc-achievement.preview', $item->id) }}', true)">
                      <span class="iconify text-[22px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:file-text"></span>
                    </button>
                  </td>
                  <td class="py-5 px-6 text-center align-middle">
                    @if($item->status == 'pending')
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-brand-yellow/10 text-yellow-700 border border-brand-yellow/30 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Menunggu
                      </span>
                    @elseif($item->status == 'approved')
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Disetujui
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-brand-red/10 text-brand-red border border-brand-red/20 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Ditolak
                      </span>
                    @endif
                  </td>
                  <td class="py-5 px-6 align-middle text-center">
                    @if($item->status == 'pending')
                      <div class="flex justify-center gap-2">
                        <form action="{{ route('admin.acc-achievement.approve', $item->id) }}" method="POST">
                          @csrf
                          <button type="submit" title="Setujui" class="inline-flex items-center justify-center w-10 h-10 rounded-[12px] bg-emerald-50 border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all shadow-sm hover:shadow-[0_4px_12px_rgba(16,185,129,0.3)] hover:-translate-y-0.5 group/btn">
                            <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:check"></span>
                          </button>
                        </form>
                        <form action="{{ route('admin.acc-achievement.reject', $item->id) }}" method="POST">
                          @csrf
                          <button type="submit" title="Tolak" class="inline-flex items-center justify-center w-10 h-10 rounded-[12px] bg-brand-red/10 border border-brand-red/20 text-brand-red hover:bg-brand-red hover:text-white transition-all shadow-sm hover:shadow-[0_4px_12px_rgba(225,29,72,0.3)] hover:-translate-y-0.5 group/btn">
                            <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:x"></span>
                          </button>
                        </form>
                      </div>
                    @else
                      <span class="text-slate-300 font-extrabold text-xl leading-none">&mdash;</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-500">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                            <span class="iconify text-[36px] text-slate-300" data-icon="lucide:inbox"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue">Belum ada pengajuan</p>
                        <p class="text-[14px] font-medium mt-1">Tidak ada data verifikasi yang sesuai.</p>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Premium Modal -->
  <div id="modalOverlay" class="fixed inset-0 z-[200] hidden items-center justify-center p-4 bg-brand-blue/80 backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-[28px] w-full max-w-4xl max-h-[90vh] flex flex-col shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden border border-slate-200">
      <div class="flex items-center justify-between px-8 py-5 border-b border-slate-200 bg-white">
        <h3 id="modalTitle" class="text-[16px] font-extrabold text-brand-blue">Preview</h3>
        <button onclick="closeModal()" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-brand-red hover:bg-brand-red/10 rounded-[12px] transition-colors border border-transparent hover:border-brand-red/20">
          <span class="iconify text-[20px]" data-icon="lucide:x"></span>
        </button>
      </div>
      <div id="modalBody" class="flex-1 overflow-auto bg-brand-light/50 flex items-center justify-center min-h-[500px]">
        <!-- Content injected via JS -->
      </div>
    </div>
  </div>

  <script>
    function openModal(title, url, isPdf = false) {
      document.getElementById('modalTitle').textContent = title;
      const body = document.getElementById('modalBody');
      const extension = url.split('.').pop().toLowerCase();
      
      if (isPdf || extension === 'pdf') {
        body.innerHTML = `<iframe src="${url}" class="w-full h-full min-h-[600px] border-0"></iframe>`;
        body.classList.remove('p-8');
      } else {
        body.innerHTML = `<img src="${url}" alt="Preview" class="max-w-full rounded-[20px] shadow-lg border border-slate-200 object-contain max-h-[70vh]">`;
        body.classList.add('p-8');
      }
      
      const modal = document.getElementById('modalOverlay');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModal() {
      const modal = document.getElementById('modalOverlay');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      setTimeout(() => { document.getElementById('modalBody').innerHTML = ''; }, 300);
    }
  </script>
</body>
</html>