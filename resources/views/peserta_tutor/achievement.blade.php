<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Achievement</title>
  
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

  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[15%] right-[5%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[10%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Menu <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Achievement</span>
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
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none"><span class="text-brand-yellow">Pencapaian</span> & Sertifikasi</h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Kirimkan bukti pengajaran yang telah kamu lakukan untuk mendapatkan sertifikat / Surat Keterangan Skills resmi dari sistem.
          </p>
        </div>
        <div class="flex gap-4">
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg">
              <div class="text-[12px] uppercase tracking-widest font-extrabold text-blue-200 mb-2">Total</div>
              <div class="text-[40px] font-extrabold text-white leading-none">{{ $achievements->count() }}</div>
          </div>
          <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
              <div class="relative z-10">
                <div class="text-[12px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-2">Disetujui</div>
                <div class="text-[40px] font-extrabold text-brand-yellow leading-none">{{ $achievements->where('status', 'approved')->count() }}</div>
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

      <!-- Pro Form Card -->
      <div class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 shadow-[0_20px_50px_rgba(15,76,129,0.05)] p-8 md:p-10 mb-12 animate-fade-in-up stagger-1">
        <div class="flex items-center gap-5 mb-8">
            <div class="w-16 h-16 rounded-[20px] bg-brand-light text-brand-blue flex items-center justify-center text-[28px] border border-slate-200 shadow-sm">
                <span class="iconify" data-icon="lucide:upload-cloud"></span>
            </div>
            <div>
                <h2 class="text-[22px] font-extrabold text-brand-blue">Kirim Bukti Pengajaran</h2>
                <p class="text-[14px] font-medium text-slate-500 mt-1">Isi formulir ini dengan bukti akurat agar dapat diverifikasi admin.</p>
            </div>
        </div>

        <form action="{{ route('achievement.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Nama Tutor</label>
              <input type="text" value="{{ $studentData['nama'] }}" readonly class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-extrabold text-slate-500 cursor-not-allowed">
            </div>
            <div class="space-y-2">
              <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">NIM</label>
              <input type="text" value="{{ $studentData['nim'] }}" readonly class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-extrabold text-slate-500 cursor-not-allowed">
            </div>
          </div>

          <div class="space-y-2">
            <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Program Studi</label>
            <input type="text" value="{{ $studentData['prodi'] }}" readonly class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-extrabold text-slate-500 cursor-not-allowed">
          </div>

          <div class="space-y-2">
            <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Topik / Materi <span class="text-brand-red">*</span></label>
            <input type="text" name="topic" placeholder="Contoh: Pemrograman Dasar Python" required 
                   class="w-full px-5 py-4 bg-white border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400 shadow-sm">
          </div>

          <div class="space-y-2">
            <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Deskripsi Kegiatan <span class="text-brand-red">*</span></label>
            <textarea name="description" rows="4" placeholder="Jelaskan secara singkat pelaksanaan kegiatan..." required 
                      class="w-full px-5 py-4 bg-white border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all resize-none placeholder:text-slate-400 shadow-sm"></textarea>
          </div>

          <div class="space-y-2">
            <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">Upload Bukti <span class="text-slate-400 font-medium">(Image/PDF)</span> <span class="text-brand-red">*</span></label>
            <div id="uploadZone" onclick="document.getElementById('fileInput').click()" 
                 class="relative overflow-hidden border-2 border-dashed border-slate-300 rounded-[24px] bg-brand-light hover:bg-brand-blue/5 hover:border-brand-blue transition-all cursor-pointer group shadow-sm">
              <div class="px-6 py-12 text-center">
                  <div class="w-20 h-20 mx-auto bg-white rounded-[24px] shadow-sm border border-slate-200 flex items-center justify-center text-slate-400 group-hover:text-brand-blue group-hover:scale-110 transition-all mb-5">
                      <span class="iconify text-[36px]" data-icon="lucide:upload-cloud"></span>
                  </div>
                  <div id="uploadPlaceholder">
                      <h4 class="text-[18px] font-extrabold text-brand-blue mb-2">Klik untuk upload atau drag & drop file</h4>
                      <p class="text-[14px] font-medium text-slate-500 mb-5">Screenshot atau file PDF bukti mengajar yang valid</p>
                      <span class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-[12px] text-[12px] font-extrabold text-slate-500 shadow-sm">
                          <span class="iconify text-brand-red" data-icon="lucide:file-type"></span> JPG, PNG, PDF (Maks. 2MB)
                      </span>
                  </div>
                  <div id="fileSelectedName" class="hidden text-emerald-700 font-extrabold text-[15px] bg-white py-3 px-6 rounded-[16px] border border-slate-200 inline-flex items-center gap-2 shadow-sm"></div>
              </div>
              <input type="file" name="teaching_proof" id="fileInput" accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="updateFileName(this)" required>
            </div>
          </div>

          <button type="submit" class="btn-shine w-full py-4 mt-6 bg-brand-yellow hover:bg-yellow-400 text-brand-blue font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2 text-[15px] group/btn">
            Submit Pengajuan <span class="iconify text-[20px] group-hover/btn:translate-x-1 transition-transform" data-icon="lucide:send"></span>
          </button>
        </form>
      </div>

      <div class="flex items-center gap-4 mb-8 animate-fade-in-up stagger-2">
        <h2 class="text-[14px] font-extrabold text-brand-blue uppercase tracking-widest flex items-center gap-3">
            <span class="w-10 h-10 rounded-[12px] bg-brand-blue/10 flex items-center justify-center text-brand-blue border border-brand-blue/20 shadow-sm">
                <span class="iconify text-[20px]" data-icon="lucide:history"></span>
            </span> 
            Riwayat Pengajuan
        </h2>
        <div class="flex-1 h-px bg-slate-200"></div>
      </div>

      <!-- Bento Table Card -->
      <div class="bg-white/95 backdrop-blur-md border border-slate-200 rounded-[24px] shadow-[0_20px_50px_rgba(15,76,129,0.05)] overflow-hidden animate-fade-in-up stagger-2">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead class="bg-brand-light/50 border-b border-slate-200">
              <tr>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center w-16">No</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Topik & Deskripsi</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest">Tanggal</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Status</th>
                <th class="py-5 px-6 text-[11px] font-extrabold text-brand-blue uppercase tracking-widest text-center">Sertifikat</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/80">
              @forelse($achievements as $index => $item)
                <tr class="hover:bg-brand-light/40 transition-colors group">
                  <td class="py-5 px-6 text-center text-[14px] font-extrabold text-slate-400 align-top">{{ $index + 1 }}</td>
                  <td class="py-5 px-6 align-top">
                    <div class="font-extrabold text-brand-blue text-[15px] leading-snug mb-2">{{ $item->topic }}</div>
                    <div class="text-[13px] text-slate-500 font-medium leading-relaxed max-w-sm line-clamp-2 bg-brand-light/80 p-3 rounded-[12px] border border-slate-200 shadow-sm">{{ $item->description }}</div>
                  </td>
                  <td class="py-5 px-6 align-top">
                    <div class="inline-flex items-center gap-2 text-[13px] font-extrabold text-slate-600 bg-brand-light px-3 py-1.5 rounded-[10px] border border-slate-200 shadow-sm">
                        <span class="iconify text-brand-blue" data-icon="lucide:calendar"></span>
                        {{ $item->created_at->translatedFormat('d M Y') }}
                    </div>
                  </td>
                  <td class="py-5 px-6 text-center align-top">
                    @if($item->status == 'pending')
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-brand-yellow/10 text-yellow-700 border border-brand-yellow/30 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Pending
                      </span>
                    @elseif($item->status == 'approved')
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Approved
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-brand-red/10 text-brand-red border border-brand-red/20 rounded-[12px] text-[11px] font-extrabold uppercase tracking-widest shadow-sm">
                        Rejected
                      </span>
                    @endif
                  </td>
                  <td class="py-5 px-6 text-center align-top">
                    @if($item->status == 'approved' && $item->skillLetter)
                      <a href="{{ route('achievement.download', $item->id) }}" class="inline-flex items-center justify-center w-12 h-12 bg-brand-yellow hover:bg-yellow-400 text-brand-blue rounded-[14px] transition-all shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] hover:-translate-y-1" title="Download Sertifikat">
                        <span class="iconify text-[20px]" data-icon="lucide:download"></span>
                      </a>
                    @else
                      <span class="inline-flex items-center justify-center px-4 py-2.5 bg-brand-light text-slate-400 rounded-[12px] text-[11px] font-extrabold border border-slate-200 cursor-not-allowed shadow-sm">
                        Belum Tersedia
                      </span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="py-24 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-500">
                        <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mb-5 border border-slate-200 shadow-sm">
                            <span class="iconify text-[36px] text-slate-300" data-icon="lucide:history"></span>
                        </div>
                        <p class="text-[18px] font-extrabold text-brand-blue">Belum ada riwayat</p>
                        <p class="text-[14px] font-medium mt-1">Anda belum pernah mengajukan pencapaian.</p>
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

  <script>
    function updateFileName(input) {
      const placeholder = document.getElementById('uploadPlaceholder');
      const fileNameDisplay = document.getElementById('fileSelectedName');
      const zone = document.getElementById('uploadZone');
      
      if (input.files && input.files[0]) {
        placeholder.classList.add('hidden');
        fileNameDisplay.innerHTML = `<span class="iconify text-[20px]" data-icon="lucide:file-check"></span> <span>${input.files[0].name}</span>`;
        fileNameDisplay.classList.remove('hidden');
        fileNameDisplay.classList.add('flex');
        
        zone.classList.add('bg-emerald-50/50', 'border-emerald-300');
        zone.classList.remove('bg-brand-light', 'border-dashed', 'border-slate-300', 'hover:bg-brand-blue/5', 'hover:border-brand-blue');
      }
    }
  </script>
</body>
</html>