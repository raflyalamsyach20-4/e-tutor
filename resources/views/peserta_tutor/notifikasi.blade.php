<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Notifikasi</title>
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
      padding: 10px 14px; border-radius:  9px;
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

    /* Notifikasi badge di sidebar */
    .nav-item .notif-badge {
      margin-left: auto;
      background: #ef4444; color: #fff;
      font-size: 10px; font-weight: 700;
      padding: 2px 7px; border-radius: 20px;
      line-height: 1.4;
    }

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
    #page-notif { display: flex; }
    .page-wrapper:target { display: flex !important; }
    body:has(.page-wrapper:target) #page-notif { display: none; }

    .nav-notif { color: #fff !important; background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: #fff !important; box-shadow: 0 3px 12px rgba(59,130,246,0.3) !important; font-weight: 600 !important; }

    body:has(.page-wrapper:target) .nav-item { background: transparent !important; color: #94a3b8 !important; font-weight: 500 !important; box-shadow: none !important; }
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
       NOTIFIKASI PAGE
       ================================================================ */
    .notif-page { flex: 1; padding: 28px 32px 40px; }

    .notif-header-card {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      border-radius: 16px;
      padding: 28px 28px 24px;
      position: relative; overflow: hidden;
      margin-bottom: 24px;
    }
    .notif-header-card::before {
      content: '';
      position: absolute; top: -40px; right: -30px;
      width: 180px; height: 180px;
      background: radial-gradient(circle, rgba(255,255,255,0.07) 0%, transparent 70%);
      border-radius: 50%;
    }
    .notif-header-inner { position: relative; z-index: 2; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
    .notif-header-text h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; }
    .notif-header-text p { font-size: 13px; color: rgba(255,255,255,0.55); margin-top: 3px; }

    .notif-header-stats { display: flex; gap: 12px; }
    .notif-header-stat {
      background: rgba(255,255,255,0.12); backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 12px; padding: 12px 18px; text-align: center;
    }
    .notif-header-stat .nhs-num { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
    .notif-header-stat .nhs-label { font-size: 10.5px; color: rgba(255,255,255,0.55); margin-top: 4px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
    .nhs-total .nhs-num { color: #fff; }
    .nhs-today .nhs-num { color: #fbbf24; }
    .nhs-read .nhs-num { color: rgba(255,255,255,0.4); }
    .nhs-unread .nhs-num { color: #fff; }


    /* Notification list */
    .notif-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    /* Single notification card */
    .notif-card {
      background: #fff;
      border-radius: 14px;
      border: 1px solid #e8ecf2;
      display: flex;
      align-items: flex-start;
      gap: 16px;
      padding: 18px 20px;
      transition: all 0.2s ease;
      position: relative;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }
    .notif-card:hover {
      border-color: #c8d5e4;
      box-shadow: 0 4px 12px rgba(0,0,0,0.06);
      transform: translateY(-1px);
    }

    /* Unread indicator bar */
    .notif-card.unread {
      border-left: 4px solid #3b82f6;
    }
    .notif-card.read {
      border-left: 4px solid #e8ecf2;
      opacity: 0.7;
    }
    .notif-card.read:hover { opacity: 1; }

    /* Bell icon */
    .notif-bell {
      width: 44px; height: 44px;
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }
    .notif-bell.unread-bell {
      background: linear-gradient(135deg, #eff6ff, #dbeafe);
      color: #2563eb;
    }
    .notif-bell.read-bell {
      background: #f8fafc;
      color: #94a3b8;
    }

    /* Content area */
    .notif-content { flex: 1; min-width: 0; }

    .notif-remember {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 3px 10px; border-radius: 6px;
      font-size: 10.5px; font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 6px;
    }
    .notif-remember.remember-urgent {
      background: #fef2f2;
      color: #dc2626;
    }
    .notify-remember.remember-normal {
      background: #fef9c3;
      color: #a16207;
    }
    .notify-remember.remember-info {
      background: #e0e7ff;
      color: #4f46e5;
    }
    .notify-remember.remember-success {
      background: #dcfce7;
      color: #16a34a;
    }

    .notif-title {
      font-size: 14px;
      font-weight: 600;
      color: #1e293b;
      line-height: 1.5;
      margin-bottom: 6px;
    }

    .notif-desc {
      font-size: 13px;
      color: #64748b;
      line-height: 1.5;
    }

    /* Right side: date & actions */
    .notif-meta {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 8px;
      flex-shrink: 0;
    }

    .notif-time {
      font-size: 12px;
      color: #94a3b8;
      font-weight: 500;
      white-space: nowrap;
    }

    .notif-date {
      font-size: 12px;
      color: #64748b;
      font-weight: 600;
      white-space: nowrap;
      background: #f0f4ff;
      padding: 4px 10px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .notif-date .date-icon { font-size: 13px; }

    /* Unread dot */
    .notif-unread-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #3b82f6;
      flex-shrink: 0;
      box-shadow: 0 0 6px rgba(59,130,246,0.4);
    }

    /* Section label */
    .notif-section-label {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 0 0 8px 0;
      margin-bottom: 16px;
    }
    .notif-section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e2e8f0;
    }
    .notif-section-text {
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: #94a3b8;
      white-space: nowrap;
    }

    /* Empty notification state */
    .notif-empty {
      background: #fff;
      border-radius: 14px;
      border: 1px solid #e8ecf2;
      padding: 60px 20px;
      text-align: center;
      display: none;
    }
    .notif-empty-show { display: block; }
    .notif-empty-icon { font-size: 44px; margin-bottom: 12px; opacity: 0.3; }
    .notif-empty h3 { font-size: 16px; font-weight: 700; color: #94a3b8; margin-bottom: 6px; }
    .notif-empty p { font-size: 13px; color: #cbd5e7; }

    /* Footer */
    .notif-footer {
      text-align: center;
      padding: 16px 0 0;
      font-size: 11.5px;
      color: #94a3b8;
    }
    .notif-footer strong { color: #64748b; }
    .notif-footer a { color: #3b82f6; text-decoration: none; font-weight: 600; }
    .notif-footer a:hover { text-decoration: underline; }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .topbar { padding: 12px 16px; }
      .notif-page { padding: 20px 16px 32px; }
      .notif-header-card { padding: 22px 20px 18px; border-radius: 12px; }
      .notif-header-text h1 { font-size: 19px; }
      .notif-header-stats { flex-direction: column; gap: 8px; }
      .notif-header-stat { padding: 10px 14px; }
      .notif-card { padding: 14px 16px; gap: 12px; }
      .notif-bell { width: 40px; height: 40px; font-size: 18px; border-radius: 10px; }
      .notif-meta { flex-direction: row; align-items: center; }
      .notif-unread-dot { display: none; }
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
    <div class="page-wrapper" id="page-list">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>List Pendaftar</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
      <div class="empty-state"><div class="empty-icon-wrap">📋</div><h2>List Pendaftar</h2><p>Halaman ini sedang dalam pengembangan.</p><div class="empty-badge">🔧 Segera Hadir</div></div>
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
         ✅ HALAMAN NOTIFIKASI — DEFAULT PAGE
         ==================================================================== -->
    <div class="page-wrapper" id="page-notif">
      <div class="topbar">
        <div class="topbar-left">
          <div class="breadcrumb">
            <a href="#page-home">Home</a>
            <span class="sep">/</span>
            <span>Notifikasi</span>
          </div>
        </div>
        <div class="topbar-right">
          <button class="topbar-btn">🔔 <span class="notif-dot"></span></button>
        </div>
      </div>

      <div class="notif-page">

        <!-- Header Card -->
        <div class="notif-header-card">
          <div class="notif-header-inner">
            <div class="notif-header-text">
              <h1>Notifikasi</h1>
              <p>Pengingatkan jadwal kelas yang akan dimulai. Notifikasi muncul 1 jam sebelum kelas dimulai.</p>
            </div>
            <div class="notif-header-stats">
              <div class="notif-header-stat nhs-total">
                <div class="nhs-num">4</div>
                <div class="nhs-label">Total</div>
              </div>
              <div class="notif-header-stat nhs-unread">
                <div class="nhs-num">4</div>
                <div class="nhs-label">Belum Dibaca</div>
              </div>
              <div class="notif-header-stat nhs-read">
                <div class="nhs-num">0</div>
                <div class="nhs-label">Sudah Dibaca</div>
              </div>
              <div class="notif-header-stat nhs-today">
                <div class="nhs-num">2</div>
                <div class="hs-label">Hari Ini</div>
              </div>
            </div>
        </div>

        <!-- Section: Hari Ini -->
        <div class="notif-section-label">
          <span class="notif-section-text">⚡ Hari Ini</span>
        </div>

        <div class="notif-list">

          <!-- Notif 1 — Urgent, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-urgent">⚡ Pengingatkan</div>
              <div class="notif-title">Kelas Statistika akan dimulai dalam 1 jam</div>
              <div class="notif-desc">Topik: Distribusi Normal dan Aplikasinya — Tutor: Udin Saputra — Dimulai pukul 08:00</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 14 Januari 2026
              </div>
            </div>
          </div>

          <!-- Notif 2 — Urgent, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-urgent">⚡ Pengingatkan</div>
              <div class="notif-title">Kelas Pemrograman Web akan dimulai dalam 1 jam</div>
              <div class="notif-desc">Topik: CRUD dengan PHP & MySQL — Tutor: Siti Aminah — Dimulai pukul 13:00</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 14 Januari 2026
              </div>
            </div>
          </div>

        </div>

        <!-- Section: Besok -->
        <div class="notif-section-label">
          <span class="notif-section-text">📅 Besok</span>
        </div>

        <div class="notif-list">

          <!-- Notif 3 — Normal, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-normal">⏰ Pengingatkan</div>
              <div class="notif-title">Jadwal mengajar Anda besok pukul 08:00</div>
              <div class="notif-desc">Topik: Normalisasi Database (1NF - 3NF) — Peserta: 8 orang — Dimulai pukul 10:00</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 15 Januari 2026
              </div>
            </div>
          </div>

          <!-- Notif 4 — Info, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-info">ℹ️ Informasi</div>
              <div class="notif-title">Peserta baru mendaftar pada kelas Anda</div>
              <div class="notif-desc">Rina Safitri mendaftar pada kelas Statistika — Total peserta kini 6 dari 20 kuota</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 15 Januari 2026
              </div>
            </div>
          </div>

        </div>

        <!-- Section: Mendatang -->
        <div class="notif-section-label">
          <span class="notif-section-text">📅 Mendatang</span>
        </div>

        <div class="notif-list">

          <!-- Notif 5 — Normal, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-normal">⏰ Pengingatkan</div>
              <div class="notif-title">Kelas Matematika Diskrit akan dimulai dalam 1 jam</div>
              <div class="notif-desc">Topik: Teori Graf & Pohon (Tree) — Tutor: Rizky Firmansyah — Dimulai pukul 09:00</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 16 Januari 2026
              </div>
            </div>
          </div>

          <!-- Notif 6 — Success, unread -->
          <div class="notif-card unread">
            <div class="notif-bell unread-bell">🔔</div>
            <div class="notif-content">
              <div class="notify-remember remember-success">✅ Berhasil</div>
              <div class="notif-title">Jadwal berhasil dibuat</div>
              <div class="notif-desc">Kelas Algoritma Pembelajaran Mesin telah dipublikasikan ke Informasi Kelas</div>
            </div>
            <div class="notif-meta">
              <div class="notif-unread-dot"></div>
              <div class="notif-date">
                <span class="date-icon">📅</span> 16 Januari 2026
              </div>
            </div>
          </div>

        </div>

        <!-- Empty state (hidden by default, shown when no unread) -->
        <div class="notif-empty">
          <div class="notif-empty-icon">🔔</div>
          <h3>Tidak ada notifikasi</h3>
          <p>Semua notifikasi sudah dibaca.</p>
        </div>

        <div class="notif-footer">
          Notifikasi otomatis muncul <strong>1 jam sebelum</strong> kelas dimulai.
        </div>

      </div>
    </div>

  </div>
</body>
</html>