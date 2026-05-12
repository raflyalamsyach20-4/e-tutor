<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - List Pendaftar</title>
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
    .nav-child:hover::before { background: #64748b; }
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
    #page-list { display: flex; }
    .page-wrapper:target { display: flex !important; }
    body:has(.page-wrapper:target) #page-list { display: none; }

    .nav-list { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    .nav-list::before { background: #3b82f6 !important; box-shadow: 0 0 6px rgba(59,130,246,0.5) !important; width: 6px !important; height: 6px !important; }

    body:has(.page-wrapper:target) .nav-child { color: #64748b !important; background: transparent !important; font-weight: 500 !important; }
    body:has(.page-wrapper:target) .nav-child::before { background: #334155 !important; box-shadow: none !important; width: 5px !important; height: 5px !important; }

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
    .empty-state { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 40px 32px; }
    .empty-icon-wrap { width: 100px; height: 100px; border-radius: 28px; background: linear-gradient(135deg, #f0f4ff, #e8eeff); border: 1px solid #dce4f8; display: flex; align-items: center; justify-content: center; font-size: 44px; margin-bottom: 24px; }
    .empty-state h2 { font-size: 22px; font-weight: 800; color: #1e293b; letter-spacing: -0.02em; margin-bottom: 8px; }
    .empty-state p { font-size: 14px; color: #94a3b8; font-weight: 500; max-width: 340px; text-align: center; line-height: 1.6; }
    .empty-badge { margin-top: 20px; display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 20px; background: #fef9c3; color: #a16207; font-size: 12px; font-weight: 600; }


    /* ================================================================
       LIST PENDAFTAR PAGE
       ================================================================ */
    .list-page { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 32px; }

    .list-card {
      width: 100%; max-width: 880px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 45%, #2563eb 100%);
      border-radius: 20px; padding: 40px 36px 32px;
      position: relative; overflow: hidden;
      box-shadow: 0 20px 60px rgba(30,64,175,0.25), 0 4px 20px rgba(0,0,0,0.08);
    }
    .list-card::before { content: ''; position: absolute; top: -80px; right: -60px; width: 240px; height: 240px; background: radial-gradient(circle, rgba(255,255,255,0.07) 0%, transparent 70%); border-radius: 50%; }
    .list-card::after { content: ''; position: absolute; bottom: -50px; left: -40px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .list-inner { position: relative; z-index: 2; }

    .list-header { text-align: center; margin-bottom: 28px; }
    .list-header .list-icon {
      width: 52px; height: 52px;
      background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px; display: flex; align-items: center; justify-content: center;
      margin: 0 auto 14px; font-size: 24px;
    }
    .list-header h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 5px; }
    .list-header p { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.5; }


    /* ================================================================
       FILTER — CSS-only radio buttons
       ================================================================ */

    /* Hide real radio inputs */
    .filter-radio { position: absolute; opacity: 0; width: 0; height: 0; pointer-events: none; }

    .filter-bar {
      display: flex; align-items: center; gap: 8px;
      margin-bottom: 22px; flex-wrap: wrap;
    }

    .filter-label {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 8px 16px; border-radius: 9px;
      border: 1.5px solid rgba(255,255,255,0.12);
      background: rgba(255,255,255,0.05);
      font-size: 12.5px; font-weight: 600;
      color: rgba(255,255,255,0.55);
      cursor: pointer; transition: all 0.2s;
      user-select: none;
    }

    .filter-label .filter-dot {
      width: 7px; height: 7px; border-radius: 50%;
      flex-shrink: 0;
      background: rgba(255,255,255,0.2);
      transition: all 0.2s;
    }

    /* Active states per filter */
    #filter-all:checked ~ .filter-bar .label-all,
    .filter-label:has(~ .filter-radio#filter-all:checked) {
      border-color: rgba(255,255,255,0.3);
      background: rgba(255,255,255,0.12);
      color: #fff;
    }
    .filter-label:has(~ .filter-radio#filter-all:checked) .filter-dot { background: #fff; }

    #filter-disetujui:checked ~ .filter-bar .label-disetujui {
      border-color: rgba(74,222,128,0.4);
      background: rgba(74,222,128,0.15);
      color: #4ade80;
    }
    .filter-label:has(~ .filter-radio#filter-disetujui:checked) .filter-dot { background: #4ade80; }

    #filter-ditolak:checked ~ .filter-bar .label-ditolak {
      border-color: rgba(248,113,113,0.4);
      background: rgba(248,113,113,0.15);
      color: #f87171;
    }
    .filter-label:has(~ .filter-radio#filter-ditolak:checked) .filter-dot { background: #f87171; }

    #filter-menunggu:checked ~ .filter-bar .label-menunggu {
      border-color: rgba(251,191,36,0.4);
      background: rgba(251,191,36,0.15);
      color: #fbbf24;
    }
    .filter-label:has(~ .filter-radio#filter-menunggu:checked) .filter-dot { background: #fbbf24; }


    /* ================================================================
       CSS-ONLY FILTER LOGIC — show/hide rows
       ================================================================ */

    /* Default: show all rows */
    .list-table tbody tr { display: table-row; }

    /* Filter: Disetujui — hide non-matching */
    #filter-disetujui:checked ~ .list-table-wrap .row-ditolak,
    #filter-disetujui:checked ~ .list-table-wrap .row-menunggu {
      display: none;
    }

    /* Filter: Ditolak — hide non-matching */
    #filter-ditolak:checked ~ .list-table-wrap .row-disetujui,
    #filter-ditolak:checked ~ .list-table-wrap .row-menunggu {
      display: none;
    }

    /* Filter: Menunggu — hide non-matching */
    #filter-menunggu:checked ~ .list-table-wrap .row-disetujui,
    #filter-menunggu:checked ~ .list-table-wrap .row-ditolak {
      display: none;
    }

    /* "Semua" resets everything — already default, no rule needed */


    /* ================================================================
       STATS
       ================================================================ */
    .list-stats { display: flex; gap: 14px; margin-bottom: 24px; }
    .list-stat {
      flex: 1; padding: 14px 16px;
      background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px; text-align: center;
    }
    .list-stat .ls-num { font-size: 22px; font-weight: 800; line-height: 1; }
    .list-stat .ls-label { font-size: 10.5px; color: rgba(255,255,255,0.45); margin-top: 4px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
    .list-stat.total .ls-num { color: #fff; }
    .list-stat.approved .ls-num { color: #4ade80; }
    .list-stat.rejected .ls-num { color: #f87171; }
    .list-stat.pending .ls-num { color: #fbbf24; }


    /* ================================================================
       TABLE
       ================================================================ */
    .list-table-wrap {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 14px; overflow: hidden;
    }
    .list-table-scroll { overflow-x: auto; }
    .list-table { width: 100%; border-collapse: collapse; min-width: 620px; }
    .list-table thead {
      background: rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .list-table thead th {
      padding: 13px 18px; font-size: 11px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.07em;
      color: rgba(255,255,255,0.5); text-align: left; white-space: nowrap;
    }
    .list-table tbody tr {
      border-bottom: 1px solid rgba(255,255,255,0.06);
      transition: background 0.15s;
    }
    .list-table tbody tr:last-child { border-bottom: none; }
    .list-table tbody tr:hover { background: rgba(255,255,255,0.04); }
    .list-table tbody td {
      padding: 14px 18px; font-size: 13.5px; color: rgba(255,255,255,0.85); vertical-align: middle;
    }

    .lt-no { color: rgba(255,255,255,0.4); font-weight: 600; text-align: center; width: 45px; }
    .lt-name { font-weight: 600; color: #fff; font-size: 13.5px; }
    .lt-nim { font-weight: 500; color: rgba(255,255,255,0.7); font-family: 'Courier New', monospace; font-size: 13px; letter-spacing: 0.03em; }
    .lt-telp { font-weight: 500; color: rgba(255,255,255,0.7); }

    /* Status badges */
    .status-wrapper { position: relative; }
    .status-trigger {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 5px 12px; border-radius: 8px;
      font-size: 12px; font-weight: 700;
      cursor: pointer; list-style: none;
      transition: all 0.2s; border: 1px solid transparent;
    }
    .status-trigger::-webkit-details-marker { display: none; }
    .status-trigger::marker { content: ''; }
    .status-trigger.disetujui { background: rgba(74,222,128,0.15); color: #4ade80; border-color: rgba(74,222,128,0.2); }
    .status-trigger.ditolak { background: rgba(248,113,113,0.15); color: #f87171; border-color: rgba(248,113,113,0.2); }
    .status-trigger.menunggu { background: rgba(251,191,36,0.15); color: #fbbf24; border-color: rgba(251,191,36,0.2); }
    .status-trigger:hover { filter: brightness(1.2); }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; }
    .status-trigger.disetujui .status-dot { background: #4ade80; }
    .status-trigger.ditolak .status-dot { background: #f87171; }
    .status-trigger.menunggu .status-dot { background: #fbbf24; }
    .status-trigger .arrow { font-size: 10px; margin-left: 2px; transition: transform 0.2s; }
    .status-wrapper[open] > .status-trigger .arrow { transform: rotate(180deg); }

    .status-dropdown {
      position: absolute; top: calc(100% + 6px); right: 0;
      background: #1e293b; border: 1px solid rgba(255,255,255,0.15);
      border-radius: 12px; padding: 6px;
      min-width: 160px; z-index: 30;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
      animation: fadeUp 0.2s ease;
    }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
    .status-option {
      display: flex; align-items: center; gap: 8px;
      padding: 9px 12px; border-radius: 8px;
      font-size: 12.5px; font-weight: 600;
      cursor: pointer; transition: all 0.15s; text-decoration: none;
      color: #cbd5e1;
    }
    .status-option:hover { background: rgba(255,255,255,0.08); }
    .status-option.opt-setujui:hover { color: #4ade80; }
    .status-option.opt-tolak:hover { color: #f87171; }
    .status-option .opt-icon { font-size: 14px; display: flex; align-items: center; }

    /* Empty state inside table when all filtered out */
    .list-empty-row td {
      padding: 48px 20px !important;
    }

    .list-empty-content {
      text-align: center; width: 100%;
    }
    .list-empty-content .le-icon { font-size: 32px; margin-bottom: 10px; opacity: 0.3; }
    .list-empty-content p { font-size: 13px; color: rgba(255,255,255,0.35); font-weight: 500; }

    /* Footer */
    .list-footer {
      margin-top: 18px; text-align: center;
      font-size: 11.5px; color: rgba(255,255,255,0.35); line-height: 1.6;
    }
    .list-footer strong { color: rgba(255,255,255,0.55); }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .topbar { padding: 12px 16px; }
      .list-page { padding: 24px 16px; }
      .list-card { padding: 28px 20px 22px; border-radius: 16px; }
      .list-header h1 { font-size: 19px; }
      .list-stats { flex-direction: column; gap: 8px; }
      .filter-bar { gap: 6px; }
      .filter-label { padding: 7px 12px; font-size: 12px; }
    }
  </style>
</head>
<body>

  <!-- ==================== SIDEBAR ==================== -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">E</div>
      <div><div class="brand-text">E-Tutor</div><div class="brand-sub">Sistem Tutoring</div></div>
    </div>
    <nav class="sidebar-nav">
      <a class="nav-item nav-home" href="#page-home"><span class="nav-icon">🏠</span> Home</a>
      <div class="nav-separator"></div>
      <details class="nav-parent layanan">
        <summary><span class="nav-icon">📚</span> Layanan Tutor <span class="chevron">▶</span></summary>
        <div class="nav-children">
          <a class="nav-child nav-info" href="/informasi-kelas">Informasi Kelas</a>
          <a class="nav-child nav-daftar" href="/pendaftaran-kelas">Pendaftaran Kelas</a>
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
      <div class="user-card">
        <div class="user-avatar">AP</div>
        <div class="user-info"><div class="user-name">Ahmad Pratama</div><div class="user-role">Mahasiswa - MI</div></div>
      </div>
    </div>
  </aside>


  <!-- ==================== MAIN ==================== -->
  <div class="main-content">

    <!-- Placeholder pages -->
    <div class="page-wrapper" id="page-home">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><span>Home</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">🏠</div><h2>Home</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-info">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Informasi Kelas</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">📚</div><h2>Informasi Kelas</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-daftar">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Pendaftaran Kelas</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">📝</div><h2>Pendaftaran Kelas</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-pengajuan">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Pengajuan Tutor</span><span class="sep">/</span><span>Halaman Pengajuan</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">✍️</div><h2>Halaman Pengajuan</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-status">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Status Pengajuan</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">🔍</div><h2>Status Pengajuan</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
    </div>
    <div class="page-wrapper" id="page-jadwal">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Jadwal Tutor</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">📅</div><h2>Jadwal Tutor</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
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
         ✅ HALAMAN LIST PENDAFTAR
         ==================================================================== -->
    <div class="page-wrapper" id="page-list">
      <div class="topbar">
        <div class="topbar-left">
          <div class="breadcrumb">
            <a href="#page-home">Home</a>
            <span class="sep">/</span>
            <span>Pengajuan Tutor</span>
            <span class="sep">/</span>
            <span>List Pendaftar</span>
          </div>
        </div>
        <div class="topbar-right">
          <button class="topbar-btn">🔔 <span class="notif-dot"></span></button>
          <button class="topbar-btn">❓</button>
        </div>
      </div>

      <div class="list-page">
        <div class="list-card">
          <div class="list-inner">

            <!-- Hidden radio inputs — MUST be siblings of filter-bar and table-wrap -->
            <input type="radio" name="filter" id="filter-all" class="filter-radio" checked>
            <input type="radio" name="filter" id="filter-disetujui" class="filter-radio">
            <input type="radio" name="filter" id="filter-ditolak" class="filter-radio">
            <input type="radio" name="filter" id="filter-menunggu" class="filter-radio">

            <div class="list-header">
              <div class="list-icon">📋</div>
              <h1>Halaman List Pendaftar Peserta Tutor</h1>
              <p>Lihat siapa saja yang mendaftar pada kelas Anda. Atur status pendaftaran — setujui atau tolak peserta.</p>
            </div>

            <!-- Stats -->
            <div class="list-stats">
              <div class="list-stat total">
                <div class="ls-num">6</div>
                <div class="ls-label">Total Pendaftar</div>
              </div>
              <div class="list-stat approved">
                <div class="ls-num">3</div>
                <div class="ls-label">Disetujui</div>
              </div>
              <div class="list-stat rejected">
                <div class="ls-num">1</div>
                <div class="ls-label">Ditolak</div>
              </div>
              <div class="list-stat pending">
                <div class="ls-num">2</div>
                <div class="ls-label">Menunggu</div>
              </div>
            </div>

            <!-- FILTER BAR -->
            <div class="filter-bar">
              <label class="filter-label label-all" for="filter-all">
                <span class="filter-dot"></span> Semua
                <!-- hidden radio inside label so :has() works on the label -->
                <input type="radio" name="filter" value="all" checked style="position:absolute;opacity:0;width:0;height:0;pointer-events:none;">
              </label>
              <label class="filter-label label-disetujui" for="filter-disetujui">
                <span class="filter-dot"></span> Disetujui
                <input type="radio" name="filter" value="disetujui" style="position:absolute;opacity:0;width:0;height:0;pointer-events:none;">
              </label>
              <label class="filter-label label-ditolak" for="filter-ditolak">
                <span class="filter-dot"></span> Ditolak
                <input type="radio" name="filter" value="ditolak" style="position:absolute;opacity:0;width:0;height:0;pointer-events:none;">
              </label>
              <label class="filter-label label-menunggu" for="filter-menunggu">
                <span class="filter-dot"></span> Menunggu
                <input type="radio" name="filter" value="menunggu" style="position:absolute;opacity:0;width:0;height:0;pointer-events:none;">
              </label>
            </div>

            <!-- TABLE -->
            <div class="list-table-wrap">
              <div class="list-table-scroll">
                <table class="list-table">
                  <thead>
                    <tr>
                      <th class="lt-no">No</th>
                      <th>Nama</th>
                      <th>Nim</th>
                      <th>No Telepon</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- Row 1 — Disetujui -->
                    <tr class="row-disetujui">
                      <td class="lt-no">1</td>
                      <td><span class="lt-name">Rina Safitri</span></td>
                      <td><span class="lt-nim">2023010001</span></td>
                      <td><span class="lt-telp">081234567890</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger disetujui"><span class="status-dot"></span> Disetujui <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 2 — Disetujui -->
                    <tr class="row-disetujui">
                      <td class="lt-no">2</td>
                      <td><span class="lt-name">Budi Hartono</span></td>
                      <td><span class="lt-nim">2023020012</span></td>
                      <td><span class="lt-telp">085678901234</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger disetujui"><span class="status-dot"></span> Disetujui <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 3 — Ditolak -->
                    <tr class="row-ditolak">
                      <td class="lt-no">3</td>
                      <td><span class="lt-name">Dewi Anggraeni</span></td>
                      <td><span class="lt-nim">2023030023</span></td>
                      <td><span class="lt-telp">087812345678</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger ditolak"><span class="status-dot"></span> Ditolak <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 4 — Disetujui -->
                    <tr class="row-disetujui">
                      <td class="lt-no">4</td>
                      <td><span class="lt-name">Firman Maulana</span></td>
                      <td><span class="lt-nim">2023010045</span></td>
                      <td><span class="lt-telp">089678901234</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger disetujui"><span class="status-dot"></span> Disetujui <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 5 — Menunggu -->
                    <tr class="row-menunggu">
                      <td class="lt-no">5</td>
                      <td><span class="lt-name">Galih Prasetyo</span></td>
                      <td><span class="lt-nim">2023040067</span></td>
                      <td><span class="lt-telp">081345678901</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger menunggu"><span class="status-dot"></span> Menunggu <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 6 — Menunggu -->
                    <tr class="row-menunggu">
                      <td class="lt-no">6</td>
                      <td><span class="lt-name">Hana Permata</span></td>
                      <td><span class="lt-nim">2023020089</span></td>
                      <td><span class="lt-telp">082198765432</span></td>
                      <td>
                        <div class="status-wrapper">
                          <details>
                            <summary class="status-trigger menunggu"><span class="status-dot"></span> Menunggu <span class="arrow">▾</span></summary>
                            <div class="status-dropdown">
                              <a class="status-option opt-setujui" href="#"><span class="opt-icon">✅</span> Disetujui</a>
                              <a class="status-option opt-tolak" href="#"><span class="opt-icon">❌</span> Ditolak</a>
                            </div>
                          </details>
                        </div>
                      </td>
                    </tr>

                    <!-- Empty row — shown only when all filtered out (hidden by default) -->
                    <tr class="list-empty-row">
                      <td colspan="5">
                        <div class="list-empty-content">
                          <div class="le-icon">🔍</div>
                          <p>Tidak ada peserta dengan status ini.</p>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="list-footer">
              Klik pada status untuk mengubah — <strong>Disetujui</strong> atau <strong>Ditolak</strong> pendaftaran peserta.
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>