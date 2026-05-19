<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Surat Rekomendasi</title>
  
  <!-- Premium Font: Plus Jakarta Sans & Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
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
    
    .floating-shape {
      animation: floatSlow 8s ease-in-out infinite;
    }
  </style>

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
<body class="bg-brand-light font-sans min-h-screen text-slate-800 flex overflow-x-hidden selection:bg-brand-yellow selection:text-brand-blue">

  <x-sidebar />

  <!-- Main Content -->
  <main class="ml-[280px] flex-1 min-h-screen flex flex-col relative">
    
    <!-- Abstract Geometric Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden ml-[280px]">
      <div class="absolute top-[10%] right-[10%] w-[400px] h-[400px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
      <div class="absolute bottom-[20%] left-[5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
      <!-- Elegant Grid Overlay -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
    </div>

    <!-- Topbar -->
    <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-0 z-40 px-8 py-4 flex items-center justify-between shadow-[0_4px_24px_rgba(15,76,129,0.02)]">
      <div class="flex items-center gap-2 text-[13px] font-extrabold text-slate-400 tracking-widest uppercase">
        <a href="/pengajuan-tutor" class="hover:text-brand-blue transition-colors">Home</a>
        <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span>
        <span class="text-brand-blue">Surat Rekomendasi</span>
      </div>
      <div class="flex items-center gap-3 relative z-10">
        @if($letter)
          <a href="{{ route('surat-rekomendasi.preview') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-50 hover:bg-brand-blue hover:text-white text-slate-600 text-[13px] font-extrabold rounded-[12px] transition-all border border-slate-200 shadow-sm group">
            <span class="iconify text-[18px] group-hover:scale-110 transition-transform" data-icon="lucide:eye"></span> Preview
          </a>
          <a href="{{ route('surat-rekomendasi.download') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-yellow hover:bg-yellow-400 text-brand-blue text-[13px] font-extrabold rounded-[12px] transition-all shadow-sm group">
            <span class="iconify text-[18px] group-hover:scale-110 transition-transform" data-icon="lucide:download"></span> Download PDF
          </a>
        @endif
        <button type="submit" form="form-surat" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand-blue hover:bg-blue-900 text-white text-[13px] font-extrabold rounded-[12px] shadow-[0_4px_14px_0_rgba(15,76,129,0.39)] transition-all group">
          <span class="iconify text-[18px] group-hover:scale-110 transition-transform" data-icon="lucide:save"></span> Simpan
        </button>
      </div>
    </header>

    <div class="p-8 flex-1 flex flex-col items-center relative z-10">
      
      <div class="w-full max-w-4xl animate-fade-in-up">

        @if(session('success'))
          <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-[16px] mb-8 text-[14px] font-extrabold flex items-center gap-3 shadow-sm">
              <span class="iconify text-emerald-500 text-[20px]" data-icon="lucide:check-circle"></span> {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="bg-brand-red/10 border border-brand-red/20 text-brand-red px-6 py-4 rounded-[16px] mb-8 text-[14px] font-medium shadow-sm">
              <div class="flex items-center gap-2 mb-2 font-extrabold">
                  <span class="iconify text-brand-red text-[20px]" data-icon="lucide:alert-circle"></span> Terdapat Kesalahan:
              </div>
              <ul class="list-disc list-inside space-y-1 ml-2 text-brand-red/90 font-bold">
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="flex items-start md:items-center gap-4 px-6 py-5 bg-brand-blue/5 border border-brand-blue/20 rounded-[16px] text-[13px] text-brand-blue font-bold mb-8 shadow-sm">
          <span class="iconify text-[24px] text-brand-yellow flex-shrink-0" data-icon="lucide:info"></span>
          <span>Klik pada kolom yang bergaris putus-putus untuk mengedit isi surat. Tekan tombol <strong class="font-extrabold text-brand-blue bg-white px-2 py-1 rounded-[6px] border border-brand-blue/10">Simpan</strong> di sudut kanan atas untuk menyimpan perubahan.</span>
        </div>

        <form id="form-surat" action="{{ route('surat-rekomendasi.store') }}" method="POST">
          @csrf
          <!-- Letter Paper -->
          <div class="bg-white rounded-[8px] shadow-[0_20px_60px_rgba(15,76,129,0.15)] border border-slate-200 px-10 py-16 md:px-20 md:py-24 font-serif text-[12pt] leading-relaxed text-black min-h-[1100px] mx-auto relative group">
            
            <div class="absolute inset-0 ring-1 ring-inset ring-slate-100 rounded-[8px] pointer-events-none"></div>

            <!-- TITLE -->
            <h1 class="text-center font-bold text-[13pt] uppercase tracking-wide mb-10 underline underline-offset-4 decoration-2">
              Surat Rekomendasi Calon Tutor
            </h1>

            <!-- DATA DOSEN -->
            <div class="space-y-1.5 mb-8">
              <div class="flex items-baseline">
                <span class="w-36">Nama</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="lecturer_name" id="lecturer_name" placeholder="Nama dosen..." 
                       value="{{ old('lecturer_name', $letter->lecturer_name ?? '') }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
              <div class="flex items-baseline">
                <span class="w-36">NIP</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="lecturer_nip" placeholder="NIP dosen..." 
                       value="{{ old('lecturer_nip', $letter->lecturer_nip ?? '') }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
              <div class="flex items-baseline">
                <span class="w-36">Jabatan Dosen</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="lecturer_position" placeholder="Jabatan dosen..." 
                       value="{{ old('lecturer_position', $letter->lecturer_position ?? '') }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
            </div>

            <!-- PEMBUKA -->
            <p class="text-justify mb-2">Dengan ini menerangkan bahwa:</p>

            <!-- DATA MAHASISWA -->
            <div class="space-y-1.5 mb-8">
              <div class="flex items-baseline">
                <span class="w-36">Nama</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="student_name" id="student_name" placeholder="Nama mahasiswa..." 
                       value="{{ old('student_name', $letter->student_name ?? ($pengajuan->nama ?? $user->name ?? '')) }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
              <div class="flex items-baseline">
                <span class="w-36">NIM</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="student_nim" placeholder="NIM mahasiswa..." 
                       value="{{ old('student_nim', $letter->student_nim ?? ($pengajuan->nim ?? '')) }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
              <div class="flex items-baseline">
                <span class="w-36">Program Studi</span>
                <span class="w-6 text-center">:</span>
                <input type="text" name="student_prodi" placeholder="Program studi..." 
                       value="{{ old('student_prodi', $letter->student_prodi ?? '') }}"
                       class="flex-1 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
              </div>
            </div>

            <!-- ISI SURAT -->
            <p class="text-justify mb-4 indent-10">
              Merupakan mahasiswa yang memiliki kemampuan akademik, pemahaman materi, serta kemampuan komunikasi yang baik selama mengikuti proses perkuliahan. Berdasarkan hasil pengamatan dan penilaian selama kegiatan pembelajaran berlangsung, mahasiswa tersebut dinilai mampu untuk membantu proses pembelajaran dan layak menjadi tutor mahasiswa.
            </p>
            <p class="text-justify mb-10 indent-10">
              Surat rekomendasi ini dibuat sebagai salah satu persyaratan pengajuan diri sebagai tutor pada program bimbingan belajar mahasiswa. Demikian surat ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.
            </p>

            <!-- TANGGAL & TANDA TANGAN -->
            <div class="flex justify-end mb-16">
              <div class="text-center">
                <div class="flex items-baseline justify-center mb-8">
                  <input type="text" name="place" placeholder="Kota..." 
                         value="{{ old('place', $letter->place ?? 'Palembang') }}"
                         class="w-32 bg-transparent border-b-2 border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 outline-none px-1 py-0.5 text-center transition-colors font-serif">, 
                  <input type="date" name="date" 
                         value="{{ old('date', optional($letter)->date ? $letter->date->format('Y-m-d') : now()->format('Y-m-d')) }}"
                         class="w-40 bg-slate-50 border-b-2 border-dashed border-slate-300 focus:border-brand-blue outline-none px-2 py-0.5 ml-2 transition-colors cursor-pointer font-sans text-[11pt]">
                </div>
                
                <div class="mb-24">Nama Tutor</div>
                <div class="border-b-2 border-black inline-block px-4 min-w-[200px]">
                  <input type="text" name="student_name_sig" id="sig-student-name" disabled 
                         value="{{ old('student_name', $letter->student_name ?? ($pengajuan->nama ?? $user->name ?? '')) }}"
                         class="w-full text-center font-bold bg-transparent outline-none border-b border-dashed border-transparent focus:border-slate-300">
                </div>
                <div class="mt-1">
                  <input type="text" name="student_nim_sig" id="sig-student-nim" disabled 
                         value="{{ old('student_nim', $letter->student_nim ?? ($pengajuan->nim ?? '')) }}"
                         class="w-full text-center text-[11pt] bg-transparent outline-none border-b border-dashed border-transparent focus:border-slate-300">
                </div>
              </div>
            </div>

            <!-- MENYETUJUI -->
            <div class="text-center font-bold mb-8">Menyetujui</div>

            <div class="flex justify-between items-start gap-8">
              <!-- Dosen PA -->
              <div class="text-center flex-1">
                <div class="mb-24">Dosen Pembimbing Akademik,</div>
                <div class="border-b-2 border-black inline-block w-full max-w-[240px]">
                  <input type="text" name="pa_lecturer_name" placeholder="Nama Dosen PA..." 
                         value="{{ old('pa_lecturer_name', $letter->pa_lecturer_name ?? '') }}"
                         class="w-full text-center font-bold bg-transparent outline-none border-b border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 px-1 py-0.5 transition-colors placeholder:font-normal placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
                </div>
                <div class="mt-1">
                  <input type="text" name="pa_lecturer_nip" placeholder="NIP..." 
                         value="{{ old('pa_lecturer_nip', $letter->pa_lecturer_nip ?? '') }}"
                         class="w-full max-w-[240px] text-center text-[11pt] bg-transparent outline-none border-b border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
                </div>
              </div>

              <!-- Dosen Pengampu -->
              <div class="text-center flex-1">
                <div class="mb-24">Dosen Pengampu Akademik,</div>
                <div class="border-b-2 border-black inline-block w-full max-w-[240px]">
                  <input type="text" name="course_lecturer_name" placeholder="Nama Dosen Pengampu..." 
                         value="{{ old('course_lecturer_name', $letter->course_lecturer_name ?? '') }}"
                         class="w-full text-center font-bold bg-transparent outline-none border-b border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 px-1 py-0.5 transition-colors placeholder:font-normal placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
                </div>
                <div class="mt-1">
                  <input type="text" name="course_lecturer_nip" placeholder="NIP..." 
                         value="{{ old('course_lecturer_nip', $letter->course_lecturer_nip ?? '') }}"
                         class="w-full max-w-[240px] text-center text-[11pt] bg-transparent outline-none border-b border-dashed border-slate-300 focus:border-brand-blue focus:bg-brand-blue/5 px-1 py-0.5 transition-colors placeholder:text-slate-300 placeholder:italic placeholder:font-sans placeholder:text-sm">
                </div>
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </main>

  <script>
    // Sync student name & nim ke signature box (read-only)
    const studentNameInput = document.getElementById('student_name');
    const sigStudentName   = document.getElementById('sig-student-name');
    const studentNimInput  = document.querySelector('input[name="student_nim"]');
    const sigStudentNim    = document.getElementById('sig-student-nim');

    if (studentNameInput && sigStudentName) {
      studentNameInput.addEventListener('input', () => {
        sigStudentName.value = studentNameInput.value;
      });
    }
    if (studentNimInput && sigStudentNim) {
      studentNimInput.addEventListener('input', () => {
        sigStudentNim.value = studentNimInput.value;
      });
    }
  </script>
</body>
</html>
