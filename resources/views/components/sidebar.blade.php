<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">E</div>
        <div>
            <div class="brand-text">E-Tutor</div>
            <div class="brand-sub">Sistem Tutoring</div>
        </div>
    </div>
    <nav class="sidebar-nav">
        
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
                <a class="nav-child nav-achievement" href="#page-achievement">Achievement</a>
            </div>
        </details>
        <div class="nav-separator"></div>
        <a class="nav-item nav-template" href="#page-template"><span class="nav-icon">📄</span> Template</a>
        <a class="nav-item nav-notif" href="/notifikasi">
            <span class="nav-icon">🔔</span> Notifikasi
            <span class="notif-badge">4</span>
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

        @guest
        <div class="user-card">
            <div class="user-avatar">?</div>
            <div class="user-info">
                <div class="user-name">Guest</div>
                <div class="user-role">Silakan login</div>
            </div>
        </div>
        <a href="/login" class="btn-login">Login</a>
        @endguest
    </div>
</aside>