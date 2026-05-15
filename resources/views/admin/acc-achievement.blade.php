<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Surat Skills — E-Tutor</title>
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
    .header-stats { display: flex; gap: 14px; }
    .header-stat { background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.15); border-radius: 14px; padding: 14px 20px; text-align: center; min-width: 105px; }
    .header-stat .stat-num { font-size: 24px; font-weight: 800; color: #fff; line-height: 1; }
    .header-stat .stat-label { font-size: 11px; color: rgba(255,255,255,0.65); margin-top: 4px; font-weight: 500; }

    /* ================================================================
       TABLE SECTION
       ================================================================ */
    .table-section { padding: 28px 32px 40px; flex: 1; }
    .table-wrapper { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.04); }
    .table-scroll { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
    thead th { padding: 14px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #64748b; text-align: left; }
    tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
    tbody td { padding: 16px; font-size: 13px; color: #334155; vertical-align: top; }

    .status-badge { display: inline-flex; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; }
    .status-pending { background: #fef9c3; color: #a16207; }
    .status-approved { background: #dcfce7; color: #16a34a; }
    .status-rejected { background: #fee2e2; color: #dc2626; }

    .btn-action {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 6px 12px; border-radius: 8px; border: 1px solid #e2e8f0;
      background: #fff; font-size: 11px; font-weight: 700; cursor: pointer;
      text-decoration: none; transition: all 0.2s;
    }
    .btn-action.approve { color: #16a34a; }
    .btn-action.approve:hover { background: #dcfce7; border-color: #bbf7d0; }
    .btn-action.reject { color: #dc2626; }
    .btn-action.reject:hover { background: #fee2e2; border-color: #fecaca; }
    .btn-action.preview { color: #2563eb; }
    .btn-action.preview:hover { background: #eff6ff; border-color: #bfdbfe; }

    /* ================================================================
       PDF MODAL
       ================================================================ */
    .modal-overlay {
      position: fixed; inset: 0; z-index: 200;
      background: rgba(15,23,42,0.6); backdrop-filter: blur(4px);
      display: none; align-items: center; justify-content: center; padding: 24px;
    }
    .modal-overlay.show { display: flex; }
    .modal-content {
      background: #fff; border-radius: 20px; width: 100%; max-width: 850px; max-height: 90vh;
      display: flex; flex-direction: column; overflow: hidden;
    }
    .modal-header { padding: 18px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; }
    .modal-title { font-size: 16px; font-weight: 700; }
    .modal-body { flex: 1; overflow: auto; background: #f1f5f9; position: relative; }
    .modal-close { cursor: pointer; font-size: 20px; color: #94a3b8; }

    iframe { width: 100%; height: 600px; border: none; }
    img { max-width: 100%; display: block; margin: 0 auto; }

    /* Search & Filter Styles */
    .table-toolbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; gap: 12px; flex-wrap: wrap; }
    .table-toolbar-left { display: flex; align-items: center; gap: 10px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 9px 14px; min-width: 260px; transition: all 0.2s; }
    .search-box:focus-within { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .search-box .search-icon { color: #94a3b8; font-size: 16px; flex-shrink: 0; }
    .search-box input { border: none; outline: none; font-size: 13px; font-family: 'Inter', sans-serif; color: #1e293b; background: transparent; width: 100%; }
    .search-box input::placeholder { color: #94a3b8; }
    .filter-btn { display: flex; align-items: center; gap: 6px; padding: 9px 16px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; font-size: 13px; font-weight: 500; color: #475569; cursor: pointer; font-family: 'Inter', sans-serif; transition: all 0.2s; text-decoration: none; }
    .filter-btn:hover { background: #f8fafc; border-color: #cbd5e1; }
    .filter-btn.active { background: #eff6ff; border-color: #bfdbfe; color: #2563eb; }
    .filter-btn .filter-icon { font-size: 16px; color: #94a3b8; }
  </style>
</head>

<body>
<div class="layout">
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
          <h1>Verifikasi Achievement Tutor</h1>
          <p>Verifikasi pengajuan bukti mengajar untuk penerbitan Surat Skills.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat"><div class="stat-num">{{ $achievements->count() }}</div><div class="stat-label">Total</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#fde047">{{ $achievements->where('status', 'pending')->count() }}</div><div class="stat-label">Pending</div></div>
        </div>
      </div>
    </div>

    <div class="table-section">
      @if(session('success'))
        <div style="background: #dcfce7; color: #16a34a; padding: 14px; border-radius: 12px; margin-bottom: 20px;">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-toolbar">
        <div class="table-toolbar-left">
          <form action="{{ route('admin.acc-achievement') }}" method="GET" class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" name="search" placeholder="Cari tutor atau topik..." value="{{ $search }}">
          </form>
          <a href="{{ route('admin.acc-achievement', ['status' => 'all', 'search' => $search]) }}" class="filter-btn {{ !$status || $status === 'all' ? 'active' : '' }}"><span class="filter-icon">🔽</span> Semua</a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'pending', 'search' => $search]) }}" class="filter-btn {{ $status === 'pending' ? 'active' : '' }}"><span class="filter-icon">⏳</span> Pending</a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'approved', 'search' => $search]) }}" class="filter-btn {{ $status === 'approved' ? 'active' : '' }}"><span class="filter-icon">✅</span> Approved</a>
          <a href="{{ route('admin.acc-achievement', ['status' => 'rejected', 'search' => $search]) }}" class="filter-btn {{ $status === 'rejected' ? 'active' : '' }}"><span class="filter-icon">❌</span> Rejected</a>
        </div>
      </div>

      <div class="table-wrapper">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Tutor</th>
                <th>Topik</th>
                <th>Bukti</th>
                <th>Surat Skills</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($achievements as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    <div style="font-weight: 600;">{{ $item->user->name }}</div>
                    <div style="font-size: 11px; color: #94a3b8;">NIM: {{ $item->user->pengajuanTutor->nim ?? '-' }}</div>
                  </td>
                  <td>{{ $item->topic }}</td>
                  <td>
                    <button class="btn-action preview" onclick="openModal('Bukti: {{ $item->topic }}', '{{ asset('storage/'.$item->teaching_proof) }}')">
                      👁️ Preview
                    </button>
                  </td>
                  <td>
                    <button class="btn-action preview" onclick="openModal('Draft Surat Skills', '{{ route('admin.acc-achievement.preview', $item->id) }}', true)">
                      📄 Preview
                    </button>
                  </td>
                  <td>
                    <span class="status-badge status-{{ $item->status }}">
                      {{ ucfirst($item->status) }}
                    </span>
                  </td>
                  <td>
                    @if($item->status == 'pending')
                      <div style="display: flex; gap: 8px;">
                        <form action="{{ route('admin.acc-achievement.approve', $item->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn-action approve">✓ Setujui</button>
                        </form>
                        <form action="{{ route('admin.acc-achievement.reject', $item->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn-action reject">✗ Tolak</button>
                        </form>
                      </div>
                    @else
                      <span style="color: #94a3b8; font-size: 11px;">Sudah diproses</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" style="text-align: center; padding: 40px; color: #94a3b8;">Tidak ada pengajuan permohonan.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>

<!-- Modal Preview -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title" id="modalTitle">Preview</div>
      <div class="modal-close" onclick="closeModal()">✕</div>
    </div>
    <div class="modal-body" id="modalBody">
      <!-- Content will be injected here -->
    </div>
  </div>
</div>

<script>
  function openModal(title, url, isPdf = false) {
    document.getElementById('modalTitle').textContent = title;
    const body = document.getElementById('modalBody');
    
    const extension = url.split('.').pop().toLowerCase();
    
    if (isPdf || extension === 'pdf') {
      body.innerHTML = `<iframe src="${url}"></iframe>`;
    } else {
      body.innerHTML = `<img src="${url}" alt="Preview">`;
    }
    
    document.getElementById('modalOverlay').classList.add('show');
  }

  function closeModal() {
    document.getElementById('modalOverlay').classList.remove('show');
    document.getElementById('modalBody').innerHTML = '';
  }
</script>
</body>
</html>