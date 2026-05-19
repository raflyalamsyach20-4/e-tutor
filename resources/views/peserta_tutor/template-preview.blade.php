<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Preview Surat Rekomendasi</title>
  
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
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            serif: ['Times New Roman', 'Times', 'serif'],
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
<body class="bg-brand-light font-sans min-h-screen text-slate-800 flex flex-col items-center py-10 px-4 md:px-8 selection:bg-brand-yellow selection:text-brand-blue relative">

  <!-- Abstract Geometric Background -->
  <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute top-[10%] right-[10%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] opacity-70"></div>
    <div class="absolute bottom-[20%] left-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] opacity-70"></div>
    <!-- Elegant Grid Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
  </div>

  <!-- ACTION BAR (Luxury Design) -->
  <div class="w-full max-w-4xl bg-white/95 rounded-[24px] p-5 flex flex-col md:flex-row items-center justify-between gap-5 mb-10 shadow-[0_20px_50px_rgba(15,76,129,0.1)] border border-slate-200 sticky top-6 z-50 backdrop-blur-xl">
    <div class="flex items-center gap-4">
        <div class="w-14 h-14 bg-brand-light border border-slate-200 text-brand-blue rounded-[16px] flex items-center justify-center text-[24px] shadow-sm">
            <span class="iconify" data-icon="lucide:file-search"></span>
        </div>
        <div>
            <h2 class="text-[16px] font-extrabold text-brand-blue tracking-tight">Preview Surat Rekomendasi</h2>
            <div class="text-[12px] font-bold text-slate-500 flex items-center gap-1.5 mt-0.5 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow animate-pulse"></span> Mode Pratinjau
            </div>
        </div>
    </div>
    
    <div class="flex items-center gap-3">
      <a href="{{ route('surat-rekomendasi.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-slate-50 border border-slate-200 text-slate-600 hover:bg-brand-blue hover:text-white hover:border-brand-blue rounded-[14px] transition-all text-[14px] font-extrabold shadow-sm group/btn">
        <span class="iconify group-hover/btn:-translate-x-0.5 transition-transform" data-icon="lucide:arrow-left"></span> Kembali Edit
      </a>
      <a href="{{ route('surat-rekomendasi.download') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-brand-yellow hover:bg-yellow-400 text-brand-blue rounded-[14px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] hover:-translate-y-1 transition-all text-[14px] font-extrabold group">
        <span class="iconify group-hover:scale-110 transition-transform text-[18px]" data-icon="lucide:download"></span> Download PDF
      </a>
    </div>
  </div>

  <!-- LETTER PAPER (Classic Serif Style) -->
  <div class="w-full max-w-4xl bg-white shadow-[0_30px_60px_rgba(15,76,129,0.15)] border border-slate-200 px-12 py-20 md:px-24 md:py-28 font-serif text-[12pt] leading-relaxed text-black min-h-[1100px] relative z-10 rounded-[8px]">
    
    <div class="absolute inset-0 ring-1 ring-inset ring-slate-100 rounded-[8px] pointer-events-none"></div>

    <h1 class="text-center font-bold text-[13pt] uppercase tracking-wider mb-12 underline underline-offset-[6px] decoration-2">
      Surat Rekomendasi Calon Tutor
    </h1>

    <!-- DATA DOSEN -->
    <div class="space-y-2 mb-8">
      <div class="flex items-start">
        <span class="w-40 font-medium">Nama</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->lecturer_name }}</span>
      </div>
      <div class="flex items-start">
        <span class="w-40 font-medium">NIP</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->lecturer_nip }}</span>
      </div>
      <div class="flex items-start">
        <span class="w-40 font-medium">Jabatan Dosen</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->lecturer_position }}</span>
      </div>
    </div>

    <p class="text-justify mb-3">Dengan ini menerangkan bahwa:</p>

    <!-- DATA MAHASISWA -->
    <div class="space-y-2 mb-8">
      <div class="flex items-start">
        <span class="w-40 font-medium">Nama</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->student_name }}</span>
      </div>
      <div class="flex items-start">
        <span class="w-40 font-medium">NIM</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->student_nim }}</span>
      </div>
      <div class="flex items-start">
        <span class="w-40 font-medium">Program Studi</span>
        <span class="w-6 text-center">:</span>
        <span class="font-bold flex-1">{{ $letter->student_prodi }}</span>
      </div>
    </div>

    <!-- ISI SURAT -->
    <p class="text-justify mb-4 indent-12">
      Merupakan mahasiswa yang memiliki kemampuan akademik, pemahaman materi, serta kemampuan komunikasi yang baik selama mengikuti proses perkuliahan. Berdasarkan hasil pengamatan dan penilaian selama kegiatan pembelajaran berlangsung, mahasiswa tersebut dinilai mampu untuk membantu proses pembelajaran dan layak menjadi tutor mahasiswa.
    </p>
    <p class="text-justify mb-12 indent-12">
      Surat rekomendasi ini dibuat sebagai salah satu persyaratan pengajuan diri sebagai tutor pada program bimbingan belajar mahasiswa. Demikian surat ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.
    </p>

    <!-- TANGGAL & TANDA TANGAN (TUTOR) -->
    <div class="flex justify-end mb-20">
      <div class="text-center">
        <div class="mb-10">
          {{ $letter->place }}, {{ $letter->date->translatedFormat('d F Y') }}
        </div>
        
        <div class="mb-24">Nama Tutor</div>
        <div class="border-b-2 border-black inline-block px-6 font-bold pb-1 min-w-[200px]">
          {{ $letter->student_name }}
        </div>
        <div class="mt-1.5 text-[11pt]">
          {{ $letter->student_nim }}
        </div>
      </div>
    </div>

    <!-- MENYETUJUI -->
    <div class="text-center font-bold mb-10 tracking-widest uppercase text-[11pt]">Menyetujui</div>

    <div class="flex justify-between items-start gap-12">
      <!-- Dosen PA -->
      <div class="text-center flex-1">
        <div class="mb-24">Dosen Pembimbing Akademik,</div>
        <div class="border-b-2 border-black inline-block w-full font-bold pb-1 min-h-[1.5rem]">
          {{ $letter->pa_lecturer_name }}
        </div>
        <div class="mt-1.5 text-[11pt] min-h-[1.5rem]">
          {{ $letter->pa_lecturer_nip ? 'NIP. ' . $letter->pa_lecturer_nip : '' }}
        </div>
      </div>

      <!-- Dosen Pengampu -->
      <div class="text-center flex-1">
        <div class="mb-24">Dosen Pengampu Akademik,</div>
        <div class="border-b-2 border-black inline-block w-full font-bold pb-1 min-h-[1.5rem]">
          {{ $letter->course_lecturer_name }}
        </div>
        <div class="mt-1.5 text-[11pt] min-h-[1.5rem]">
          {{ $letter->course_lecturer_nip ? 'NIP. ' . $letter->course_lecturer_nip : '' }}
        </div>
      </div>
    </div>

  </div>

</body>
</html>
