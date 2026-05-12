<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Pengajuan Tutor</title>
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
      display: flex; flex-direction: column; gap: 2px;
      overflow-y: auto;
    }

    /* Top-level nav item */
    .nav-item {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 14px; border-radius: 9px;
      font-size: 13.5px; font-weight: 500; color: #94a3b8;
      text-decoration: none; transition: all 0.2s; cursor: pointer;
    }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }

    /* Collapsible parent — using <details> for native toggle */
    .nav-parent { margin: 4px 0 2px; }

    .nav-parent > summary {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 14px; border-radius: 9px;
      font-size: 13.5px; font-weight: 500; color: #94a3b8;
      cursor: pointer; transition: all 0.2s; user-select: none;
      list-style: none;
    }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary::marker { content: ''; }
    .nav-parent > summary:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent > summary .chevron {
      margin-left: auto; font-size: 11px; color: #475569;
      transition: transform 0.25s ease;
    }
    /* Chevron rotates when details is open — native behavior */
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }

    /* Children */
    .nav-children {
      padding: 4px 0 6px 0;
      display: flex; flex-direction: column; gap: 1px;
    }

    .nav-child {
      display: flex; align-items: center; gap: 10px;
      padding: 8px 14px 8px 46px; border-radius: 8px;
      font-size: 13px; font-weight: 500; color: #64748b;
      text-decoration: none; transition: all 0.2s; cursor: pointer;
      position: relative;
    }
    .nav-child::before {
      content: ''; position: absolute;
      left: 30px; top: 50%; transform: translateY(-50%);
      width: 5px; height: 5px; border-radius: 50%;
      background: #334155; transition: all 0.2s;
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
       CSS ROUTING — page visibility only
       sidebar open/close handled by <details> natively
       ================================================================ */
    .page-wrapper { display: none; flex-direction: column; min-height: 100vh; }
    #page-pengajuan { display: flex; }  /* default */
    .page-wrapper:target { display: flex !important; }
    body:has(.page-wrapper:target) #page-pengajuan { display: none; }


    /* ================================================================
       ACTIVE HIGHLIGHT — only controls dot/color, NOT open/close
       ================================================================ */

    /* Default: nav-pengajuan aktif */
    .nav-pengajuan {
      color: #fff !important;
      background: rgba(59,130,246,0.15) !important;
      font-weight: 600 !important;
    }
    .nav-pengajuan::before {
      background: #3b82f6 !important;
      box-shadow: 0 0 6px rgba(59,130,246,0.5) !important;
      width: 6px !important; height: 6px !important;
    }

    /* Reset semua highlight saat ada target */
    body:has(.page-wrapper:target) .nav-child {
      color: #64748b !important;
      background: transparent !important;
      font-weight: 500 !important;
    }
    body:has(.page-wrapper:target) .nav-child::before {
      background: #334155 !important;
      box-shadow: none !important;
      width: 5px !important; height: 5px !important;
    }

    /* Standalone pages */
    body:has(#page-home:target) .nav-home,
    body:has(#page-template:target) .nav-template {
      background: linear-gradient(135deg, #3b82f6, #2563eb) !important;
      color: #fff !important;
      box-shadow: 0 3px 12px rgba(59,130,246,0.3) !important;
      font-weight: 600 !important;
    }

    /* Layanan children */
    body:has(#page-info:target) .nav-info,
    body:has(#page-daftar:target) .nav-daftar {
      color: #fff !important;
      background: rgba(59,130,246,0.15) !important;
      font-weight: 600 !important;
    }
    body:has(#page-info:target) .nav-info::before,
    body:has(#page-daftar:target) .nav-daftar::before {
      background: #3b82f6 !important;
      box-shadow: 0 0 6px rgba(59,130,246,0.5) !important;
      width: 6px !important; height: 6px !important;
    }

    /* Pengajuan children */
    body:has(#page-pengajuan:target) .nav-pengajuan,
    body:has(#page-status:target) .nav-status,
    body:has(#page-jadwal:target) .nav-jadwal,
    body:has(#page-list:target) .nav-list,
    body:has(#page-achievement:target) .nav-achievement {
      color: #fff !important;
      background: rgba(59,130,246,0.15) !important;
      font-weight: 600 !important;
    }
    body:has(#page-pengajuan:target) .nav-pengajuan::before,
    body:has(#page-status:target) .nav-status::before,
    body:has(#page-jadwal:target) .nav-jadwal::before,
    body:has(#page-list:target) .nav-list::before,
    body:has(#page-achievement:target) .nav-achievement::before {
      background: #3b82f6 !important;
      box-shadow: 0 0 6px rgba(59,130,246,0.5) !important;
      width: 6px !important; height: 6px !important;
    }


    /* ================================================================
       MAIN
       ================================================================ */
    .main-content { margin-left: 270px; flex: 1; min-height: 100vh; display: flex; flex-direction: column; }

    .topbar {
      background: #fff; padding: 16px 32px;
      display: flex; align-items: center; justify-content: space-between;
      border-bottom: 1px solid #e2e8f0;
      position: sticky; top: 0; z-index: 50;
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
       FORM STYLES
       ================================================================ */
    .page-content-center { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 32px; }

    .form-card {
      width: 100%; max-width: 580px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 50%, #2563eb 100%);
      border-radius: 20px; padding: 40px 38px 36px;
      position: relative; overflow: hidden;
      box-shadow: 0 20px 60px rgba(30,64,175,0.25), 0 4px 20px rgba(0,0,0,0.08);
    }
    .form-card::before { content: ''; position: absolute; top: -80px; right: -60px; width: 220px; height: 220px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .form-card::after { content: ''; position: absolute; bottom: -50px; left: -40px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .form-inner { position: relative; z-index: 2; }

    .form-header { text-align: center; margin-bottom: 32px; }
    .form-header .form-icon {
      width: 56px; height: 56px;
      background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15);
      border-radius: 16px; display: flex; align-items: center; justify-content: center;
      margin: 0 auto 16px; font-size: 26px;
    }
    .form-header h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .form-header p { font-size: 13px; color: rgba(255,255,255,0.6); line-height: 1.5; }

    .form-group { margin-bottom: 20px; }
    .form-group:last-of-type { margin-bottom: 28px; }

    .form-label {
      display: flex; align-items: center; gap: 6px;
      font-size: 12px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.06em;
      color: rgba(255,255,255,0.7); margin-bottom: 8px;
    }
    .form-label .label-icon { font-size: 14px; opacity: 0.8; }

    .required-badge {
      display: inline-flex; align-items: center; justify-content: center;
      width: 17px; height: 17px; border-radius: 5px;
      background: #ef4444; color: #fff;
      font-size: 10px; font-weight: 800;
      margin-left: 2px; flex-shrink: 0; line-height: 1;
    }

    .form-input, .form-select, .form-textarea {
      width: 100%; padding: 13px 16px; border-radius: 12px;
      border: 1.5px solid rgba(255,255,255,0.15);
      background: rgba(255,255,255,0.08); backdrop-filter: blur(4px);
      font-size: 14px; font-family: 'Inter', sans-serif; color: #fff;
      transition: all 0.25s ease; outline: none;
    }
    .form-input::placeholder, .form-textarea::placeholder { color: rgba(255,255,255,0.35); }
    .form-input:hover, .form-select:hover, .form-textarea:hover { border-color: rgba(255,255,255,0.3); background: rgba(255,255,255,0.1); }
    .form-input:focus, .form-select:focus, .form-textarea:focus { border-color: rgba(255,255,255,0.5); background: rgba(255,255,255,0.12); box-shadow: 0 0 0 3px rgba(255,255,255,0.08); }
    .form-input[type="number"]::-webkit-outer-spin-button,
    .form-input[type="number"]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    .form-input[type="number"] { -moz-appearance: textfield; }
    .form-select {
      cursor: pointer; -webkit-appearance: none; -moz-appearance: none; appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.5)' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat; background-position: right 16px center; padding-right: 42px;
    }
    .form-select option { background: #1e293b; color: #fff; }
    .form-textarea { resize: vertical; min-height: 120px; line-height: 1.6; }

    .input-wrapper { position: relative; }
    .input-wrapper .input-icon {
      position: absolute; left: 16px; top: 50%; transform: translateY(-50%);
      font-size: 16px; color: rgba(255,255,255,0.4); pointer-events: none; transition: color 0.2s;
    }
    .input-wrapper .form-input { padding-left: 44px; }
    .input-wrapper .form-input:focus ~ .input-icon,
    .input-wrapper .form-input:hover ~ .input-icon { color: rgba(255,255,255,0.65); }

    .form-helper { font-size: 11px; color: rgba(255,255,255,0.4); margin-top: 5px; padding-left: 2px; }

    .upload-zone {
      position: relative;
      border: 2px dashed rgba(255,255,255,0.2);
      border-radius: 14px; padding: 28px 20px;
      text-align: center; transition: all 0.25s ease;
      cursor: pointer; background: rgba(255,255,255,0.03);
    }
    .upload-zone:hover { border-color: rgba(255,255,255,0.4); background: rgba(255,255,255,0.06); }
    .upload-zone input[type="file"] {
      position: absolute; inset: 0; opacity: 0;
      cursor: pointer; width: 100%; height: 100%; z-index: 2;
    }
    .upload-zone-content { position: relative; z-index: 1; pointer-events: none; }
    .upload-icon-circle {
      width: 52px; height: 52px; border-radius: 50%;
      background: rgba(255,255,255,0.1); border: 1.5px solid rgba(255,255,255,0.15);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 14px; font-size: 22px;
    }
    .upload-text-main { font-size: 13.5px; font-weight: 600; color: rgba(255,255,255,0.8); margin-bottom: 4px; }
    .upload-text-main span { color: #93c5fd; text-decoration: underline; text-underline-offset: 2px; }
    .upload-text-sub { font-size: 11.5px; color: rgba(255,255,255,0.35); line-height: 1.5; }
    .upload-accepted {
      display: inline-flex; align-items: center; gap: 4px;
      margin-top: 10px; padding: 3px 10px; border-radius: 6px;
      background: rgba(255,255,255,0.06);
      font-size: 10.5px; font-weight: 600; color: rgba(255,255,255,0.4);
    }

    .btn-submit {
      width: 100%; padding: 15px 24px; border-radius: 13px; border: none;
      background: #fff; color: #1e40af; font-size: 15px; font-weight: 800;
      font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.3s ease;
      letter-spacing: 0.02em; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      display: flex; align-items: center; justify-content: center; gap: 8px;
      text-decoration: none;
    }
    .btn-submit:hover { background: #f0f9ff; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
    .btn-submit:active { transform: translateY(0); box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .btn-submit .btn-arrow { font-size: 16px; transition: transform 0.2s; }
    .btn-submit:hover .btn-arrow { transform: translateX(3px); }

    .btn-status {
      width: 100%; padding: 13px 20px; border-radius: 12px;
      border: 1.5px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.06);
      color: rgba(255,255,255,0.85); font-size: 13.5px; font-weight: 600;
      font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.25s ease;
      display: flex; align-items: center; justify-content: center; gap: 8px;
      text-decoration: none; backdrop-filter: blur(4px);
    }
    .btn-status:hover { border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.1); color: #fff; }
    .btn-status .status-icon { font-size: 16px; display: flex; align-items: center; }
    .btn-status .status-arrow { font-size: 13px; color: rgba(255,255,255,0.4); transition: transform 0.2s; }
    .btn-status:hover .status-arrow { transform: translateX(3px); color: rgba(255,255,255,0.7); }

    .form-divider { height: 1px; background: rgba(255,255,255,0.1); margin: 24px 0; }
    .form-footer-note { text-align: center; margin-top: 20px; font-size: 11.5px; color: rgba(255,255,255,0.4); line-height: 1.6; }
    .form-footer-note a { color: rgba(255,255,255,0.7); text-decoration: underline; text-underline-offset: 2px; }
    .form-footer-note a:hover { color: #fff; }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .topbar { padding: 12px 16px; }
      .page-content-center { padding: 24px 16px; }
      .form-card { padding: 28px 22px 24px; border-radius: 16px; }
      .form-header h1 { font-size: 19px; }
      .upload-zone { padding: 22px 16px; }
    }
  </style>
</head>
<body>

  <!-- ==================== SIDEBAR ==================== -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">E</div>
      <div>
        <div class="brand-text">E-Tutor</div>
        <div class="brand-sub">Sistem Tutoring</div>
      </div>
    </div>
    <nav class="sidebar-nav">

      <a class="nav-item nav-home" href="#page-home">
        <span class="nav-icon">🏠</span> Home
      </a>

      <div class="nav-separator"></div>

      <!-- Layanan Tutor — default TUTUP -->
      <details class="nav-parent layanan">
        <summary>
          <span class="nav-icon">📚</span> Layanan Tutor
          <span class="chevron">▶</span>
        </summary>
        <div class="nav-children">
          <a class="nav-child nav-info" href="/informasi-kelas">Informasi Kelas</a>
          <a class="nav-child nav-daftar" href="/pendaftaran-kelas">Pendaftaran Kelas</a>
        </div>
      </details>

      <!-- Pengajuan Tutor — default TERBUKA -->
      <details class="nav-parent pengajuan" open>
        <summary>
          <span class="nav-icon">✍️</span> Pengajuan Tutor
          <span class="chevron">▶</span>
        </summary>
        <div class="nav-children">
          <a class="nav-child nav-pengajuan" href="/pengajuan-tutor">Halaman Pengajuan</a>
          <a class="nav-child nav-status" href="/status-pengajuan">Status Pengajuan</a>
          <a class="nav-child nav-jadwal" href="/jadwal-tutor">Jadwal Tutor</a>
          <a class="nav-child nav-list" href="/list-pendaftar">List Pendaftar</a>
          <a class="nav-child nav-achievement" href="#page-achievement">Achievement</a>
        </div>
      </details>

      <div class="nav-separator"></div>

      <a class="nav-item nav-template" href="#page-template">
        <span class="nav-icon">📄</span> Template
      </a>
      <a class="nav-item nav-notif" href="/notifikasi">
        <span class="nav-icon">🔔</span> Notifikasi
        <span class="notif-badge">4</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <div class="user-card">
        <div class="user-avatar">AP</div>
        <div class="user-info">
          <div class="user-name">R.A Hikmah</div>
          <div class="user-role">Mahasiswa - MI</div>
        </div>
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
    <div class="page-wrapper" id="page-status">
      <div class="topbar"><div class="topbar-left"><div class="breadcrumb"><a href="#page-home">Home</a><span class="sep">/</span><span>Pengajuan Tutor</span><span class="sep">/</span><span>Status Pengajuan</span></div></div><div class="topbar-right"><button class="topbar-btn">🔔 <span class="notif-dot"></span></button><button class="topbar-btn">❓</button></div></div>
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
         ✅ HALAMAN PENGAJUAN TUTOR
         ==================================================================== -->
    <div class="page-wrapper" id="page-pengajuan">
      <div class="topbar">
        <div class="topbar-left">
          <div class="breadcrumb">
            <a href="#page-home">Home</a>
            <span class="sep">/</span>
            <span>Pengajuan Tutor</span>
            <span class="sep">/</span>
            <span>Halaman Pengajuan</span>
          </div>
        </div>
        <div class="topbar-right">
          <button class="topbar-btn">🔔 <span class="notif-dot"></span></button>
          <button class="topbar-btn">❓</button>
        </div>
      </div>

      <div class="page-content-center">
        <div class="form-card">
          <div class="form-inner">

            <div class="form-header">
              <div class="form-icon">✍️</div>
              <h1>Halaman Pengajuan Tutor</h1>
              <p>Ajukan diri Anda sebagai E-Tutor kepada Kaprodi. Pengajuan akan diverifikasi sebelum Anda dapat membuka kelas.</p>
            </div>

            <form action="#" method="post" enctype="multipart/form-data">

              <!-- NAMA -->
              <div class="form-group">
                <label class="form-label" for="aj-nama">
                  <span class="label-icon">👤</span> NAMA
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <input class="form-input" type="text" id="aj-nama" name="nama" placeholder="Masukkan nama lengkap" required autocomplete="name">
                  <span class="input-icon">✏️</span>
                </div>
              </div>

              <!-- NIM -->
              <div class="form-group">
                <label class="form-label" for="aj-nim">
                  <span class="label-icon">🔢</span> NIM
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <input class="form-input" type="number" id="aj-nim" name="nim" placeholder="Masukkan NIM (angka)" required min="0" inputmode="numeric">
                  <span class="input-icon">🔑</span>
                </div>
                <div class="form-helper">Hanya angka yang diperbolehkan</div>
              </div>

              <!-- TOPIK PEMBAHASAN -->
              <div class="form-group">
                <label class="form-label" for="aj-topik">
                  <span class="label-icon">📖</span> TOPIK PEMBAHASAN
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <input class="form-input" type="text" id="aj-topik" name="topik" placeholder="Contoh: Algoritma & Struktur Data" required>
                  <span class="input-icon">📚</span>
                </div>
                <div class="form-helper">Topik yang akan Anda ajarkan sebagai E-Tutor</div>
              </div>

              <!-- BUKTI MEMENUHI -->
              <div class="form-group">
                <label class="form-label">
                  <span class="label-icon">📎</span> BUKTI MEMENUHI
                  <span class="required-badge">R</span>
                </label>
                <div class="upload-zone">
                  <input type="file" name="bukti" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" required>
                  <div class="upload-zone-content">
                    <div class="upload-icon-circle">📎</div>
                    <div class="upload-text-main">
                      <span>Klik untuk upload</span> atau drag file ke sini
                    </div>
                    <div class="upload-text-sub">
                      Unggah bukti bahwa Anda memenuhi syarat sebagai E-Tutor
                    </div>
                    <div class="upload-accepted">
                      📁 PDF, JPG, PNG, DOC — Maks. 5MB
                    </div>
                  </div>
                </div>
                <div class="form-helper">File akan divalidasi dan diverifikasi oleh Kaprodi</div>
              </div>

              <!-- DESKRIPSI JOB -->
              <div class="form-group">
                <label class="form-label" for="aj-deskripsi">
                  <span class="label-icon">📝</span> DESKRIPSI JOB
                  <span class="required-badge">R</span>
                </label>
                <textarea class="form-textarea" id="aj-deskripsi" name="deskripsi" placeholder="Jelaskan rencana mengajar Anda, pengalaman, metode yang akan digunakan, dan alasan mengapa Anda layak menjadi E-Tutor..." required></textarea>
                <div class="form-helper">Deskripsikan secara detail rencana dan kompetensi Anda</div>
              </div>

              <div class="form-divider"></div>

              <!-- LIHAT STATUS PENGAJUAN -->
              <div class="form-group">
                <a href="#page-status" class="btn-status">
                  <span class="status-icon">🔍</span>
                  Lihat Status Pengajuan
                  <span class="status-arrow">→</span>
                </a>
              </div>

              <!-- AJUKAN -->
              <button type="submit" class="btn-submit">
                AJUKAN
                <span class="btn-arrow">→</span>
              </button>

            </form>

            <div class="form-footer-note">
              Pengajuan akan dikirim kepada Kaprodi untuk diverifikasi.<br>
              Pastikan semua data dan bukti yang diisi sudah benar.
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>