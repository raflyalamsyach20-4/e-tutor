<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor Premium - Pusat Notifikasi</title>
  
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
    .stagger-3 { animation-delay: 0.3s; }

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
        Home <span class="iconify text-slate-300" data-icon="lucide:chevron-right"></span> <span class="text-brand-blue">Notifikasi</span>
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
          <h1 class="text-3xl md:text-[40px] font-extrabold text-white tracking-tight mb-4 leading-none">Pusat <span class="text-brand-yellow">Notifikasi</span></h1>
          <p class="text-blue-100/90 text-[15px] max-w-xl leading-relaxed font-medium">
            Kelola dan lihat semua pemberitahuan sistem Anda di sini. Pastikan Anda memeriksa notifikasi secara berkala.
          </p>
        </div>
        <div class="flex gap-4">
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg">
              <div class="text-[12px] uppercase tracking-widest font-extrabold text-blue-200 mb-2">Total Pesan</div>
              <div class="text-[40px] font-extrabold text-white leading-none">{{ $notifications->total() }}</div>
          </div>
          <div class="bg-brand-yellow/10 backdrop-blur-md border border-brand-yellow/30 rounded-[20px] px-8 py-6 text-center min-w-[140px] shadow-lg relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-t from-brand-yellow/10 to-transparent"></div>
              <div class="relative z-10">
                <div class="text-[12px] uppercase tracking-widest font-extrabold text-yellow-200/90 mb-2">Belum Dibaca</div>
                <div class="text-[40px] font-extrabold text-brand-yellow leading-none">{{ Auth::user()->notifications()->where('is_read', false)->count() }}</div>
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
      <div class="flex items-center justify-between mb-8 animate-fade-in-up stagger-1">
        <div>
          <h2 class="text-[14px] font-extrabold text-brand-blue uppercase tracking-widest">Semua Notifikasi</h2>
        </div>
        <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
          @csrf
          <button type="submit" class="px-5 py-2.5 rounded-[12px] border border-slate-200 bg-white text-slate-600 text-[13px] font-extrabold hover:bg-brand-blue hover:text-brand-yellow hover:border-brand-blue transition-all shadow-sm">
            Tandai Semua Dibaca
          </button>
        </form>
      </div>

      <!-- Notifications Bento List -->
      <div class="space-y-4 animate-fade-in-up stagger-2">
        @forelse($notifications as $notif)
          @php
            $icon = 'lucide:bell';
            $colorClasses = 'bg-slate-100 text-slate-600 border-slate-200';
            $borderIndicator = 'border-l-slate-300';
            
            if ($notif->type === 'class_reminder') {
              $icon = 'lucide:calendar-clock';
              $colorClasses = 'bg-brand-blue/10 text-brand-blue border-brand-blue/20';
              $borderIndicator = 'border-l-brand-blue';
            } elseif ($notif->type === 'pengajuan_tutor') {
              $icon = 'lucide:shield-alert';
              $colorClasses = 'bg-brand-yellow/10 text-brand-yellow border-brand-yellow/30';
              $borderIndicator = 'border-l-brand-yellow';
            } elseif ($notif->type === 'achievement') {
              $icon = 'lucide:award';
              $colorClasses = 'bg-emerald-50 text-emerald-700 border-emerald-200';
              $borderIndicator = 'border-l-emerald-500';
            } elseif ($notif->type === 'pendaftaran_kelas') {
              $icon = 'lucide:user-plus';
              $colorClasses = 'bg-indigo-50 text-indigo-700 border-indigo-200';
              $borderIndicator = 'border-l-indigo-500';
            }
          @endphp
          
          <div data-id="{{ $notif->id }}" 
               class="bg-white/95 backdrop-blur-md rounded-[24px] border border-slate-200 border-l-[8px] {{ $borderIndicator }} p-6 shadow-[0_8px_30px_rgb(15,76,129,0.02)] hover:shadow-[0_15px_40px_rgb(15,76,129,0.06)] transition-all flex flex-col md:flex-row gap-6 items-start group relative {{ $notif->is_read ? '' : 'is-unread bg-brand-light/30' }}"
               onclick="markAsRead(this, {{ $notif->id }})">
              
              <div class="w-12 h-12 rounded-[14px] {{ $colorClasses }} flex items-center justify-center shrink-0 border group-hover:scale-105 transition-transform">
                <span class="iconify text-[22px]" data-icon="{{ $icon }}"></span>
              </div>
              
              <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-[8px] text-[10px] font-extrabold uppercase tracking-wider {{ $colorClasses }} border">
                    {{ str_replace('_', ' ', $notif->type) }}
                  </span>
                  @if(!$notif->is_read)
                    <span class="unread-dot w-2.5 h-2.5 rounded-full bg-brand-yellow shadow-[0_0_8px_rgba(245,158,11,0.6)] animate-pulse"></span>
                  @endif
                </div>
                <h3 class="text-[16px] font-extrabold text-brand-blue mb-1 leading-snug group-hover:text-blue-700 transition-colors">{{ $notif->title }}</h3>
                <p class="text-[14px] text-slate-500 font-medium leading-relaxed">{!! nl2br(e($notif->message)) !!}</p>
              </div>
              
              <div class="flex md:flex-col items-center md:items-end gap-3 shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-brand-light rounded-[10px] text-[12px] font-bold text-slate-500 border border-slate-200 shadow-sm">
                  <span class="iconify text-slate-400 text-[14px]" data-icon="lucide:clock"></span>
                  {{ $notif->created_at->diffForHumans() }}
                </div>
              </div>
          </div>
        @empty
          <div class="py-24 text-center bg-white/95 border border-slate-200 rounded-[24px] shadow-sm">
            <div class="w-20 h-20 bg-brand-light rounded-full flex items-center justify-center mx-auto mb-5 border border-slate-200">
              <span class="iconify text-[36px] text-slate-300" data-icon="lucide:inbox"></span>
            </div>
            <p class="text-[18px] font-extrabold text-brand-blue">Belum ada notifikasi</p>
            <p class="text-[14px] font-medium text-slate-400 mt-1">Semua pesan dari sistem E-Tutor akan muncul di sini.</p>
          </div>
        @endforelse
      </div>

      @if($notifications->hasPages())
        <div class="mt-8 animate-fade-in-up stagger-3 bg-white/90 border border-slate-200 rounded-[20px] p-5">
          {{ $notifications->links() }}
        </div>
      @endif
    </div>
  </main>

  <script>
    function markAsRead(element, id) {
      if (!element.classList.contains('is-unread')) return;

      fetch(`/notifikasi/${id}/mark-as-read`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        }
      }).then(response => {
        if (response.ok) {
          element.classList.remove('is-unread', 'bg-brand-light/30');
          const dot = element.querySelector('.unread-dot');
          if (dot) dot.remove();
        }
      });
    }
  </script>
</body>
</html>
