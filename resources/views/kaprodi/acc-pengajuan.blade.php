<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Verifikasi Pengajuan Tutor</title>
  
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
      <div class="absolute top-[10%] right-[5%] w-[450px] h-[450px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Menu Kaprodi <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">ACC Pengajuan</span>
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
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Verifikasi Pengajuan <span class="text-brand-yellow">Tutor</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Tinjau berkas pendaftaran calon tutor. Evaluasi kompetensi berdasarkan dokumen dan deskripsi yang diajukan mahasiswa.
          </p>
        </div>
        <div class="flex gap-4">
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg">
              <div class="text-[12px] uppercase tracking-widest font-extrabold text-blue-200 mb-2">Total</div>
              <div class="text-[40px] font-extrabold text-white leading-none">{{ $stats['total'] }}</div>
          </div>
          <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
              <div class="relative z-10">
                <div class="text-[12px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-2">Menunggu</div>
                <div class="text-[40px] font-extrabold text-brand-yellow leading-none">{{ $stats['pending'] }}</div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Section -->
    <div class="p-6 md:p-8 flex-1 relative z-10">
      
      <!-- Toolbar -->
      <div class="flex flex-col xl:flex-row xl:items-center justify-between mb-8 gap-5 animate-fade-in-up stagger-1">
        <form action="{{ route('kaprodi.acc-pengajuan') }}" method="GET" class="relative group w-full xl:max-w-md">
          <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors" data-icon="lucide:search"></span>
          <input type="text" name="search" placeholder="Cari nama, NIM, atau topik..." value="{{ $search }}" 
                 class="w-full pl-14 pr-4 py-4 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] text-[14px] font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all shadow-[0_8px_30px_rgb(15,76,129,0.04)] text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
        </form>

        <div class="flex flex-wrap gap-2 p-2 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-[16px] shadow-[0_8px_30px_rgb(15,76,129,0.04)]">
          <a href="{{ route('kaprodi.acc-pengajuan', ['status' => 'all', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ !$status || $status === 'all' ? 'bg-brand-blue text-white shadow-[0_4px_12px_rgba(15,76,129,0.2)]' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             Semua
          </a>
          <a href="{{ route('kaprodi.acc-pengajuan', ['status' => 'pending', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'pending' ? 'bg-brand-yellow/10 border border-brand-yellow/30 text-yellow-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow"></span> Menunggu
          </a>
          <a href="{{ route('kaprodi.acc-pengajuan', ['status' => 'approved', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'approved' ? 'bg-emerald-50 border border-emerald-200 text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
          </a>
          <a href="{{ route('kaprodi.acc-pengajuan', ['status' => 'rejected', 'search' => $search]) }}" 
             class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] text-[13px] font-extrabold transition-all {{ $status === 'rejected' ? 'bg-brand-red/10 border border-brand-red/20 text-brand-red shadow-sm' : 'text-slate-500 hover:text-brand-blue hover:bg-slate-50' }}">
             <span class="w-1.5 h-1.5 rounded-full bg-brand-red"></span> Ditolak
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
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Calon Tutor</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Keahlian (Topik)</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Deskripsi / Alasan</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Berkas</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Status / Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($applications as $index => $app)
                <tr class="hover:bg-brand-light/40 transition-colors group">
                  <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                  <td class="py-5 px-6 align-top">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-[14px] bg-brand-blue flex items-center justify-center text-[13px] font-extrabold text-white shadow-sm">
                            {{ strtoupper(substr($app->nama, 0, 2)) }}
                        </div>
                        <div>
                            <div class="font-extrabold text-brand-blue text-[15px] leading-tight mb-1 group-hover:text-brand-yellow transition-colors">{{ $app->nama }}</div>
                            <div class="text-[12px] font-bold text-slate-500 uppercase tracking-widest">NIM: {{ $app->nim }}</div>
                        </div>
                    </div>
                  </td>
                  <td class="py-5 px-6 align-top">
                      <div class="inline-flex items-center gap-2 px-4 py-2 bg-brand-light rounded-[12px] text-[13px] font-extrabold text-slate-700 border border-slate-200 shadow-sm w-fit">
                          <span class="iconify text-brand-blue text-[16px]" data-icon="lucide:book-open"></span>
                          {{ $app->topik_pembahasan }}
                      </div>
                  </td>
                  <td class="py-5 px-6 align-top">
                    <div class="text-[13px] font-medium text-slate-600 leading-relaxed max-w-xs line-clamp-3 group-hover:line-clamp-none transition-all bg-brand-light/50 p-3 rounded-[12px] border border-transparent group-hover:border-slate-200" title="{{ $app->deskripsi_job }}">
                        {{ $app->deskripsi_job }}
                    </div>
                  </td>
                  <td class="py-5 px-6 text-center align-top">
                    <button class="inline-flex items-center justify-center w-12 h-12 rounded-[14px] border border-slate-200 bg-brand-light text-brand-blue hover:bg-brand-yellow hover:text-brand-blue hover:border-brand-yellow transition-all shadow-sm group/btn" 
                            title="Lihat Berkas"
                            onclick="openPdf('{{ addslashes($app->nama) }}', '{{ Storage::url($app->bukti_memenuhi) }}', '{{ $app->nim }}')">
                      <span class="iconify text-[22px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:file-search"></span>
                    </button>
                  </td>
                  <td class="py-5 px-6 align-top text-center">
                    @if($app->status === 'pending')
                      <div class="flex justify-center gap-2">
                        <form action="/acc-pengajuan/{{ $app->id }}/approve" method="POST" class="inline">
                          @csrf
                          <button type="submit" title="Setujui" class="inline-flex items-center justify-center w-10 h-10 rounded-[12px] bg-emerald-50 border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all shadow-sm hover:shadow-[0_4px_12px_rgba(16,185,129,0.3)] hover:-translate-y-0.5 group/btn">
                            <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:check"></span>
                          </button>
                        </form>
                        <button type="button" title="Tolak" class="inline-flex items-center justify-center w-10 h-10 rounded-[12px] bg-brand-red/10 border border-brand-red/20 text-brand-red hover:bg-brand-red hover:text-white transition-all shadow-sm hover:shadow-[0_4px_12px_rgba(225,29,72,0.3)] hover:-translate-y-0.5 group/btn" 
                                onclick="openReject({{ $app->id }}, '{{ addslashes($app->nama) }}')">
                          <span class="iconify text-[18px] group-hover/btn:scale-110 transition-transform" data-icon="lucide:x"></span>
                        </button>
                      </div>
                    @elseif($app->status === 'approved')
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        <span class="iconify" data-icon="lucide:check-circle-2"></span> Disetujui
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-brand-red/10 text-brand-red border border-brand-red/20 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        <span class="iconify" data-icon="lucide:x-circle"></span> Ditolak
                      </span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-500">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                            <span class="iconify text-[36px] text-slate-300" data-icon="lucide:users"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue">Belum ada pengajuan</p>
                        <p class="text-[14px] font-medium mt-1">Data pengajuan calon tutor masih kosong.</p>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="px-6 py-5 border-t border-slate-200 bg-brand-light/30 flex items-center justify-between">
            <span class="text-[13px] font-bold text-slate-500">Menampilkan total <strong class="text-brand-blue font-extrabold">{{ $applications->count() }}</strong> pengajuan</span>
        </div>
      </div>
    </div>
  </main>

  <!-- PDF Preview Modal -->
  <div id="pdfOverlay" class="fixed inset-0 z-[200] hidden items-center justify-center p-4 bg-brand-blue/80 backdrop-blur-sm transition-opacity" onclick="closePdfOutside(event)">
    <div class="bg-white rounded-[28px] w-full max-w-4xl max-h-[90vh] flex flex-col shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden border border-slate-200" onclick="event.stopPropagation()">
      <div class="flex items-center justify-between px-8 py-5 border-b border-slate-200 bg-white">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-[16px] bg-brand-light text-brand-blue flex items-center justify-center text-[24px] border border-slate-200 shadow-sm">
                <span class="iconify" data-icon="lucide:file-badge"></span>
            </div>
            <div>
                <h3 id="pdfTitle" class="text-[16px] font-extrabold text-brand-blue leading-tight">Bukti Pengajuan</h3>
                <p id="pdfSubtitle" class="text-[12px] font-bold text-slate-400 mt-1 uppercase tracking-widest">NIM: —</p>
            </div>
        </div>
        <button onclick="closePdf()" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-brand-red hover:bg-brand-red/10 rounded-[12px] transition-colors border border-transparent hover:border-brand-red/20">
          <span class="iconify text-[20px]" data-icon="lucide:x"></span>
        </button>
      </div>
      <div id="pdfModalBody" class="flex-1 overflow-auto bg-brand-light/50 flex items-center justify-center min-h-[500px]">
        <!-- Content -->
      </div>
      <div class="px-8 py-4 border-t border-slate-200 bg-white flex justify-end">
          <button onclick="closePdf()" class="px-6 py-3 rounded-[14px] border border-slate-200 bg-brand-light text-slate-700 text-[14px] font-extrabold hover:bg-slate-100 transition-colors shadow-sm">
              Tutup Preview
          </button>
      </div>
    </div>
  </div>

  <!-- Rejection Modal -->
  <div id="rejectOverlay" class="fixed inset-0 z-[200] hidden items-center justify-center p-4 bg-brand-blue/80 backdrop-blur-sm transition-opacity" onclick="closeRejectOutside(event)">
    <div class="bg-white rounded-[28px] w-full max-w-lg max-h-[90vh] flex flex-col shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden border border-slate-200" onclick="event.stopPropagation()">
      <div class="flex items-center justify-between px-8 py-5 border-b border-slate-200 bg-white">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-[16px] bg-brand-red/10 text-brand-red flex items-center justify-center text-[24px] border border-brand-red/20 shadow-sm">
                <span class="iconify" data-icon="lucide:user-x"></span>
            </div>
            <div>
                <h3 class="text-[16px] font-extrabold text-brand-blue leading-tight">Tolak Pengajuan</h3>
                <p id="rejectSubtitle" class="text-[12px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Mahasiswa: —</p>
            </div>
        </div>
        <button onclick="closeReject()" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-brand-red hover:bg-brand-red/10 rounded-[12px] transition-colors border border-transparent hover:border-brand-red/20">
          <span class="iconify text-[20px]" data-icon="lucide:x"></span>
        </button>
      </div>
      
      <form id="form-reject-tutor" method="POST" class="flex flex-col">
        @csrf
        <div class="p-8">
          <label for="reject-alasan" class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest mb-2">
            Alasan Penolakan <span class="text-brand-red">*</span>
          </label>
          <textarea id="reject-alasan" name="alasan" required 
                    placeholder="Contoh: Berkas yang dilampirkan tidak valid..." 
                    class="w-full h-32 rounded-[16px] border border-slate-200 p-5 text-[14px] font-bold text-slate-800 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue outline-none transition-all resize-none shadow-sm placeholder:text-slate-400 placeholder:font-normal"></textarea>
          
          <div class="mt-5 p-5 rounded-[16px] bg-brand-yellow/10 border border-brand-yellow/30 flex gap-3">
              <span class="iconify text-brand-yellow text-[24px] shrink-0 mt-0.5" data-icon="lucide:info"></span>
              <p class="text-[13px] font-medium text-yellow-800 leading-relaxed">
                  Alasan penolakan akan <strong class="font-extrabold text-brand-blue">langsung muncul di notifikasi</strong> mahasiswa yang bersangkutan sebagai bahan perbaikan.
              </p>
          </div>
        </div>
        
        <div class="px-8 py-5 border-t border-slate-200 bg-brand-light flex justify-end gap-3">
            <button type="button" onclick="closeReject()" class="px-6 py-3.5 rounded-[14px] border border-slate-200 bg-white text-slate-600 text-[14px] font-extrabold hover:bg-slate-50 transition-colors shadow-sm">
                Batal
            </button>
            <button type="submit" class="px-6 py-3.5 rounded-[14px] bg-brand-red text-white text-[14px] font-extrabold shadow-[0_8px_20px_rgba(225,29,72,0.3)] hover:shadow-[0_12px_25px_rgba(225,29,72,0.4)] hover:-translate-y-0.5 transition-all">
                Tolak Pengajuan
            </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openReject(id, name) {
      const overlay = document.getElementById('rejectOverlay');
      const form = document.getElementById('form-reject-tutor');
      const subtitle = document.getElementById('rejectSubtitle');
      const textarea = document.getElementById('reject-alasan');

      form.setAttribute('action', '/acc-pengajuan/' + id + '/reject');
      subtitle.textContent = 'Mahasiswa: ' + name;
      textarea.value = '';

      overlay.classList.remove('hidden');
      overlay.classList.add('flex');
    }

    function closeReject() {
      const overlay = document.getElementById('rejectOverlay');
      overlay.classList.add('hidden');
      overlay.classList.remove('flex');
    }

    function closeRejectOutside(e) {
      if (e.target === document.getElementById('rejectOverlay')) closeReject();
    }

    function openPdf(name, url, nim) {
      const title = document.getElementById('pdfTitle');
      const subtitle = document.getElementById('pdfSubtitle');
      const body = document.getElementById('pdfModalBody');
      const overlay = document.getElementById('pdfOverlay');

      title.textContent = 'Bukti Pengajuan — ' + name;
      subtitle.textContent = 'NIM: ' + nim;

      const extension = url.split('.').pop().toLowerCase();
      if (extension === 'pdf') {
        body.innerHTML = `<iframe src="${url}" class="w-full h-full min-h-[500px] border-0"></iframe>`;
        body.classList.remove('p-8');
      } else {
        body.innerHTML = `<img src="${url}" alt="Berkas" class="max-w-full rounded-[20px] shadow-lg border border-slate-200 object-contain max-h-[70vh]">`;
        body.classList.add('p-8');
      }

      overlay.classList.remove('hidden');
      overlay.classList.add('flex');
    }

    function closePdf() {
      const overlay = document.getElementById('pdfOverlay');
      overlay.classList.add('hidden');
      overlay.classList.remove('flex');
    }

    function closePdfOutside(e) {
      if (e.target === document.getElementById('pdfOverlay')) closePdf();
    }
    
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') { closePdf(); closeReject(); }
    });
  </script>
</body>
</html>