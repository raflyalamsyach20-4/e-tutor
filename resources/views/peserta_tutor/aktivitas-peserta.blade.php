<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Pendaftaran — E-Tutor</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f2f5;
      color: #1e293b;
      min-height: 100vh;
    }

    /* ================================================================
       LAYOUT
       ================================================================ */
    .layout {
      display: flex;
      min-height: 100vh;
    }

    /* ================================================================
       SIDEBAR
       ================================================================ */
    .sidebar {
      width: 270px;
      min-height: 100vh;
      background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 100;
      display: flex;
      flex-direction: column;
      border-right: 1px solid rgba(255,255,255,0.06);
    }
    .sidebar-brand {
      padding: 22px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .sidebar-brand .brand-icon {
      width: 40px; height: 40px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 11px;
      display: flex; align-items: center; justify-content: center;
      font-weight: 800; font-size: 17px; color: #fff;
    }
    .sidebar-brand .brand-text {
      font-weight: 700; font-size: 17px; letter-spacing: -0.02em;
    }
    .sidebar-brand .brand-sub {
      font-size: 11px; color: #64748b; margin-top: 1px;
    }

    .sidebar-nav {
      flex: 1;
      padding: 12px 10px;
      display: flex;
      flex-direction: column;
      gap: 2px;
      overflow-y: auto;
    }
    .nav-item {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 10px 14px;
      border-radius: 9px;
      font-size: 13.5px;
      font-weight: 500;
      color: #94a3b8;
      text-decoration: none;
      transition: all 0.2s;
      cursor: pointer;
    }
    .nav-item:hover {
      background: rgba(255,255,255,0.06);
      color: #e2e8f0;
    }
    .nav-item .nav-icon {
      width: 20px; height: 20px;
      display: flex; align-items: center; justify-content: center;
      font-size: 17px; flex-shrink: 0;
    }

    .nav-separator {
      height: 1px;
      background: rgba(255,255,255,0.06);
      margin: 8px 14px;
    }

    /* Details/Summary sidebar dropdown */
    .nav-parent {
      margin: 4px 0 2px;
    }
    .nav-parent > summary {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 10px 14px;
      border-radius: 9px;
      font-size: 13.5px;
      font-weight: 500;
      color: #94a3b8;
      cursor: pointer;
      transition: all 0.2s;
      user-select: none;
      list-style: none;
    }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary::marker { content: ''; }
    .nav-parent > summary:hover {
      background: rgba(255,255,255,0.06);
      color: #e2e8f0;
    }
    .nav-parent > summary .nav-icon {
      width: 20px; height: 20px;
      display: flex; align-items: center; justify-content: center;
      font-size: 17px; flex-shrink: 0;
    }
    .nav-parent > summary .chevron {
      margin-left: auto;
      font-size: 11px;
      color: #475569;
      transition: transform 0.25s;
    }
    .nav-parent[open] > summary .chevron {
      transform: rotate(90deg);
    }
    .nav-parent[open] > summary {
      color: #cbd5e1;
    }

    .nav-children {
      display: flex;
      flex-direction: column;
      gap: 1px;
      padding: 4px 0 6px 0;
    }
    .nav-child {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 14px 8px 46px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      color: #64748b;
      text-decoration: none;
      transition: all 0.2s;
      cursor: pointer;
      position: relative;
    }
    .nav-child::before {
      content: '';
      position: absolute;
      left: 30px; top: 50%; transform: translateY(-50%);
      width: 5px; height: 5px;
      border-radius: 50%;
      background: #334155;
      transition: all 0.2s;
    }
    .nav-child:hover {
      color: #cbd5e1;
      background: rgba(255,255,255,0.04);
    }
    .nav-child:hover::before { background: #64748b; }

    /* Active state untuk halaman ini */
    .nav-child.active {
      color: #fff;
      background: rgba(59,130,246,0.15);
      font-weight: 600;
    }
    .nav-child.active::before {
      background: #3b82f6;
      box-shadow: 0 0 6px rgba(59,130,246,0.5);
      width: 6px; height: 6px;
    }

    .notif-badge {
      margin-left: auto;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 20px; height: 20px;
      padding: 0 6px;
      border-radius: 10px;
      background: #ef4444;
      color: #fff;
      font-size: 10px;
      font-weight: 700;
    }

    .sidebar-footer {
      padding: 14px;
      border-top: 1px solid rgba(255,255,255,0.08);
    }
    .user-card {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      border-radius: 10px;
      background: rgba(255,255,255,0.04);
    }
    .user-avatar {
      width: 34px; height: 34px;
      border-radius: 9px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 13px; color: #fff;
      flex-shrink: 0;
    }
    .user-info .user-name {
      font-size: 12.5px; font-weight: 600; color: #f1f5f9;
    }
    .user-info .user-role {
      font-size: 10.5px; color: #64748b;
    }


    /* ================================================================
       MAIN CONTENT — INI YANG SEBELUMNYA HILANG
       ================================================================ */
    .main-content {
      margin-left: 270px; /* ← INI KUNCI NYA */
      flex: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #f0f2f5;
    }


    /* ================================================================
       TOPBAR
       ================================================================ */
    .topbar {
      background: #fff;
      padding: 14px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #e2e8f0;
      position: sticky;
      top: 0;
      z-index: 50;
    }
    .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; }
    .breadcrumb a { color: #3b82f6; text-decoration: none; font-weight: 500; }
    .breadcrumb a:hover { text-decoration: underline; }
    .breadcrumb .sep { color: #cbd5e1; }
    .topbar-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }
    .topbar-brand-icon {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-weight: 800; font-size: 15px; color: #fff;
    }
    .topbar-brand-text {
      font-weight: 700; font-size: 15px; color: #1e293b; letter-spacing: -0.02em;
    }
    .topbar-brand-sub {
      font-size: 10px; color: #94a3b8; font-weight: 500;
      display: block; line-height: 1; margin-top: 1px;
    }
    .topbar-right {
      display: flex; align-items: center; gap: 10px;
    }
    .topbar-btn {
      width: 36px; height: 36px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      background: #fff;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; color: #64748b; font-size: 16px;
      transition: all 0.2s; position: relative;
    }
    .topbar-btn:hover { background: #f8fafc; color: #1e293b; border-color: #cbd5e1; }
    .notif-dot {
      position: absolute;
      top: 7px; right: 7px;
      width: 7px; height: 7px;
      background: #ef4444;
      border-radius: 50%;
      border: 1.5px solid #fff;
    }
    .topbar-user {
      display: flex; align-items: center; gap: 8px;
      padding: 5px 10px 5px 5px;
      border-radius: 10px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
    }
    .topbar-avatar {
      width: 30px; height: 30px;
      border-radius: 8px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 11px; color: #fff;
    }
    .topbar-user-name {
      font-size: 12.5px; font-weight: 600; color: #334155;
    }


    /* ================================================================
       PAGE HEADER
       ================================================================ */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px;
      position: relative; overflow: hidden;
    }
    .page-header::before {
      content: ''; position: absolute;
      top: -60%; right: -10%;
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
      border-radius: 50%;
    }
    .page-header::after {
      content: ''; position: absolute;
      bottom: -40%; left: 20%;
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
      border-radius: 50%;
    }
    .page-header-inner {
      position: relative; z-index: 2;
      display: flex; align-items: flex-start; justify-content: space-between;
    }
    .page-header-text h1 {
      font-size: 26px; font-weight: 800; color: #fff;
      letter-spacing: -0.02em; margin-bottom: 6px;
    }
    .page-header-text p {
      font-size: 14px; color: rgba(255,255,255,0.7);
      max-width: 480px; line-height: 1.6;
    }
    .header-stats { display: flex; gap: 14px; }
    .header-stat {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px;
      padding: 14px 20px;
      text-align: center;
      min-width: 105px;
    }
    .header-stat .stat-num {
      font-size: 24px; font-weight: 800; color: #fff; line-height: 1;
    }
    .header-stat .stat-label {
      font-size: 11px; color: rgba(255,255,255,0.65); margin-top: 4px; font-weight: 500;
    }


    /* ================================================================
       CONTENT AREA
       ================================================================ */
    .content-area {
      padding: 28px 32px 48px;
    }


    /* ================================================================
       PROFILE CARD
       ================================================================ */
    .profile-card {
      background: #fff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 24px 28px;
      margin-bottom: 24px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
      display: flex; align-items: center; gap: 20px;
    }
    .profile-avatar {
      width: 64px; height: 64px;
      border-radius: 16px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      display: flex; align-items: center; justify-content: center;
      font-weight: 800; font-size: 22px; color: #fff; flex-shrink: 0;
    }
    .profile-info h2 {
      font-size: 18px; font-weight: 800; color: #1e293b;
      letter-spacing: -0.02em; margin-bottom: 5px;
    }
    .profile-meta {
      display: flex; flex-wrap: wrap; gap-x: 16px; gap-y: 3px;
    }
    .profile-meta-item {
      display: flex; align-items: center; gap: 5px;
      font-size: 13px; color: #64748b; font-weight: 500;
    }
    .profile-meta-item .mi { font-size: 14px; }
    .profile-tags { display: flex; gap: 8px; margin-top: 10px; }
    .profile-tag {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 4px 10px; border-radius: 8px;
      font-size: 11px; font-weight: 600;
    }
    .profile-tag.blue { background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }
    .profile-tag.green { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }


    /* ================================================================
       STATS ROW
       ================================================================ */
    .stats-row {
      display: grid; grid-template-columns: repeat(4, 1fr);
      gap: 14px; margin-bottom: 28px;
    }
    .stat-card {
      background: #fff; border-radius: 14px;
      border: 1px solid #e2e8f0;
      padding: 18px 16px; text-align: center;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }
    .stat-card-num {
      font-size: 28px; font-weight: 800; line-height: 1; margin-bottom: 4px;
    }
    .stat-card-num.green { color: #16a34a; }
    .stat-card-num.yellow { color: #ca8a04; }
    .stat-card-num.red { color: #dc2626; }
    .stat-card-num.blue { color: #2563eb; }
    .stat-card-label { font-size: 12px; color: #94a3b8; font-weight: 500; }


    /* ================================================================
       SECTION LABEL
       ================================================================ */
    .section-label {
      display: flex; align-items: center; gap: 8px;
      font-size: 15px; font-weight: 700; color: #1e293b;
      margin-bottom: 16px; letter-spacing: -0.01em;
    }
    .section-label .le { font-size: 18px; }
    .section-date {
      margin-left: auto; font-size: 12px; font-weight: 500; color: #94a3b8;
    }
    .section-date-badge {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 3px 9px; border-radius: 6px;
      background: #eff6ff; color: #2563eb;
      font-size: 10.5px; font-weight: 600;
      border: 1px solid #bfdbfe; margin-left: 8px;
    }


    /* ================================================================
       REGISTRATION CARDS
       ================================================================ */
    .reg-card {
      background: #fff; border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 22px 24px; margin-bottom: 14px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
      border-left: 4px solid transparent;
      transition: box-shadow 0.2s;
    }
    .reg-card:hover { box-shadow: 0 4px 14px rgba(0,0,0,0.07); }
    .reg-card.approved { border-left-color: #22c55e; }
    .reg-card.pending  { border-left-color: #eab308; }
    .reg-card.rejected { border-left-color: #ef4444; }

    .reg-card-top { display: flex; align-items: flex-start; gap: 16px; }
    .reg-card-icon {
      width: 52px; height: 52px; border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 24px; flex-shrink: 0;
    }
    .reg-card.approved .reg-card-icon { background: #f0fdf4; border: 1px solid #bbf7d0; }
    .reg-card.pending .reg-card-icon  { background: #fefce8; border: 1px solid #fef08a; }
    .reg-card.rejected .reg-card-icon { background: #fef2f2; border: 1px solid #fecaca; }

    .reg-card-body { flex: 1; min-width: 0; }
    .reg-card-title-row {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 10px; flex-wrap: wrap;
    }
    .reg-card-title { font-size: 15px; font-weight: 700; color: #1e293b; }
    .reg-status-badge {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 3px 10px; border-radius: 8px;
      font-size: 11px; font-weight: 700;
    }
    .reg-status-badge.approved { background: #dcfce7; color: #16a34a; }
    .reg-status-badge.pending  { background: #fef9c3; color: #a16207; }
    .reg-status-badge.rejected { background: #fee2e2; color: #dc2626; }

    .reg-card-details { display: flex; flex-wrap: wrap; gap-x: 20px; gap-y: 7px; }
    .reg-detail-item {
      display: flex; align-items: center; gap: 5px;
      font-size: 13px; color: #64748b; font-weight: 500;
    }
    .reg-detail-item .rdi { font-size: 14px; }

    .reg-card-action { flex-shrink: 0; align-self: center; }
    .btn-jadwal {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 9px 18px; border-radius: 10px; border: none;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff; font-size: 12px; font-weight: 700;
      font-family: 'Inter', sans-serif; cursor: pointer;
      transition: all 0.2s; text-decoration: none; white-space: nowrap;
      box-shadow: 0 2px 8px rgba(37,99,235,0.2);
    }
    .btn-jadwal:hover { transform: translateY(-1px); box-shadow: 0 4px 14px rgba(37,99,235,0.3); }
    .btn-jadwal.disabled {
      background: #f1f5f9; color: #94a3b8;
      box-shadow: none; cursor: default; pointer-events: none;
    }

    .reg-card-timeline {
      margin-top: 14px; padding-top: 14px;
      border-top: 1px solid #f1f5f9;
      display: flex; flex-wrap: wrap; gap-x: 22px; gap-y: 6px;
    }
    .tlm-item {
      display: flex; align-items: center; gap: 6px;
      font-size: 11.5px; color: #94a3b8; font-weight: 500;
    }
    .tlm-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
    .tlm-dot.green  { background: #22c55e; }
    .tlm-dot.yellow { background: #eab308; animation: pulseDot 2s ease-in-out infinite; }
    @keyframes pulseDot { 0%,100% { opacity: 1; } 50% { opacity: 0.35; } }


    /* ================================================================
       FOOTER
       ================================================================ */
    .status-footer {
      margin-top: 28px; padding-top: 20px;
      border-top: 1px solid #e2e8f0;
      display: flex; align-items: center; justify-content: space-between;
      flex-wrap: wrap; gap: 12px;
    }
    .status-footer-info {
      display: flex; align-items: center; gap: 6px;
      font-size: 13px; color: #94a3b8; font-weight: 500;
    }
    .status-footer-live {
      display: flex; align-items: center; gap: 6px;
      font-size: 12px; color: #94a3b8;
    }
    .live-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: #22c55e; animation: pulseDot 2s ease-in-out infinite;
    }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .topbar { padding: 12px 16px; }
      .topbar-user-name { display: none; }
      .page-header { padding: 24px 20px 28px; }
      .page-header-inner { flex-direction: column; gap: 20px; }
      .page-header-text h1 { font-size: 20px; }
      .content-area { padding: 20px 16px 32px; }
      .stats-row { grid-template-columns: repeat(2, 1fr); gap: 10px; }
      .profile-card { flex-direction: column; text-align: center; padding: 20px; }
      .profile-meta { justify-content: center; }
      .profile-tags { justify-content: center; }
      .reg-card-top { flex-direction: column; }
      .reg-card-action { align-self: flex-start; }
      .section-date { display: none; }
    }

    /* Toolbar Styles */
    .table-toolbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; gap: 12px; flex-wrap: wrap; }
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
  <x-sidebar />
  <!-- ==================== MAIN CONTENT ==================== -->
  <main class="main-content">

    <!-- Topbar -->
    <div class="topbar">
      <div class="topbar-left">
        <div class="breadcrumb">
          <a href="#">Home</a>
          <span class="sep">/</span>
          <a href="#">Layanan Tutor</a>
          <span class="sep">/</span>
          <span>Aktivitas Peserta</span>
        </div>
      </div>
      <div class="topbar-right">
        <a href="{{ route('notifications.index') }}" class="topbar-btn">
          🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
        </a>
      </div>
    </div>
    <!-- Page Header -->
    <div class="page-header">
      <div class="page-header-inner">
        <div class="page-header-text">
          <h1>Status Pendaftaran</h1>
          <p>Pantau status pengajuan pendaftaran kelas bimbingan yang telah kamu ajukan kepada tutor.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat">
            <div class="stat-num">{{ $stats['total'] }}</div>
            <div class="stat-label">Kelas Diajukan</div>
          </div>
          <div class="header-stat">
            <div class="stat-num" style="color:#86efac">{{ $stats['approved'] }}</div>
            <div class="stat-label">Disetujui</div>
          </div>
          <div class="header-stat">
            <div class="stat-num" style="color:#fde047">{{ $stats['pending'] }}</div>
            <div class="stat-label">Menunggu</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="content-area">

      <!-- Profile -->
      <div class="profile-card">
        <div class="profile-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        <div class="profile-info">
          <h2>{{ Auth::user()->name }}</h2>
          <div class="profile-meta">
            <span class="profile-meta-item"><span class="mi">📧</span> {{ Auth::user()->email }}</span>
          </div>
          <div class="profile-tags">
            <span class="profile-tag green">Aktif</span>
          </div>
        </div>
      </div>

      <!-- Stats -->
      <div class="table-toolbar">
        <div class="table-toolbar-left">
          <form action="/aktivitas-peserta" method="GET" class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" name="search" placeholder="Cari topik kelas..." value="{{ $search }}">
          </form>
          <a href="/aktivitas-peserta?status=all&search={{ $search }}" class="filter-btn {{ !$status || $status === 'all' ? 'active' : '' }}">Semua</a>
          <a href="/aktivitas-peserta?status=pending&search={{ $search }}" class="filter-btn {{ $status === 'pending' ? 'active' : '' }}">Menunggu</a>
          <a href="/aktivitas-peserta?status=approved&search={{ $search }}" class="filter-btn {{ $status === 'approved' ? 'active' : '' }}">Disetujui</a>
          <a href="/aktivitas-peserta?status=rejected&search={{ $search }}" class="filter-btn {{ $status === 'rejected' ? 'active' : '' }}">Ditolak</a>
        </div>
      </div>

      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-num blue">{{ $stats['total'] }}</div>
          <div class="stat-card-label">Total Diajukan</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-num green">{{ $stats['approved'] }}</div>
          <div class="stat-card-label">Disetujui</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-num yellow">{{ $stats['pending'] }}</div>
          <div class="stat-card-label">Menunggu</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-num red">{{ $stats['rejected'] }}</div>
          <div class="stat-card-label">Ditolak</div>
        </div>
      </div>

      <!-- Kelas yang Diajukan -->
      <div class="section-label">
        <span class="le">📚</span> Kelas yang Kamu Ajukan
        <span class="section-date">
          Status pendaftaran terbaru
          <span class="section-date-badge">Live</span>
        </span>
      </div>

      @forelse($pendaftarans as $p)
        @php
            $statusClass = '';
            $statusIcon = '';
            $statusLabel = '';
            
            if($p->status == 'approved') { $statusClass = 'approved'; $statusIcon = '✅'; $statusLabel = '✓ Disetujui'; }
            elseif($p->status == 'rejected') { $statusClass = 'rejected'; $statusIcon = '❌'; $statusLabel = '✗ Ditolak'; }
            else { $statusClass = 'pending'; $statusIcon = '⏳'; $statusLabel = '⏳ Menunggu'; }
            
            $schedule = $p->teachingSchedule;
        @endphp
      <div class="reg-card {{ $statusClass }}">
        <div class="reg-card-top">
          <div class="reg-card-icon">{{ $statusIcon }}</div>
          <div class="reg-card-body">
            <div class="reg-card-title-row">
              <span class="reg-card-title">{{ $schedule->topik_pembahasan }}</span>
              <span class="reg-status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
            </div>
            <div class="reg-card-details">
              <span class="reg-detail-item"><span class="rdi">📅</span> {{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('l, d M Y') }}</span>
              <span class="reg-detail-item"><span class="rdi">🕐</span> {{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} – {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}</span>
              <span class="reg-detail-item"><span class="rdi">👤</span> Tutor: {{ $schedule->user->name }}</span>
            </div>
          </div>
          <div class="reg-card-action">
            @if($p->status == 'approved')
            <a href="/informasi-kelas" class="btn-jadwal">📅 Lihat Jadwal</a>
            @else
            <div class="btn-jadwal disabled">{{ $statusLabel }}</div>
            @endif
          </div>
        </div>
        <div class="reg-card-timeline">
          <span class="tlm-item"><span class="tlm-dot green"></span> Diajukan: {{ $p->created_at->format('d M, H:i') }}</span>
          @if($p->status == 'approved')
          <span class="tlm-item"><span class="tlm-dot green"></span> Disetujui: {{ $p->updated_at->format('d M, H:i') }}</span>
          @elseif($p->status == 'rejected')
          <span class="tlm-item"><span class="tlm-dot red"></span> Ditolak: {{ $p->updated_at->format('d M, H:i') }}</span>
          @else
          <span class="tlm-item"><span class="tlm-dot yellow"></span> Menunggu review tutor...</span>
          @endif
        </div>
      </div>
      @empty
      <div class="empty-state">
          <div class="empty-icon-wrap">🔍</div>
          <h2>Belum ada kelas</h2>
          <p>Kamu belum mendaftar kelas apapun.</p>
      </div>
      @endforelse

      <!-- Footer -->
      <div class="status-footer">
        <div class="status-footer-info">ℹ️ Status diperbarui secara real-time oleh tutor</div>
        <div class="status-footer-live">
          <span class="live-dot"></span>
          Terakhir diperbarui: {{ now()->translatedFormat('d M Y, H:i') }} WIB
        </div>
      </div>

    </div>
  </main>

</div>
</body>
</html>