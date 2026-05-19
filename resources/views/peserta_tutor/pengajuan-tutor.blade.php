<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Pengajuan Tutor</title>
  
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

  <!-- Main Content -->
  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[10%] right-[10%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <div class="absolute top-[50%] right-[20%] w-[300px] h-[300px] bg-brand-red/5 rounded-full blur-[80px] floating-shape" style="animation-delay: -4s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        Menu <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Pengajuan Tutor</span>
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

    <div class="p-6 md:p-10 flex-1 flex items-center justify-center min-h-[calc(100vh-80px)] relative z-10">
      
      <div class="w-full max-w-4xl bg-brand-blue rounded-[32px] p-8 md:p-12 relative overflow-hidden shadow-[0_20px_50px_rgba(15,76,129,0.2)] border border-brand-blue">
        <!-- Decor in card -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-brand-yellow/20 rounded-full blur-[80px] pointer-events-none floating-shape"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-brand-red/20 rounded-full blur-[80px] pointer-events-none floating-shape" style="animation-delay: -2s;"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPg==')] opacity-20"></div>

        <div class="relative z-10">

          <!-- Header -->
          <div class="text-center mb-10 animate-fade-in-up">
            <div class="w-20 h-20 bg-white/10 border border-white/20 rounded-[24px] mx-auto flex items-center justify-center text-4xl mb-6 backdrop-blur-md shadow-[0_8px_20px_rgba(0,0,0,0.1)] text-brand-yellow">
                <span class="iconify text-brand-yellow" data-icon="lucide:file-signature"></span>
            </div>
            <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-tight">Pengajuan Menjadi <span class="text-brand-yellow">Tutor</span></h1>
            <p class="text-[15px] text-blue-100/90 max-w-xl mx-auto leading-relaxed font-medium">
              Ajukan diri Anda untuk membuka kelas tutoring premium. Form ini akan diverifikasi terlebih dahulu oleh Kaprodi sebelum jadwal dapat dibuat.
            </p>
          </div>

          @if(session('success'))
            <div class="animate-fade-in-up stagger-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold flex items-start gap-3 backdrop-blur-md shadow-sm">
                <span class="iconify text-emerald-400 text-xl shrink-0 mt-0.5" data-icon="lucide:check-circle-2"></span> {{ session('success') }}
            </div>
          @endif

          @if($errors->any())
            <div class="animate-fade-in-up stagger-1 bg-brand-red/10 border border-brand-red/30 text-red-200 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold backdrop-blur-md shadow-sm">
                <div class="flex items-center gap-2 mb-2">
                    <span class="iconify text-brand-red text-lg" data-icon="lucide:alert-circle"></span> Terdapat Kesalahan:
                </div>
                <ul class="list-disc list-inside space-y-1 text-red-200/90 font-medium text-[13px] ml-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="bg-white rounded-[24px] p-8 md:p-10 shadow-2xl animate-fade-in-up stagger-2">
            <form action="/pengajuan-tutor" method="post" enctype="multipart/form-data" class="space-y-6">
              @csrf

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- NAMA -->
                  <div class="space-y-2">
                      <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                          Nama Lengkap <span class="text-brand-red">*</span>
                      </label>
                      <div class="relative group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:type"></span>
                          <input type="text" name="nama" placeholder="Masukkan nama Anda" required autocomplete="name" 
                                class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400">
                      </div>
                  </div>

                  <!-- NIM -->
                  <div class="space-y-2">
                      <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                          NIM <span class="text-brand-red">*</span>
                      </label>
                      <div class="relative group">
                          <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:hash"></span>
                          <input type="number" name="nim" placeholder="Masukkan angka NIM" required min="0" inputmode="numeric" 
                                class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                      </div>
                  </div>
              </div>

              <!-- TOPIK PEMBAHASAN -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Topik / Mata Kuliah <span class="text-brand-red">*</span>
                  </label>
                  <div class="relative group">
                      <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px] group-focus-within:text-brand-blue transition-colors pointer-events-none" data-icon="lucide:bookmark"></span>
                      <input type="text" name="topik" placeholder="Contoh: Pemrograman Web Lanjut (Laravel)" required 
                            class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400">
                  </div>
                  <div class="text-[12px] text-slate-500 ml-1 mt-2 font-bold"><span class="iconify inline text-brand-yellow mr-1" data-icon="lucide:info"></span>Topik ini akan menjadi judul kelas utama Anda nantinya.</div>
              </div>

              <!-- BUKTI MEMENUHI -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Dokumen Bukti Memenuhi Syarat <span class="text-brand-red">*</span>
                  </label>
                  <div class="upload-zone relative border-2 border-dashed border-slate-300 hover:border-brand-blue bg-brand-light hover:bg-brand-blue/5 rounded-[20px] p-10 text-center transition-all cursor-pointer group">
                      <input type="file" name="bukti_memenuhi" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" required class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" id="file-upload">
                      <div class="relative z-0 pointer-events-none flex flex-col items-center">
                          <div class="w-16 h-16 rounded-[20px] bg-white border border-slate-200 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-sm">
                              <span class="iconify text-[32px] text-slate-400 group-hover:text-brand-blue transition-colors" data-icon="lucide:upload-cloud"></span>
                          </div>
                          <div class="text-[16px] font-extrabold text-slate-800 mb-2 upload-text-main">
                              <span class="text-brand-blue group-hover:underline underline-offset-4">Pilih Dokumen</span> atau seret file kemari
                          </div>
                          <div class="text-[14px] text-slate-500 mb-5 font-medium">KHS, Sertifikat, atau Transkrip Nilai (Bukti kemampuan Anda)</div>
                          <div class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-[12px] font-extrabold text-slate-500 border border-slate-200 shadow-sm">
                              <span class="iconify text-brand-red" data-icon="lucide:file-type-2"></span> PDF, JPG, PNG, DOC (Maks. 5MB)
                          </div>
                      </div>
                  </div>
              </div>

              <!-- DESKRIPSI JOB -->
              <div class="space-y-2">
                  <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest">
                      Deskripsi & Rencana Mengajar <span class="text-brand-red">*</span>
                  </label>
                  <textarea name="deskripsi" rows="5" placeholder="Ceritakan pengalaman Anda terkait topik ini dan bagaimana rencana Anda dalam mengajarkannya kepada peserta..." required 
                            class="w-full px-5 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] font-bold text-slate-800 focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-slate-400 resize-none"></textarea>
              </div>

              <div class="h-px bg-slate-100 my-8"></div>

              <div class="flex flex-col gap-4 mt-8">
                  <button type="submit" class="btn-shine w-full py-4 bg-brand-yellow hover:bg-yellow-400 text-brand-blue font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2 text-[15px] group/btn">
                      Kirim Pengajuan Tutor <span class="iconify text-[20px] group-hover/btn:translate-x-1 transition-transform" data-icon="lucide:send"></span>
                  </button>

                  <a href="/status-pengajuan" class="w-full py-4 bg-slate-50 border border-slate-200 text-slate-600 font-extrabold rounded-[16px] hover:bg-brand-blue hover:text-white hover:border-brand-blue transition-all flex items-center justify-center gap-2 text-[14px] shadow-sm group/link">
                      <span class="iconify text-slate-400 group-hover/link:text-white transition-colors text-[18px]" data-icon="lucide:search"></span> Cek Status Pengajuan Sebelumnya
                  </a>
              </div>
              
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>

  <script>
    const fileInput = document.getElementById('file-upload');
    const uploadText = document.querySelector('.upload-text-main');
    const uploadZone = document.querySelector('.upload-zone');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            const fileName = this.files[0].name;
            uploadText.innerHTML = `<div class="flex flex-col items-center gap-2"><span class="inline-flex items-center gap-1.5 text-emerald-600"><span class="iconify text-[20px]" data-icon="lucide:check-circle-2"></span> File Berhasil Dipilih:</span> <span class="font-extrabold text-brand-blue bg-brand-light px-4 py-2 rounded-lg border border-slate-200">${fileName}</span></div>`;
            uploadZone.classList.add('border-emerald-500/50', 'bg-emerald-50/50');
            uploadZone.classList.remove('border-slate-300', 'bg-brand-light', 'hover:border-brand-blue', 'hover:bg-brand-blue/5');
        }
    });
  </script>
</body>
</html>