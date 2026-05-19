<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password — E-Tutor Premium</title>
  
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
<body class="font-sans text-slate-800 bg-brand-light selection:bg-brand-yellow selection:text-brand-blue overflow-x-hidden min-h-screen flex items-center justify-center">

  <!-- Abstract Geometric Background (Blue, Yellow, Red) -->
  <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute top-[10%] left-[-10%] w-[500px] h-[500px] bg-brand-yellow/10 rounded-full blur-[100px] floating-shape" style="animation-delay: 0s;"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-brand-blue/5 rounded-full blur-[120px] floating-shape" style="animation-delay: -2s;"></div>
    <div class="absolute top-[20%] right-[30%] w-[300px] h-[300px] bg-brand-red/5 rounded-full blur-[80px] floating-shape" style="animation-delay: -4s;"></div>
    <!-- Elegant Grid Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMTUsIDc2LCAxMjksIDAuMDUpIi8+PC9zdmc+')] opacity-60"></div>
  </div>

  <div class="relative z-10 w-full max-w-[480px] px-6 py-12">
    
    <div class="bg-white/90 backdrop-blur-xl border border-white rounded-[32px] p-10 sm:p-12 shadow-[0_20px_60px_-15px_rgba(15,76,129,0.15)] animate-fade-in-up">
      
      <div class="mb-10 text-center animate-fade-in-up stagger-1">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-brand-blue border border-brand-blue/20 rounded-[24px] mb-6 shadow-[0_10px_25px_rgba(15,76,129,0.2)]">
          <span class="iconify text-brand-yellow text-4xl" data-icon="lucide:key-round"></span>
        </div>
        <h1 class="text-[32px] font-extrabold text-brand-blue tracking-tight mb-3">Lupa Password?</h1>
        <p class="text-[15px] text-slate-500 font-medium leading-relaxed px-2">
          Masukkan alamat email Anda yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
        </p>
      </div>

      @if(session('success'))
        <div class="animate-fade-in-up stagger-2 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 px-5 py-4 rounded-[16px] mb-8 flex items-start gap-3 shadow-sm">
          <span class="iconify text-xl shrink-0 mt-0.5 text-emerald-500" data-icon="lucide:check-circle"></span>
          <p class="text-[13px] font-bold">{{ session('success') }}</p>
        </div>
      @endif

      @if($errors->any())
        <div class="animate-fade-in-up stagger-2 bg-brand-red/5 border border-brand-red/20 text-brand-red px-5 py-4 rounded-[16px] mb-8 flex items-start gap-3 shadow-sm">
          <span class="iconify text-xl shrink-0 mt-0.5" data-icon="lucide:alert-circle"></span>
          <p class="text-[13px] font-bold">{{ $errors->first() }}</p>
        </div>
      @endif

      <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="space-y-2 group animate-fade-in-up stagger-2">
          <label class="block text-[12px] font-extrabold text-brand-blue uppercase tracking-widest" for="email">Alamat Email</label>
          <div class="relative">
            <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg transition-colors group-focus-within:text-brand-blue" data-icon="lucide:mail"></span>
            <input type="email" id="email" name="email" required
                   class="w-full pl-12 pr-4 py-4 bg-brand-light border border-slate-200 rounded-[16px] text-[14px] text-slate-800 font-bold focus:outline-none focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue focus:bg-white transition-all shadow-sm placeholder:text-slate-400 placeholder:font-normal"
                   placeholder="nama@email.com">
          </div>
        </div>

        <div class="animate-fade-in-up stagger-3 pt-2">
            <button type="submit" class="btn-shine w-full py-4 bg-brand-yellow hover:bg-yellow-400 text-brand-blue text-[15px] font-extrabold rounded-[16px] shadow-[0_8px_20px_rgba(245,158,11,0.3)] hover:shadow-[0_12px_25px_rgba(245,158,11,0.4)] transform hover:-translate-y-1 transition-all focus:outline-none focus:ring-4 focus:ring-brand-yellow/30 flex items-center justify-center gap-2">
              Kirim Tautan Reset <span class="iconify text-xl" data-icon="lucide:send"></span>
            </button>
        </div>
      </form>

      <div class="mt-10 text-center animate-fade-in-up stagger-3">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-[14px] font-bold text-slate-500 hover:text-brand-blue transition-colors group/back">
          <span class="iconify transition-transform group-hover/back:-translate-x-1" data-icon="lucide:arrow-left"></span>
          Kembali ke Halaman Login
        </a>
      </div>
      
    </div>
  </div>
  
</body>
</html>
