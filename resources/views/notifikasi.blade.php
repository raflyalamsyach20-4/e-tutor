<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi — E-Tutor</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f2f5;
      color: #1e293b;
      min-height: 100vh;
    }

    .layout { display: flex; min-height: 100vh; }

    /* ================================================================
       SIDEBAR
       ================================================================ */
    .sidebar {
      width: 270px; min-height: 100vh;
      background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
      color: #fff; position: fixed; top: 0; left: 0; z-index: 100;
      display: flex; flex-direction: column;
      border-right: 1px solid rgba(255,255,255,0.06);
    }
    .sidebar-brand { padding: 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 12px; }
    .sidebar-brand .brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 11px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 17px; color: #fff; }
    .sidebar-brand .brand-text { font-weight: 700; font-size: 17px; letter-spacing: -0.02em; }
    .sidebar-brand .brand-sub { font-size: 11px; color: #64748b; margin-top: 1px; }
    .sidebar-nav { flex: 1; padding: 12px 10px; display: flex; flex-direction: column; gap: 2px; overflow-y: auto; }
    .nav-item { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; text-decoration: none; transition: all 0.2s; cursor: pointer; }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-item.active { background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: #fff !important; box-shadow: 0 3px 12px rgba(59,130,246,0.3); font-weight: 600; }
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent { margin: 4px 0 2px; }
    .nav-parent > summary { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; cursor: pointer; transition: all 0.2s; user-select: none; list-style: none; }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent > summary .chevron { margin-left: auto; font-size: 11px; color: #475569; transition: transform 0.25s ease; }
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }
    .nav-children { padding: 4px 0 6px 0; display: flex; flex-direction: column; gap: 1px; }
    .nav-child { display: flex; align-items: center; gap: 10px; padding: 8px 14px 8px 46px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #64748b; text-decoration: none; transition: all 0.2s; cursor: pointer; position: relative; }
    .nav-child::before { content: ''; position: absolute; left: 30px; top: 50%; transform: translateY(-50%); width: 5px; height: 5px; border-radius: 50%; background: #334155; transition: all 0.2s; }
    .nav-child:hover { color: #cbd5e1; background: rgba(255,255,255,0.04); }
    .nav-child:hover::before { background: #64748b; }
    .nav-child.active { color: #fff; background: rgba(59,130,246,0.15); font-weight: 600; }
    .nav-child.active::before { background: #3b82f6; box-shadow: 0 0 6px rgba(59,130,246,0.5); width: 6px; height: 6px; }
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }
    .btn-logout { width: 100%; margin-top: 8px; padding: 8px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(239,68,68,0.1); color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif; }
    .btn-logout:hover { background: rgba(239,68,68,0.2); }

    /* ================================================================
       MAIN CONTENT
       ================================================================ */
    .main-content {
      margin-left: 270px; flex: 1; min-height: 100vh;
      display: flex; flex-direction: column; background-color: #f0f2f5;
    }
    .topbar {
      background: #fff; padding: 14px 32px;
      display: flex; align-items: center; justify-content: space-between;
      border-bottom: 1px solid #e2e8f0;
      position: sticky; top: 0; z-index: 50;
    }
    .topbar-right { display: flex; align-items: center; gap: 10px; }
    .topbar-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #64748b; font-size: 16px; transition: all 0.2s; position: relative; }
    .notif-dot { position: absolute; top: 7px; right: 7px; width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; }

    /* ================================================================
       PAGE HEADER
       ================================================================ */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px; position: relative; overflow: hidden;
    }
    .page-header::before { content: ''; position: absolute; top: -60%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .page-header-inner { position: relative; z-index: 2; display: flex; align-items: flex-start; justify-content: space-between; }
    .page-header-text h1 { font-size: 26px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .page-header-text p { font-size: 14px; color: rgba(255,255,255,0.7); max-width: 540px; line-height: 1.6; }

    /* ================================================================
       NOTIFICATIONS
       ================================================================ */
    .content-section { padding: 28px 32px 40px; flex: 1; }
    .notif-card {
      background: #fff; border-radius: 18px; border: 1px solid #e2e8f0;
      overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }
    .notif-header {
      padding: 18px 24px; border-bottom: 1px solid #f1f5f9;
      display: flex; align-items: center; justify-content: space-between;
      background: #fcfdfe;
    }
    .notif-header-title { font-size: 15px; font-weight: 700; color: #1e293b; }
    .btn-mark-all {
      font-size: 12px; font-weight: 600; color: #3b82f6;
      background: none; border: none; cursor: pointer;
    }
    .btn-mark-all:hover { text-decoration: underline; }

    .notif-list { display: flex; flex-direction: column; }
    .notif-item {
      padding: 20px 24px; display: flex; gap: 16px;
      border-bottom: 1px solid #f1f5f9; transition: all 0.2s;
      text-decoration: none; color: inherit; position: relative;
    }
    .notif-item:last-child { border-bottom: none; }
    .notif-item:hover { background: #f8fafc; }
    .notif-item.unread { background: #eff6ff; }
    .notif-item.unread::before {
      content: ''; position: absolute; left: 0; top: 0; bottom: 0;
      width: 4px; background: #3b82f6;
    }

    .notif-icon-wrap {
      width: 44px; height: 44px; border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 20px; flex-shrink: 0;
    }
    .notif-icon-wrap.class_reminder { background: #dcfce7; color: #16a34a; }
    .notif-icon-wrap.info { background: #eff6ff; color: #3b82f6; }

    .notif-content { flex: 1; }
    .notif-title { font-size: 14px; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
    .notif-message { font-size: 13.5px; color: #64748b; line-height: 1.5; margin-bottom: 8px; }
    .notif-time { font-size: 11px; color: #94a3b8; font-weight: 500; }

    .notif-empty {
      padding: 60px 20px; text-align: center; color: #94a3b8;
    }
    .notif-empty-icon { font-size: 48px; margin-bottom: 16px; opacity: 0.5; }

    .pagination-wrap { padding: 20px 24px; border-top: 1px solid #f1f5f9; }
  </style>
</head>
<body>
<x-sidebar />

<main class="main-content">
  <div class="topbar">
    <div></div>
    <div class="topbar-right">
      <a href="{{ route('notifications.index') }}" class="topbar-btn">
        🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
      </a>
    </div>
  </div>

  <div class="page-header">
    <div class="page-header-inner">
      <div class="page-header-text">
        <h1>Pusat Notifikasi</h1>
        <p>Kelola dan lihat semua pemberitahuan sistem Anda di sini.</p>
      </div>
    </div>
  </div>

  <div class="content-section">
    @if(session('success'))
      <div style="background: #dcfce7; color: #16a34a; padding: 14px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; font-weight: 600;">
        {{ session('success') }}
      </div>
    @endif

    <div class="notif-card">
      <div class="notif-header">
        <div class="notif-header-title">Semua Notifikasi</div>
        <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
          @csrf
          <button type="submit" class="btn-mark-all">Tandai semua dibaca</button>
        </form>
      </div>

      <div class="notif-list">
        @forelse($notifications as $notif)
          <a href="#" class="notif-item {{ $notif->is_read ? '' : 'unread' }}" onclick="markAsRead(event, {{ $notif->id }})">
            <div class="notif-icon-wrap {{ $notif->type }}">
              {{ $notif->type == 'class_reminder' ? '⏰' : '📢' }}
            </div>
            <div class="notif-content">
              <div class="notif-title">{{ $notif->title }}</div>
              <div class="notif-message">{{ $notif->message }}</div>
              <div class="notif-time">{{ $notif->created_at->diffForHumans() }}</div>
            </div>
          </a>
        @empty
          <div class="notif-empty">
            <div class="notif-empty-icon">📭</div>
            <div>Belum ada notifikasi untuk Anda.</div>
          </div>
        @endforelse
      </div>

      @if($notifications->hasPages())
        <div class="pagination-wrap">
          {{ $notifications->links() }}
        </div>
      @endif
    </div>
  </div>
</main>

<script>
  function markAsRead(e, id) {
    // If it's already read, don't do anything special
    const item = e.currentTarget;
    if (!item.classList.contains('unread')) return;

    fetch(`/notifikasi/${id}/mark-as-read`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    }).then(response => {
      if (response.ok) {
        item.classList.remove('unread');
      }
    });
  }
</script>
</body>
</html>
