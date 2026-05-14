<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width=1.0">
  <title>E-Tutor - Status Pengajuan</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f2f5;
      color: #1e293b;
      min-height: 100vh;
      display: flex;
      overflow-x: hidden;
    }

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
    .sidebar-brand {
      padding: 22px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      display: flex; align-items: center; gap: 12px;
    }
    .sidebar-brand .brand-icon {
      width: 40px; height: 40px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 11px;
      display: flex; align-items: center; justify-content: center;
      font-weight: 800; font-size: 17px; color: #fff;
    }
    .sidebar-brand .brand-text { font-weight: 700; font-size: 17px; letter-spacing: -0.02em; }
    .sidebar-brand .brand-sub { font-size: 11px; color: #64748b; margin-top: 1px; }
    .sidebar-nav {
      flex: 1; padding: 12px 10px;
      display: flex; flex-direction: column; gap: 2px; overflow-y: auto;
    }
    .nav-item {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 14px; border-radius: 9px;
      font-size: 13.5px; font-weight: 500; color: #94a3b8;
      text-decoration: none; transition: all 0.2s; cursor: pointer;
    }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent { margin: 4px 0 2px; }
    .nav-parent > summary {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 14px; border-radius: 9px;
      font-size: 13.5px; font-weight: 500; color: #94a3b8;
      cursor: pointer; transition: all 0.2s; user-select: none; list-style: none;
    }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary::marker { content: ''; }
    .nav-parent > summary:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent > summary .chevron { margin-left: auto; font-size: 11px; color: #475569; transition: transform 0.25s ease; }
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }
    .nav-children { padding: 4px 0 6px 0; display: flex; flex-direction: column; gap: 1px; }
    .nav-child {
      display: flex; align-items: center; gap: 10px;
      padding: 8px 14px 8px 46px; border-radius: 8px;
      font-size: 13px; font-weight: 500; color: #64748b;
      text-decoration: none; transition: all 0.2s; cursor: pointer; position: relative;
    }
    .nav-child::before {
      content: ''; position: absolute; left: 30px; top: 50%; transform: translateY(-50%);
      width: 5px; height: 5px; border-radius: 50%; background: #334155; transition: all 0.2s;
    }
    .nav-child:hover { color: #cbd5e1; background: rgba(255,255,255,0.04); }
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }


    /* ================================================================
       CSS ROUTING
       ================================================================ */
    .page-wrapper { display: none; flex-direction: column; min-height: 100vh; }
    #page-status { display: flex; }
    .page-wrapper:target { display: flex !important; }
    body:has(.page-wrapper:target) #page-status { display: none; }

    .nav-status { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    .nav-status::before { background: #3b82f6 !important; box-shadow: 0 0 6px rgba(59,130,246,0.5) !important; width: 6px !important; height: 6px !important; }

    body:has(.page-wrapper:target) .nav-item { background: transparent !important; color: #94a3b8 !important; font-weight: 500 !important; box-shadow: none !important; }
    body:has(.page-wrapper:target) .nav-child { color: #64748b !important; background: transparent !important; font-weight: 500 !important; }
    body:has(.page-wrapper:target) .nav-child::before { background: #334155 !important; box-shadow: none !important; width: 5px !important; height: 5px !important; }
    body:has(.page-wrapper:target) .nav-parent > summary { color: #94a3b8 !important; }
    body:has(.page-wrapper:target) .nav-parent > summary .chevron { transform: rotate(0deg) !important; }
    body:has(.page-wrapper:target) .nav-parent .nav-children { display: none !important; }

    body:has(#page-home:target) .nav-home,
    body:has(#page-template:target) .nav-template { background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: #fff !important; box-shadow: 0 3px 12px rgba(59,130,246,0.3) !important; font-weight: 600 !important; }

    body:has(#page-info:target) .nav-info,
    body:has(#page-daftar:target) .nav-daftar { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    body:has(#page-info:target) .nav-info::before,
    body:has(#page-daftar:target) .nav-daftar::before { background: #3b82f6 !important; box-shadow: 0 0 6px rgba(59,130,246,0.5) !important; width: 6px !important; height: 6px !important; }

    body:has(#page-pengajuan:target) .nav-pengajuan,
    body:has(#page-status:target) .nav-status,
    body:has(#page-jadwal:target) .nav-jadwal,
    body:has(#page-list:target) .nav-list,
    body:has(#page-achievement:target) .nav-achievement { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    body:has(#page-pengajuan:target) .nav-pengajuan::before,
    body:has(#page-status:target) .nav-status::before,
    body:has(#page-jadwal:target) .nav-jadwal::before,
    body:has(#page-list:target) .nav-list::before,
    body:has(#page-achievement:target) .nav-achievement::before { background: #3b82f6 !important; box-shadow: 0 0 6px rgba(59,130,246,0.5) !important; width: 6px !important; height: 6px !important; }


    /* ================================================================
       MAIN
       ================================================================ */
    .main-content { margin-left: 270px; flex: 1; min-height: 100vh; display: flex; flex-direction: column; }
    .topbar {
      background: #fff; padding: 16px 32px;
      display: flex; align-items: center; justify-content: space-between;
      border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 50;
    }
    .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; }
    .breadcrumb a { color: #3b82f6; text-decoration: none; font-weight: 500; }
    .breadcrumb a:hover { text-decoration: underline; }
    .breadcrumb .sep { color: #cbd5e1; }
    .topbar-right { display: flex; align-items: center; gap: 12px; }
    .topbar-btn {
      width: 38px; height: 38px; border-radius: 10px;
      border: 1px solid #e2e8f0; background: #fff;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; color: #64748b; font-size: 18px;
      transition: all 0.2s; position: relative;
    }
    .topbar-btn:hover { background: #f8fafc; color: #1e293b; border-color: #cbd5e1; }
    .topbar-btn .notif-dot { position: absolute; top: 8px; right: 8px; width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; }


    /* ================================================================
       EMPTY STATE
       ================================================================ */
    .empty-state {
      flex: 1; display: flex; flex-direction: column;
      align-items: center; justify-content: center; padding: 40px 32px;
    }
    .empty-icon-wrap {
      width: 100px; height: 100px; border-radius: 28px;
      background: linear-gradient(135deg, #f0f4ff, #e8eeff);
      border: 1px solid #dce4f8;
      display: flex; align-items: center; justify-content: center;
      font-size: 44px; margin-bottom: 24px;
    }
    .empty-state h2 { font-size: 22px; font-weight: 800; color: #1e293b; letter-spacing: -0.02em; margin-bottom: 8px; }
    .empty-state p { font-size: 14px; color: #94a3b8; font-weight: 500; max-width: 340px; text-align: center; line-height: 1.6; }
    .empty-badge { margin-top: 20px; display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 20px; background: #fef9c3; color: #a16207; font-size: 12px; font-weight: 600; }


    /* ================================================================
       STATUS PAGE — Blue Card
       ================================================================ */
    .status-page { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 32px; }

    .status-card {
      width: 100%; max-width: 960px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 45%, #2563eb 100%);
      border-radius: 20px; padding: 40px 36px 32px;
      position: relative; overflow: hidden;
      box-shadow: 0 20px 60px rgba(30,64,175,0.25), 0 4px 20px rgba(0,0,0,0.08);
    }
    .status-card::before { content: ''; position: absolute; top: -80px; right: -60px; width: 240px; height: 240px; background: radial-gradient(circle, rgba(255,255,255,0.07) 0%, transparent 70%); border-radius: 50%; }
    .status-card::after { content: ''; position: absolute; bottom: -50px; left: -40px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .status-inner { position: relative; z-index: 2; }

    .status-header {
      text-align: center; margin-bottom: 28px;
    }
    .status-header .status-icon {
      width: 52px; height: 52px;
      background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px; display: flex; align-items: center; justify-content: center;
      margin: 0 auto 14px; font-size: 24px;
    }
    .status-header h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 5px; }
    .status-header p { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.5; }

    /* Stats */
    .status-stats {
      display: flex; gap: 14px; margin-bottom: 24px;
    }
    .status-stat {
      flex: 1; padding: 14px 16px;
      background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px; text-align: center;
    }
    .status-stat .ss-num { font-size: 22px; font-weight: 800; line-height: 1; }
    .status-stat .ss-label {
      font-size: 10.5px; color: rgba(255,255,255,0.45); margin-top: 4px;
      font-weight: 600; text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .ss-total .ss-num { color: #fff; }
    .ss-menunggu .ss-num { color: #fbbf24; }
    .ss-disetujui .ss-num { color: #4ade80; }
    .ss-ditolak .ss-num { color: #f87171; }

    /* Table */
    .status-table-wrap {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 14px; overflow: hidden;
    }
    .status-table-scroll { overflow-x: auto; }
    .status-table {
      width: 100%; border-collapse: collapse; min-width: 880px;
    }
    .status-table thead {
      background: rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .status-table thead th {
      padding: 13px 18px; font-size: 11px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.07em;
      color: rgba(255,255,255,0.5); text-align: left; white-space: nowrap;
    }
    .status-table tbody tr {
      border-bottom: 1px solid rgba(255,255,255,0.06);
      transition: background 0.15s;
    }
    .status-table tbody tr:last-child { border-bottom: none; }
    .status-table tbody tr:hover { background: rgba(255,255,255,0.04); }
    .status-table tbody td {
      padding: 14px 18px; font-size: 13.5px; color: rgba(255,255,255,0.85); vertical-align: middle;
    }

    /* Column widths */
    .st-no { color: rgba(255,255,255,0.4); font-weight: 600; text-align: center; width: 50px; }
    .st-nama { font-weight: 600; color: #fff; font-size: 13.5px; white-space: nowrap; }
    .st-nim {
      font-weight: 500; color: rgba(255,255,255,0.7);
      font-family: 'Courier New', monospace;
      font-size: 13px;
      letter-spacing: 0.03em;
    }
    .st-topik {
      font-weight: 600; color: #fff; font-size: 13.5px;
      line-height: 1.4;
      max-width: 180px;
    }

    /* Topik tag */
    .st-topik-tag {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 3px 9px;
      border-radius: 6px;
      font-size: 10.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 5px;
    }
    .st-topik-tag.tag-stat { background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.5); }
    .tag-info { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.45); }
    .tag-math { background: rgba(251,191,36,0.1); color: rgba(251,191,36,0.7); }
    .tag-prog { background: rgba(59,130,246,0.12); color: rgba(255,255,255,0.85); }
    .tag-db { background: rgba(168,85,247,0.1); color: rgba(168,85,247,0.7); }
    .tag-ml { background: rgba(239,68,68,0.1); color: rgba(239,68,68,0.7); }
    .tag-ai { background: rgba(249,115,22,0.1); color: rgba(249,115,22,0.7); }
    .tag-net { background: rgba(20,184,166,0.1); color: rgba(20,184,166,0.7); }

    /* Deskripsi column */
    .st-desc {
      font-size: 12.5px;
      color: rgba(255,255,255,0.6);
      line-height: 1.5;
      max-width: 200px;
    }

    /* Bukti — file button */
    .st-bukti-cell {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .st-bukti-link {
      display: display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 7px 14px;
      border-radius: 9px;
      border: 1px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.06);
      color: rgba(255,255,255,0.75);
      font-size: 12px; font-weight: 600;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.2s;
      text-decoration: none;
      white-space: nowrap;
    }
    .st-bukti-link:hover {
      background: rgba(255,255,255,0.12);
      border-color: rgba(255,255,255,0.35);
      color: #fff;
    }
    .st-bukti-icon { font-size: 15px; display: flex; align-items: center; }

    /* Status badges */
    .status-badge {
      display: display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 5px 13px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 700;
      white-space: nowrap;
    }
    .status-badge.menunggu {
      background: rgba(251,191,36,0.15);
      color: #fbbf24;
      border: 1px solid rgba(251,191,36,0.2);
    }
    .status-badge.menunggu .sb-dot { background: #fbbf24; }

    .status-badge.disetujui {
      background: rgba(74,222,128,0.15);
      color: #4ade80;
      border: 1px solid rgba(74,222,128,0.2);
    }
    .status-badge.disetujui .sb-dot { background: #4ade80; }

    .status-badge.ditolak {
      background: rgba(248,113,113,0.15);
      color: #f87171;
      border: 1px solid rgba(248,113,113,0.2);
    }
    .status-badge.ditolak .sb-dot { background: #f87171; }

    .sb-dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    /* Footer */
    .status-footer {
      margin-top: 20px;
      text-align: center;
      font-size: 11.5px;
      color: rgba(255,255,255,0.35);
      line-height: 1.6;
    }
    .status-footer a { color: rgba(255,255,255,0.6); text-decoration: underline; text-underline-offset: 2px; }
    .status-footer a:hover { color: #fff; }
    .status-footer strong { color: rgba(255,255,255,0.55); }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .topbar { padding: 12px 16px; }
      .status-page { padding: 24px 16px 32px; }
      .status-card { padding: 28px 20px 22px; border-radius: 16px; }
      .status-header h1 { font-size: 19px; }
      .status-stats { flex-direction: column; gap: 8px; }
      .status-table { min-width: 700px; }
      .st-topik { max-width: 140px; }
      .st-desc { max-width: 150px; }
    }
  </style>
</head>
<body>

<x-sidebar />
  <!-- ==================== MAIN ==================== -->
  <div class="main-content">

    <!-- Placeholder pages -->
    <div class="page-wrapper" id="page-home">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><span>Home</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">🏠</div><h2>Home</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-achievement">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Achievement</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">🏆</div><h2>Achievement</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-template">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Template</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">📄</div><h2>Template</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>


    <!-- ====================================================================
         ✅ HALAMAN STATUS PENGAJUAN — DEFAULT PAGE
         ==================================================================== -->
    <div class="page-wrapper" id="page-status">
      <div class="topbar">
        <div class="topbar-left">
          <div class="breadcrumb">
            <a href="#page-home">Home</a>
            <span class="sep">/</span>
            <span>Pengajuan Tutor</span>
            <span class="sep">/</span>
            <span>Status Pengajuan</span>
          </div>
        </div>
        <div class="topbar-right">
          <a href="{{ route('notifications.index') }}" class="topbar-btn">
            🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
          </a>
        </div>
      </div>

      <div class="status-page">

        <!-- Header -->
        <div class="status-card">
          <div class="status-inner">

            <div class="status-header">
              <div class="status-icon">📋</div>
              <div class="status-header-text">
                <h1>Status Pengajuan</h1>
                <p>Lihat status pengajuan Anda — apakah sudah disetujui atau belum oleh Kaprodi.</p>
              </div>
            </div>

            <!-- Stats -->
            <div class="status-stats">
              <div class="status-stat ss-total">
                <div class="ss-num">{{ $stats['total'] }}</div>
                <div class="ss-label">Total Pengajuan</div>
              </div>
              <div class="status-stat ss-menunggu">
                <div class="ss-num">{{ $stats['pending'] }}</div>
                <div class="ss-label">Menunggu</div>
              </div>
              <div class="status-stat ss-disetujui">
                <div class="ss-num">{{ $stats['approved'] }}</div>
                <div class="ss-label">Disetujui</div>
              </div>
              <div class="status-stat ss-ditolak">
                <div class="ss-num">{{ $stats['rejected'] }}</div>
                <div class="ss-label">Ditolak</div>
              </div>
            </div>

            <!-- Table -->
            <div class="status-table-wrap">
              <div class="status-table-scroll">
                <table class="status-table">
                  <thead>
                    <th class="st-no">No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Topik Pembahasan</th>
                    <th>Deskripsi</th>
                    <th>Bukti</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                    @forelse($applications as $index => $app)
                    <tr>
                      <td class="st-no">{{ $index + 1 }}</td>
                      <td class="st-nama">{{ $app->nama }}</td>
                      <td class="st-nim">{{ $app->nim }}</td>
                      <td>
                        <div class="st-topik">
                          {{ $app->topik_pembahasan }}
                        </div>
                      </td>
                      <td class="st-desc">{{ $app->deskripsi_job }}</td>
                      <td>
                        <div class="st-bukti-cell">
                          <a class="st-bukti-link" href="{{ Storage::url($app->bukti_memenuhi) }}" target="_blank">
                            <span class="st-bukti-icon">📄</span> Lihat
                          </a>
                        </div>
                      </td>
                      <td>
                        @if($app->status === 'pending')
                        <span class="status-badge menunggu"><span class="sb-dot"></span> Menunggu Persetujuan</span>
                        @elseif($app->status === 'approved')
                        <span class="status-badge disetujui"><span class="sb-dot"></span> Disetujui</span>
                        @else
                        <span class="status-badge ditolak"><span class="sb-dot"></span> Ditolak</span>
                        @endif
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" style="text-align: center; padding: 40px; color: rgba(255,255,255,0.5);">
                        <div style="font-size: 24px; margin-bottom: 10px;">📭</div>
                        Anda belum mengajukan pendaftaran tutor.
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            <div class="status-footer">
              Status <strong style="color: #4ade80;">Disetujui</strong> berarti pengajuan Anda sudah diterima oleh Kaprodi dan Anda bisa mulai mengajar.
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>