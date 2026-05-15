<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Halaman Informasi Kelas</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f2f5;
      color: #1e293b;
      min-height: 100vh;
      display: flex;
      overflow-x: hidden;
    }

    /* ========== SIDEBAR ========== */
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
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 17px;
      color: #fff;
      flex-shrink: 0;
    }

    .sidebar-brand .brand-text {
      font-weight: 700;
      font-size: 17px;
      letter-spacing: -0.02em;
    }

    .sidebar-brand .brand-sub {
      font-size: 11px;
      color: #64748b;
      font-weight: 400;
      margin-top: 1px;
    }

    .sidebar-nav {
      flex: 1;
      padding: 12px 10px;
      display: flex;
      flex-direction: column;
      gap: 2px;
      overflow-y: auto;
    }

    /* Nav item biasa (tanpa anak) */
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
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .nav-item:hover {
      background: rgba(255,255,255,0.06);
      color: #e2e8f0;
    }

    .nav-item.active {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff;
      box-shadow: 0 3px 12px rgba(59, 130, 246, 0.3);
      font-weight: 600;
    }

    .nav-item .nav-icon {
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 17px;
    }

    /* ===== Parent menu (collapsible) ===== */
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
      list-style: none;
      transition: all 0.2s ease;
      user-select: none;
    }

    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary::marker { content: ''; }

    .nav-parent > summary:hover {
      background: rgba(255,255,255,0.06);
      color: #e2e8f0;
    }

    .nav-parent > summary .nav-icon {
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 17px;
    }

    .nav-parent > summary .chevron {
      margin-left: auto;
      font-size: 12px;
      color: #475569;
      transition: transform 0.25s ease;
      flex-shrink: 0;
    }

    .nav-parent[open] > summary .chevron {
      transform: rotate(90deg);
    }

    .nav-parent[open] > summary {
      color: #cbd5e1;
    }

    /* Child items */
    .nav-children {
      padding: 4px 0 6px 0;
      display: flex;
      flex-direction: column;
      gap: 1px;
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
      transition: all 0.2s ease;
      cursor: pointer;
      position: relative;
    }

    .nav-child::before {
      content: '';
      position: absolute;
      left: 30px;
      top: 50%;
      transform: translateY(-50%);
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: #334155;
      transition: all 0.2s;
    }

    .nav-child:hover {
      color: #cbd5e1;
      background: rgba(255,255,255,0.04);
    }

    .nav-child:hover::before {
      background: #64748b;
    }

    .nav-child.active {
      color: #fff;
      background: rgba(59, 130, 246, 0.15);
      font-weight: 600;
    }

    .nav-child.active::before {
      background: #3b82f6;
      box-shadow: 0 0 6px rgba(59,130,246,0.5);
      width: 6px;
      height: 6px;
    }

    /* Separator */
    .nav-separator {
      height: 1px;
      background: rgba(255,255,255,0.06);
      margin: 8px 14px;
    }

    /* Sidebar footer */
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
      width: 34px;
      height: 34px;
      border-radius: 9px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 13px;
      color: #fff;
      flex-shrink: 0;
    }

    .user-info .user-name {
      font-size: 12.5px;
      font-weight: 600;
      color: #f1f5f9;
    }

    .user-info .user-role {
      font-size: 10.5px;
      color: #64748b;
    }

    /* ========== MAIN CONTENT ========== */
    .main-content {
      margin-left: 270px;
      flex: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ========== TOP BAR ========== */
    .topbar {
      background: #fff;
      padding: 16px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #e2e8f0;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      color: #64748b;
    }

    .breadcrumb a {
      color: #3b82f6;
      text-decoration: none;
      font-weight: 500;
    }

    .breadcrumb a:hover { text-decoration: underline; }
    .breadcrumb .sep { color: #cbd5e1; }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .topbar-btn {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: #64748b;
      font-size: 18px;
      transition: all 0.2s;
      position: relative;
    }

    .topbar-btn:hover {
      background: #f8fafc;
      color: #1e293b;
      border-color: #cbd5e1;
    }

    .topbar-btn .notif-dot {
      position: absolute;
      top: 8px;
      right: 8px;
      width: 7px;
      height: 7px;
      background: #ef4444;
      border-radius: 50%;
      border: 1.5px solid #fff;
    }

    /* ========== PAGE HEADER ========== */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px;
      position: relative;
      overflow: hidden;
    }

    .page-header::before {
      content: '';
      position: absolute;
      top: -60%;
      right: -10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
      border-radius: 50%;
    }

    .page-header::after {
      content: '';
      position: absolute;
      bottom: -40%;
      left: 20%;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
      border-radius: 50%;
    }

    .page-header-inner {
      position: relative;
      z-index: 2;
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
    }

    .page-header-text h1 {
      font-size: 26px;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.02em;
      margin-bottom: 6px;
    }

    .page-header-text p {
      font-size: 14px;
      color: rgba(255,255,255,0.7);
      font-weight: 400;
      max-width: 500px;
      line-height: 1.5;
    }

    .header-stats {
      display: flex;
      gap: 16px;
    }

    .header-stat {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px;
      padding: 14px 20px;
      text-align: center;
      min-width: 110px;
    }

    .header-stat .stat-num {
      font-size: 24px;
      font-weight: 800;
      color: #fff;
      line-height: 1;
    }

    .header-stat .stat-label {
      font-size: 11px;
      color: rgba(255,255,255,0.65);
      margin-top: 4px;
      font-weight: 500;
    }

    /* ========== TABLE SECTION ========== */
    .table-section {
      padding: 28px 32px 40px;
      flex: 1;
    }

    .table-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      gap: 12px;
      flex-wrap: wrap;
    }

    .table-toolbar-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-box {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 9px 14px;
      min-width: 260px;
      transition: all 0.2s;
    }

    .search-box:focus-within {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
    }

    .search-box .search-icon {
      color: #94a3b8;
      font-size: 16px;
      flex-shrink: 0;
    }

    .search-box input {
      border: none;
      outline: none;
      font-size: 13px;
      font-family: 'Inter', sans-serif;
      color: #1e293b;
      background: transparent;
      width: 100%;
    }

    .search-box input::placeholder { color: #94a3b8; }

    .filter-btn {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 9px 16px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      background: #fff;
      font-size: 13px;
      font-weight: 500;
      color: #475569;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      transition: all 0.2s;
    }

    .filter-btn:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
    }

    .filter-btn .filter-icon {
      font-size: 16px;
      color: #94a3b8;
    }

    .table-wrapper {
      background: #fff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }

    .table-scroll { overflow-x: auto; }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 780px;
    }

    thead {
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
    }

    thead th {
      padding: 14px 18px;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: #64748b;
      text-align: left;
      white-space: nowrap;
    }

    tbody tr {
      border-bottom: 1px solid #f1f5f9;
      transition: background 0.15s;
    }

    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #f8fafc; }

    tbody td {
      padding: 16px 18px;
      font-size: 13.5px;
      color: #334155;
      vertical-align: top;
    }

    .col-no {
      font-weight: 600;
      color: #94a3b8;
      text-align: center;
      width: 50px;
    }

    .date-cell {
      display: flex;
      flex-direction: column;
      gap: 3px;
    }

    .date-day {
      font-weight: 700;
      color: #1e293b;
      font-size: 14px;
    }

    .date-full {
      font-size: 12px;
      color: #94a3b8;
      font-weight: 500;
    }

    .topic-cell { min-width: 220px; }

    .topic-text {
      font-weight: 600;
      color: #1e293b;
      font-size: 13.5px;
      margin-bottom: 8px;
      line-height: 1.4;
    }

    .topic-details-wrapper { position: relative; }

    .topic-details-toggle {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 5px 11px;
      border-radius: 8px;
      border: 1px solid #e2e8f0;
      background: #fff;
      font-size: 11px;
      font-weight: 600;
      color: #3b82f6;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      transition: all 0.2s;
      list-style: none;
    }

    .topic-details-toggle::-webkit-details-marker { display: none; }
    .topic-details-toggle::marker { content: ''; }

    .topic-details-toggle:hover {
      background: #eff6ff;
      border-color: #bfdbfe;
    }

    .topic-details-toggle .eye-icon {
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .topic-details-content {
      margin-top: 10px;
      background: linear-gradient(135deg, #f0f9ff, #eff6ff);
      border: 1px solid #bfdbfe;
      border-radius: 12px;
      padding: 14px 16px;
      animation: slideDown 0.25s ease;
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-6px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .detail-row {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 5px 0;
      font-size: 12.5px;
    }

    .detail-row:not(:last-child) {
      border-bottom: 1px solid rgba(59,130,246,0.08);
      padding-bottom: 8px;
      margin-bottom: 4px;
    }

    .detail-row .detail-icon {
      width: 24px;
      height: 24px;
      border-radius: 6px;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      color: #3b82f6;
      flex-shrink: 0;
      border: 1px solid #e0e7ff;
    }

    .detail-row .detail-label {
      color: #64748b;
      font-weight: 500;
      min-width: 90px;
    }

    .detail-row .detail-value {
      color: #1e293b;
      font-weight: 600;
    }

    .approved-badge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 2px 8px;
      border-radius: 6px;
      background: #dcfce7;
      color: #16a34a;
      font-size: 11px;
      font-weight: 700;
    }

    .approved-badge .check-icon { font-size: 12px; }

    .time-cell {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .time-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: #f8fafc;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
      color: #64748b;
      flex-shrink: 0;
    }

    .time-text {
      font-weight: 600;
      color: #1e293b;
      font-size: 13.5px;
    }

    .time-duration {
      font-size: 11px;
      color: #94a3b8;
      font-weight: 500;
      margin-top: 1px;
    }

    .participant-cell {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .participant-info {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .participant-bar-bg {
      flex: 1;
      height: 6px;
      background: #f1f5f9;
      border-radius: 20px;
      overflow: hidden;
    }

    .participant-bar-fill {
      height: 100%;
      border-radius: 20px;
      transition: width 0.5s ease;
    }

    .participant-bar-fill.low { background: linear-gradient(90deg, #22c55e, #4ade80); }
    .participant-bar-fill.mid { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
    .participant-bar-fill.high { background: linear-gradient(90deg, #ef4444, #f87171); }

    .participant-text {
      font-size: 13px;
      font-weight: 700;
      color: #1e293b;
      white-space: nowrap;
    }

    .participant-text span {
      color: #94a3b8;
      font-weight: 500;
    }

    .btn-daftar {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      padding: 9px 18px;
      border-radius: 10px;
      border: none;
      font-size: 12.5px;
      font-weight: 700;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.25s ease;
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-daftar.available {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff;
      box-shadow: 0 2px 8px rgba(37,99,235,0.25);
    }

    .btn-daftar.available:hover {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      box-shadow: 0 4px 14px rgba(37,99,235,0.35);
      transform: translateY(-1px);
    }

    .btn-daftar.full {
      background: #f1f5f9;
      color: #94a3b8;
      cursor: not-allowed;
      box-shadow: none;
    }

    .btn-daftar .btn-icon {
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: 8px;
      font-size: 11px;
      font-weight: 600;
    }

    .status-badge.open { background: #dcfce7; color: #16a34a; }
    .status-badge.almost-full { background: #fef9c3; color: #ca8a04; }
    .status-badge.closed { background: #fee2e2; color: #dc2626; }

    .status-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .status-badge.open .status-dot { background: #16a34a; }
    .status-badge.almost-full .status-dot { background: #ca8a04; }
    .status-badge.closed .status-dot { background: #dc2626; }

    .table-footer {
      padding: 14px 18px;
      border-top: 1px solid #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 12px;
      color: #94a3b8;
      background: #fafbfc;
    }

    .table-footer-info strong { color: #475569; }

    .pagination {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .page-btn {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: 1px solid #e2e8f0;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 600;
      color: #475569;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      transition: all 0.2s;
    }

    .page-btn:hover {
      background: #f1f5f9;
      border-color: #cbd5e1;
    }

    .page-btn.active {
      background: #3b82f6;
      color: #fff;
      border-color: #3b82f6;
    }

    @media (max-width: 1100px) {
      .header-stats { display: none; }
    }

    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .page-header { padding: 24px 20px 28px; }
      .page-header-text h1 { font-size: 20px; }
      .table-section { padding: 20px 16px 32px; }
      .topbar { padding: 12px 16px; }
      .search-box { min-width: 180px; }
    }
  </style>
</head>
<body>
<x-sidebar />
  <!-- ========== MAIN CONTENT ========== -->
  <div class="main-content">

    <!-- Top Bar -->
    <div class="topbar">
      <div class="topbar-left">
        <div class="breadcrumb">
          <a href="#">Home</a>
          <span class="sep">/</span>
          <a href="#">Layanan Tutor</a>
          <span class="sep">/</span>
          <span>Informasi Kelas</span>
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
          <h1>Halaman Informasi Kelas</h1>
          <p>Lihat jadwal kelas yang tersedia, detail topik pembahasan, informasi tutor, dan daftarkan diri Anda pada kelas yang diinginkan.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat">
            <div class="stat-num">{{ $schedules->count() }}</div>
            <div class="stat-label">Kelas Tersedia</div>
          </div>
          <div class="header-stat">
            <div class="stat-num">{{ $schedules->where('tanggal', \Carbon\Carbon::today()->toDateString())->count() }}</div>
            <div class="stat-label">Hari Ini</div>
          </div>
          <div class="header-stat">
            <div class="stat-num">{{ $schedules->pluck('user_id')->unique()->count() }}</div>
            <div class="stat-label">Tutor Aktif</div>
          </div>
        </div>
      </div>
      
    </div>

    <!-- Table Section -->
    <div class="table-section">

      <div class="table-toolbar">
        <div class="table-toolbar-left">
          <form action="{{ route('informasi-kelas') }}" method="GET" class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" name="search" placeholder="Cari topik atau tutor..." value="{{ $search }}">
          </form>
          <button class="filter-btn">
            <span class="filter-icon">🔽</span> Filter
          </button>
        </div>
      </div>

      <div class="table-wrapper">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th class="col-no">No</th>
                <th>Hari / Tanggal Kelas</th>
                <th>Topik Pembahasan</th>
                <th>Waktu</th>
                <th>Jumlah Peserta</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($schedules as $index => $schedule)
              <tr>
                <td class="col-no">{{ $index + 1 }}</td>
                <td>
                  <div class="date-cell">
                    <span class="date-day">{{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('l') }}</span>
                    <span class="date-full">{{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('d F Y') }}</span>
                  </div>
                </td>
                <td>
                  <div class="topic-cell">
                    <div class="topic-text" style="font-size: 15px; color: #1e3a8a;">{{ $schedule->topik_pembahasan }}</div>
                    <div class="tutor-brief" style="font-size: 12px; color: #64748b; margin-bottom: 8px;">Tutor: {{ $schedule->user->name ?? 'Tidak diketahui' }}</div>
                    <div class="topic-details-wrapper">
                      <details>
                        <summary class="topic-details-toggle">
                          <span class="eye-icon">👁️</span> Lihat Detail Tutor
                        </summary>
                        <div class="topic-details-content">
                          <div class="detail-row">
                            <div class="detail-icon">👤</div>
                            <span class="detail-label">Nama Tutor</span>
                            <span class="detail-value">{{ $schedule->user->name ?? 'Tidak diketahui' }}</span>
                          </div>
                          <div class="detail-row">
                            <div class="detail-icon">✅</div>
                            <span class="detail-label">Status</span>
                            <span class="approved-badge"><span class="check-icon">✓</span> Approved by Kaprodi</span>
                          </div>
                        </div>
                      </details>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="time-cell">
                    <div class="time-icon">🕐</div>
                    <div>
                      <div class="time-text">{{ $schedule->waktu }}</div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="participant-cell">
                    @php
                      $kuota_terisi = $schedule->pendaftaran->count();
                      $kuota_total = $schedule->kuota;
                      $percentage = $kuota_total > 0 ? ($kuota_terisi / $kuota_total) * 100 : 0;
                      $fill_class = $percentage < 50 ? 'low' : ($percentage < 90 ? 'mid' : 'high');
                      $status_class = $kuota_terisi >= $kuota_total ? 'closed' : ($percentage >= 80 ? 'almost-full' : 'open');
                      $status_text = $kuota_terisi >= $kuota_total ? 'Penuh' : ($percentage >= 80 ? 'Hampir Penuh' : 'Tersedia');
                    @endphp
                    <div class="participant-info">
                      <span class="participant-text">{{ $kuota_terisi }} <span>/ {{ $kuota_total }}</span></span>
                      <div class="participant-bar-bg">
                        <div class="participant-bar-fill {{ $fill_class }}" style="width: {{ $percentage }}%"></div>
                      </div>
                    </div>
                    @php
                      $waktu_mulai = explode(' - ', $schedule->waktu)[0];
                      $start_time = \Carbon\Carbon::parse($schedule->tanggal->format('Y-m-d') . ' ' . $waktu_mulai);
                      $is_closed = now()->greaterThanOrEqualTo($start_time->subHour());
                    @endphp
                    @if($is_closed)
                      <button class="btn-daftar full" disabled title="Pendaftaran ditutup (maksimal 1 jam sebelum kelas dimulai)"><span class="btn-icon">🔒</span> Ditutup</button>
                    @elseif($kuota_terisi >= $kuota_total)
                      <button class="btn-daftar full" disabled><span class="btn-icon">🚫</span> Penuh</button>
                    @else
                      <a href="/pendaftaran-kelas?jadwal_id={{ $schedule->id }}" class="btn-daftar available"><span class="btn-icon">➕</span> Daftar</a>
                    @endif
                  </div>
                </td>
                <td><span class="status-badge {{ $status_class }}"><span class="status-dot"></span> {{ $status_text }}</span></td>
              </tr>
              @empty
              <tr>
                <td colspan="6" style="text-align: center; padding: 40px; color: #64748b;">Belum ada kelas yang ditambahkan oleh tutor.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="table-footer">
          <div class="table-footer-info">
            Menampilkan <strong>{{ $schedules->count() }}</strong> kelas
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
</html>