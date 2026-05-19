<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — E-Tutor Premium</title>
  
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
    .stagger-4 { animation-delay: 0.4s; }

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
<body class="font-sans text-slate-800 bg-brand-light selection:bg-brand-yellow selection:text-brand-blue overflow-x-hidden">

  <!-- Abstract Geometric Background (Blue, Yellow, Red) -->
  <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-brand-yellow/10 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
    <div class="absolute top-[40%] right-[10%] w-[300px] h-[300px] bg-brand-red/5 rounded-full blur-[80px] floating-shape" style="animation-delay: -4s;"></div>
    <!-- Elegant Grid Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
  </div>

  <div class="relative z-10 min-h-screen flex items-center justify-center p-4 sm:p-8">
    
    <div class="w-full max-w-[1100px] bg-white rounded-[32px] shadow-[0_20px_60px_-15px_rgba(15,76,129,0.15)] overflow-hidden flex flex-col md:flex-row border border-white relative animate-fade-in-up backdrop-blur-xl">
      
      <!-- LEFT PANEL: Elegant Branding (Blue Dominant) -->
      <div class="w-full md:w-5/12 bg-brand-blue p-10 md:p-12 relative flex flex-col justify-between overflow-hidden text-white">
        <!-- Decor in left panel -->
        <div class="absolute top-0 right-0 w-full h-full">
            <div class="absolute -top-20 -right-20 w-64 h-64 border-[30px] border-brand-yellow/20 rounded-full blur-[2px] floating-shape"></div>
            <div class="absolute -bottom-24 -left-20 w-80 h-80 border-[40px] border-brand-red/20 rounded-full blur-[2px] floating-shape" style="animation-delay: -3s;"></div>
        </div>

        <div class="relative z-10">
          <div class="w-16 h-16 bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] flex items-center justify-center shadow-lg mb-8">
            <span class="iconify text-brand-yellow text-3xl" data-icon="lucide:graduation-cap"></span>
          </div>
          
          <h1 class="text-3xl md:text-4xl font-extrabold leading-tight tracking-tight mb-4">
            E-Tutor <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Exclusive</span> Platform.
          </h1>
          
          <p class="text-[15px] text-blue-100/80 font-medium leading-relaxed max-w-sm">
            Tingkatkan pemahaman materi kuliah Anda secara komprehensif dengan bimbingan eksklusif bersama tutor terbaik.
          </p>
        </div>

        <div class="relative z-10 mt-12 md:mt-0 pt-8 border-t border-white/10">
          <div class="flex items-center gap-4">
            <div class="flex -space-x-3">
              <img class="w-10 h-10 rounded-full border-2 border-brand-blue shadow-sm" src="https://ui-avatars.com/api/?name=A&background=F59E0B&color=fff" alt="User">
              <img class="w-10 h-10 rounded-full border-2 border-brand-blue shadow-sm" src="https://ui-avatars.com/api/?name=B&background=E11D48&color=fff" alt="User">
              <img class="w-10 h-10 rounded-full border-2 border-brand-blue shadow-sm" src="https://ui-avatars.com/api/?name=C&background=ffffff&color=0F4C81" alt="User">
            </div>
            <div class="text-[13px] font-medium text-blue-100/90 leading-tight">
              Bergabung bersama<br>
              <strong class="text-brand-yellow font-extrabold text-[14px]">500+ Mahasiswa</strong>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT PANEL: Login Form (White Dominant) -->
      <div class="w-full md:w-7/12 p-8 sm:p-12 md:p-16 relative bg-white/80">
        
        <div class="max-w-md mx-auto relative z-10">
          
          <div class="mb-10 animate-fade-in-up stagger-1">
            <h2 class="text-[32px] font-extrabold text-brand-blue tracking-tight mb-2">Selamat Datang</h2>
            <p class="text-slate-500 font-medium text-[15px]">Akses dashboard premium Anda sekarang.</p>
          </div>

          <form id="loginForm" action="{{ route('login') }}" method="POST" novalidate class="space-y-6">
            @csrf

            @if ($errors->any())
              <div class="animate-fade-in-up stagger-2 bg-brand-red/5 border border-brand-red/20 text-brand-red px-5 py-3.5 rounded-[16px] text-[13px] font-bold flex items-start gap-3 shadow-sm">
                <span class="iconify text-lg shrink-0 mt-0.5" data-icon="lucide:alert-circle"></span>
                <span>{{ $errors->first() }}</span>
              </div>
            @endif

            @if(session('loginError'))
              <div class="animate-fade-in-up stagger-2 bg-brand-red/5 border border-brand-red/20 text-brand-red px-5 py-3.5 rounded-[16px] text-[13px] font-bold flex items-start gap-3 shadow-sm">
                <span class="iconify text-lg shrink-0 mt-0.5" data-icon="lucide:alert-circle"></span>
                <span>{{ session('loginError') }}</span>
              </div>
            @endif

            <div class="space-y-2 group animate-fade-in-up stagger-2">
              <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest" for="email">Alamat Email</label>
              <div class="relative">
                <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg transition-colors group-focus-within:text-brand-blue" data-icon="lucide:mail"></span>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] text-slate-800 font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue focus:bg-white transition-all placeholder:text-slate-400 placeholder:font-normal shadow-sm"
                       placeholder="contoh@email.com">
              </div>
            </div>

            <div class="space-y-2 group animate-fade-in-up stagger-3">
              <div class="flex items-center justify-between">
                <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest" for="password">Password</label>
                <a href="{{ route('password.request') }}" class="text-[13px] font-extrabold text-brand-red hover:text-red-700 transition-colors">Lupa Password?</a>
              </div>
              <div class="relative">
                <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg transition-colors group-focus-within:text-brand-blue" data-icon="lucide:lock"></span>
                <input type="password" id="password" name="password" required
                       class="w-full pl-12 pr-12 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] text-slate-800 font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue focus:bg-white transition-all placeholder:text-slate-400 placeholder:font-normal shadow-sm"
                       placeholder="••••••••">
                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 p-2 rounded-xl hover:bg-slate-200 text-slate-400 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-blue/20" onclick="togglePw('password', this)">
                  <span class="iconify text-lg" data-icon="lucide:eye"></span>
                </button>
              </div>
            </div>

            <div class="flex items-center pt-2 animate-fade-in-up stagger-3">
              <label class="flex items-center gap-3 cursor-pointer group/cb">
                <div class="relative flex items-center justify-center w-5 h-5">
                  <input type="checkbox" id="remember" name="remember" class="peer sr-only">
                  <div class="w-5 h-5 border-2 border-slate-300 rounded-md bg-white peer-checked:bg-brand-blue peer-checked:border-brand-blue transition-all shadow-sm"></div>
                  <span class="iconify text-white text-[11px] font-extrabold absolute opacity-0 peer-checked:opacity-100 transition-opacity" data-icon="lucide:check"></span>
                </div>
                <span class="text-[13px] font-bold text-slate-500 select-none group-hover/cb:text-brand-blue transition-colors">Ingat sesi saya</span>
              </label>
            </div>

            <div class="animate-fade-in-up stagger-4 pt-4">
                <button type="submit" class="btn-shine w-full py-4 bg-brand-yellow hover:bg-yellow-400 text-brand-blue text-[15px] font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all focus:outline-none focus:ring-4 focus:ring-brand-yellow/30 flex items-center justify-center gap-2">
                  Masuk ke Akun <span class="iconify text-xl" data-icon="lucide:arrow-right"></span>
                </button>
            </div>
          </form>

          <div class="mt-10 text-center animate-fade-in-up stagger-4">
            <p class="text-[14px] font-medium text-slate-500">
              Belum memiliki akun? 
              <a href="/registrasi" class="text-brand-blue font-extrabold hover:text-blue-700 hover:underline underline-offset-4 transition-all ml-1">Daftar Sekarang</a>
            </p>
          </div>
          
        </div>
      </div>

    </div>
  </div>

  <script>
    function togglePw(id, btn) {
      const input = document.getElementById(id);
      const icon = btn.querySelector('.iconify');
      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-icon', 'lucide:eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-icon', 'lucide:eye');
      }
    }
  </script>
</body>
</html>