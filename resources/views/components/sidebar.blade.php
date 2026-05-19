<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<!-- Add Plus Jakarta Sans to Sidebar environment in case it's not globally wrapped -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
  aside {
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  /* Custom Scrollbar for Pro look */
  aside ::-webkit-scrollbar {
    width: 6px;
  }
  aside ::-webkit-scrollbar-track {
    background: transparent;
  }
  aside ::-webkit-scrollbar-thumb {
    background-color: rgba(15, 76, 129, 0.1);
    border-radius: 10px;
  }
  aside ::-webkit-scrollbar-thumb:hover {
    background-color: rgba(15, 76, 129, 0.2);
  }
</style>

<aside class="w-[280px] min-h-screen bg-white text-slate-800 fixed top-0 left-0 z-[100] flex flex-col border-r border-slate-200 shadow-[4px_0_24px_rgba(15,76,129,0.03)]">
    <!-- Brand Area -->
    <div class="px-6 py-8 flex items-center gap-4 relative bg-slate-50/50">
        <div class="absolute bottom-0 left-6 right-6 h-px bg-gradient-to-r from-slate-200 via-slate-100 to-transparent"></div>
        <div class="w-12 h-12 bg-blue-900 rounded-[14px] flex items-center justify-center shadow-[0_8px_15px_rgba(15,76,129,0.2)] border border-blue-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-yellow-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
            <span class="iconify text-[24px] text-yellow-400 group-hover:text-blue-900 transition-colors duration-300 relative z-10" data-icon="lucide:graduation-cap"></span>
        </div>
        <div>
            <div class="font-extrabold text-[22px] tracking-tight text-blue-900 leading-none">E-Tutor</div>
            <div class="text-[10px] text-yellow-600 mt-1.5 font-extrabold uppercase tracking-widest">Sistem Akademik</div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 flex flex-col gap-2 overflow-y-auto">
        
        <div class="px-3 mb-2 mt-2">
            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Menu Utama</span>
        </div>

        @if(Auth::user()->role == 'admin')
            <!-- ADMIN MENU -->
            <details class="group [&_summary::-webkit-details-marker]:hidden" open>
                <summary class="flex items-center gap-3 px-3 py-3.5 rounded-[14px] text-[14px] font-extrabold text-slate-600 hover:text-blue-900 hover:bg-blue-50 cursor-pointer transition-all select-none group-open:text-blue-900 group-open:bg-blue-50">
                    <span class="iconify text-[20px] text-slate-400 group-open:text-blue-700 group-hover:text-blue-700 transition-colors" data-icon="lucide:layout-dashboard"></span>
                    Dashboard Admin
                    <span class="iconify ml-auto text-[16px] text-slate-400 transition-transform duration-300 group-open:rotate-90" data-icon="lucide:chevron-right"></span>
                </summary>
                <div class="pl-2 py-1.5 flex flex-col gap-1 mt-1 ml-5 border-l-2 border-slate-100">
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('admin/acc-achievement') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-700 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/admin/acc-achievement">
                        Verifikasi Prestasi
                    </a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('admin/manage-classes') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-700 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/admin/manage-classes">
                        Manajemen Kelas
                    </a>
                </div>
            </details>
        
        @elseif(Auth::user()->role == 'kaprodi')
            <!-- KAPRODI MENU -->
            <details class="group [&_summary::-webkit-details-marker]:hidden" open>
                <summary class="flex items-center gap-3 px-3 py-3.5 rounded-[14px] text-[14px] font-extrabold text-slate-600 hover:text-blue-900 hover:bg-blue-50 cursor-pointer transition-all select-none group-open:text-blue-900 group-open:bg-blue-50">
                    <span class="iconify text-[20px] text-slate-400 group-open:text-yellow-500 group-hover:text-yellow-500 transition-colors" data-icon="lucide:award"></span>
                    Menu Kaprodi
                    <span class="iconify ml-auto text-[16px] text-slate-400 transition-transform duration-300 group-open:rotate-90" data-icon="lucide:chevron-right"></span>
                </summary>
                <div class="pl-2 py-1.5 flex flex-col gap-1 mt-1 ml-5 border-l-2 border-slate-100">
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('kaprodi/acc-pengajuan') ? 'text-yellow-700 bg-yellow-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-yellow-500 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-yellow-600 hover:bg-slate-50' }}"
                       href="/kaprodi/acc-pengajuan">
                        Verifikasi Tutor
                    </a>
                </div>
            </details>
            
        @else
            <!-- MAHASISWA / TUTOR MENU -->
            <details class="group [&_summary::-webkit-details-marker]:hidden" {{ request()->is('informasi-kelas') || request()->is('pendaftaran-kelas') || request()->is('aktivitas-peserta') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-3 py-3.5 rounded-[14px] text-[14px] font-extrabold text-slate-600 hover:text-blue-900 hover:bg-blue-50 cursor-pointer transition-all select-none group-open:text-blue-900 group-open:bg-blue-50">
                    <span class="iconify text-[20px] text-slate-400 group-open:text-red-500 group-hover:text-red-500 transition-colors" data-icon="lucide:book-open"></span>
                    Layanan Belajar
                    <span class="iconify ml-auto text-[16px] text-slate-400 transition-transform duration-300 group-open:rotate-90" data-icon="lucide:chevron-right"></span>
                </summary>
                <div class="pl-2 py-1.5 flex flex-col gap-1 mt-1 ml-5 border-l-2 border-slate-100">
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('informasi-kelas') ? 'text-red-700 bg-red-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-red-500 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-red-600 hover:bg-slate-50' }}"
                       href="/informasi-kelas">Informasi Kelas</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('pendaftaran-kelas') ? 'text-red-700 bg-red-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-red-500 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-red-600 hover:bg-slate-50' }}"
                       href="/pendaftaran-kelas">Daftar Kelas</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('aktivitas-peserta') ? 'text-red-700 bg-red-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-red-500 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-red-600 hover:bg-slate-50' }}"
                       href="/aktivitas-peserta">Aktivitas Anda</a>
                </div>
            </details>
            
            <details class="group [&_summary::-webkit-details-marker]:hidden mt-2" {{ request()->is('pengajuan-tutor') || request()->is('status-pengajuan') || request()->is('jadwal-tutor') || request()->is('list-pendaftar') || request()->is('achievement') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-3 py-3.5 rounded-[14px] text-[14px] font-extrabold text-slate-600 hover:text-blue-900 hover:bg-blue-50 cursor-pointer transition-all select-none group-open:text-blue-900 group-open:bg-blue-50">
                    <span class="iconify text-[20px] text-slate-400 group-open:text-blue-600 group-hover:text-blue-600 transition-colors" data-icon="lucide:briefcase"></span>
                    Portal Tutor
                    <span class="iconify ml-auto text-[16px] text-slate-400 transition-transform duration-300 group-open:rotate-90" data-icon="lucide:chevron-right"></span>
                </summary>
                <div class="pl-2 py-1.5 flex flex-col gap-1 mt-1 ml-5 border-l-2 border-slate-100">
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('pengajuan-tutor') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-600 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/pengajuan-tutor">Pengajuan Baru</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('status-pengajuan') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-600 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/status-pengajuan">Status Pengajuan</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('jadwal-tutor') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-600 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/jadwal-tutor">Jadwal Mengajar</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('list-pendaftar') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-600 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/list-pendaftar">Kelola Peserta</a>
                    <a class="flex items-center gap-3 pl-6 pr-3 py-3 rounded-xl text-[13px] font-bold transition-all relative overflow-hidden
                        {{ request()->is('achievement') ? 'text-blue-800 bg-blue-50/80 before:absolute before:-left-[2px] before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-6 before:bg-blue-600 before:rounded-r-full shadow-sm' : 'text-slate-500 hover:text-blue-700 hover:bg-slate-50' }}"
                       href="/achievement">Pencapaian</a>
                </div>
            </details>
            
            <div class="h-px bg-slate-200 my-5 mx-3 relative"><div class="absolute left-1/2 -translate-x-1/2 -top-[9px] bg-white px-2 text-[10px] font-extrabold text-slate-400">EKSTRA</div></div>
            
            <a class="flex items-center gap-3 px-3 py-3.5 rounded-[14px] text-[14px] font-extrabold transition-all relative group
                {{ request()->is('surat-rekomendasi*') ? 'bg-blue-900 text-yellow-400 shadow-[0_8px_20px_rgba(15,76,129,0.3)]' : 'text-slate-600 hover:text-blue-900 hover:bg-blue-50' }}" 
               href="/surat-rekomendasi">
                <span class="iconify text-[20px] transition-transform group-hover:rotate-12 {{ request()->is('surat-rekomendasi*') ? 'text-yellow-400' : 'text-slate-400 group-hover:text-yellow-500' }}" data-icon="lucide:file-signature"></span>
                Surat Rekomendasi
            </a>
        @endif
        
        <a class="flex items-center gap-3 px-3 py-3.5 mt-2 rounded-[14px] text-[14px] font-extrabold transition-all relative
            {{ request()->is('notifikasi*') ? 'bg-slate-100 text-blue-900' : 'text-slate-600 hover:text-blue-900 hover:bg-slate-50' }}" 
           href="/notifikasi">
            <span class="iconify text-[20px] {{ request()->is('notifikasi*') ? 'text-blue-600' : 'text-slate-400' }}" data-icon="lucide:bell"></span>
            Notifikasi
            @php
                $unreadCount = Auth::user()->notifications()->where('is_read', false)->count();
            @endphp
            @if($unreadCount > 0)
                <span class="ml-auto bg-red-600 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-[0_4px_10px_rgba(225,29,72,0.4)] animate-pulse">{{ $unreadCount }}</span>
            @endif
        </a>
    </nav>
    
    <!-- User Profile Area -->
    <div class="p-6 border-t border-slate-200 bg-white relative overflow-hidden">
        @auth
        <div class="flex items-center gap-3 mb-5">
            <div class="w-12 h-12 rounded-full bg-blue-50 border-2 border-blue-100 flex items-center justify-center font-extrabold text-[15px] text-blue-800 shadow-sm relative z-10">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0 relative z-10">
                <div class="text-[14px] font-extrabold text-slate-800 truncate">{{ Auth::user()->name }}</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">{{ Auth::user()->role }}</div>
            </div>
        </div>
        <form action="/logout" method="POST" class="relative z-10">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl border-2 border-slate-100 bg-white text-slate-600 text-[13px] font-extrabold hover:bg-red-50 hover:border-red-100 hover:text-red-600 transition-all shadow-sm group">
                <span class="iconify text-[18px] group-hover:text-red-500 transition-colors" data-icon="lucide:log-out"></span>
                Keluar Aplikasi
            </button>
        </form>
        @endauth
    </div>
</aside>