<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <span class="iconify" data-icon="lucide:graduation-cap" style="font-size: 20px; color: #fff;"></span>
        </div>
        <div>
            <div class="brand-text">E-Tutor</div>
            <div class="brand-sub">Sistem Tutoring</div>
        </div>
    </div>
    <nav class="sidebar-nav">
        @if(Auth::user()->role == 'admin')
            <details class="nav-parent admin" open>
                <summary><span class="nav-icon">⚙️</span> Menu Admin <span class="chevron">▶</span></summary>
                <div class="nav-children">
                    <a class="nav-child {{ request()->is('admin/acc-achievement') ? 'active' : '' }}" href="/admin/acc-achievement">Verifikasi Surat Skills</a>
                    <a class="nav-child {{ request()->is('admin/manage-classes') ? 'active' : '' }}" href="/admin/manage-classes">Kelola Kelas</a>
                </div>
            </details>
        @elseif(Auth::user()->role == 'kaprodi')
            <details class="nav-parent kaprodi" open>
                <summary><span class="nav-icon">🎓</span> Menu Kaprodi <span class="chevron">▶</span></summary>
                <div class="nav-children">
                    <a class="nav-child {{ request()->is('kaprodi/acc-pengajuan') ? 'active' : '' }}" href="/kaprodi/acc-pengajuan">ACC Pengajuan</a>
                </div>
            </details>
        @else
            <details class="nav-parent layanan">
                <summary><span class="nav-icon">📚</span> Layanan Tutor <span class="chevron">▶</span></summary>
                <div class="nav-children">
                    <a class="nav-child nav-info" href="/informasi-kelas">Informasi Kelas</a>
                    <a class="nav-child nav-daftar" href="/pendaftaran-kelas">Pendaftaran Kelas</a>
                    <a class="nav-child nav-daftar" href="/aktivitas-peserta">Aktivitas Peserta</a>
                </div>
            </details>
            <details class="nav-parent pengajuan" open>
                <summary><span class="nav-icon">✍️</span> Pengajuan Tutor <span class="chevron">▶</span></summary>
                <div class="nav-children">
                    <a class="nav-child nav-pengajuan" href="/pengajuan-tutor">Halaman Pengajuan</a>
                    <a class="nav-child nav-status" href="/status-pengajuan">Status Pengajuan</a>
                    <a class="nav-child nav-jadwal" href="/jadwal-tutor">Jadwal Tutor</a>
                    <a class="nav-child nav-list" href="/list-pendaftar">List Pendaftar</a>
                    <a class="nav-child nav-achievement" href="/achievement">Achievement</a>
                </div>
            </details>
            <div class="nav-separator"></div>
            <a class="nav-item nav-template {{ request()->is('surat-rekomendasi*') ? 'active' : '' }}" href="/surat-rekomendasi"><span class="nav-icon">📄</span> Surat Rekomendasi</a>
        @endif

        <div class="nav-separator"></div>
        <a class="nav-item nav-notif {{ request()->is('notifikasi*') ? 'active' : '' }}" href="/notifikasi">
            <span class="nav-icon">🔔</span> Notifikasi
            @php
                $unreadCount = Auth::user()->notifications()->where('is_read', false)->count();
            @endphp
            @if($unreadCount > 0)
                <span class="notif-badge">{{ $unreadCount }}</span>
            @endif
        </a>
    </nav>
    <div class="sidebar-footer">
        @auth
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{ Auth::user()->role }}</div>
            </div>
        </div>
        <form action="/logout" method="POST" style="margin-top: 10px;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
        @endauth
    </div>
</aside>

<style>
    .btn-logout {
        width: 100%;
        margin-top: 8px;
        padding: 8px;
        border-radius: 8px;
        border: 1px solid rgba(255,255,255,0.1);
        background: rgba(239,68,68,0.1);
        color: #f87171;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
    }
    .btn-logout:hover {
        background: rgba(239,68,68,0.2);
    }
</style>