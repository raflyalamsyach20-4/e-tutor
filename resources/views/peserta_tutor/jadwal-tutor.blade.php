<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Jadwal Tutor</title>
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
    #page-jadwal { display: flex; }
    .page-wrapper:target { display: flex !important; }
    body:has(.page-wrapper:target) #page-jadwal { display: none; }

    /* Default active: nav-jadwal */
    .nav-jadwal { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    .nav-jadwal::before { background: #3b82f6 !important; box-shadow: 0 0 6px rgba(59,130,246,0.5) !important; width: 6px !important; height: 6px !important; }

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
    body:has(#page-jadwal-add:target) .nav-jadwal,
    body:has(#page-list:target) .nav-list,
    body:has(#page-achievement:target) .nav-achievement { color: #fff !important; background: rgba(59,130,246,0.15) !important; font-weight: 600 !important; }
    body:has(#page-pengajuan:target) .nav-pengajuan::before,
    body:has(#page-status:target) .nav-status::before,
    body:has(#page-jadwal:target) .nav-jadwal::before,
    body:has(#page-jadwal-add:target) .nav-jadwal::before,
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
       JADWAL PAGE — Blue Card Container
       ================================================================ */
    .jadwal-page { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 32px; }

    .jadwal-card {
      width: 100%; max-width: 860px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 45%, #2563eb 100%);
      border-radius: 20px; padding: 40px 36px 32px;
      position: relative; overflow: hidden;
      box-shadow: 0 20px 60px rgba(30,64,175,0.25), 0 4px 20px rgba(0,0,0,0.08);
    }
    .jadwal-card::before { content: ''; position: absolute; top: -80px; right: -60px; width: 240px; height: 240px; background: radial-gradient(circle, rgba(255,255,255,0.07) 0%, transparent 70%); border-radius: 50%; }
    .jadwal-card::after { content: ''; position: absolute; bottom: -50px; left: -40px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .jadwal-inner { position: relative; z-index: 2; }

    .jadwal-header { text-align: center; margin-bottom: 28px; }
    .jadwal-header .jadwal-icon {
      width: 52px; height: 52px;
      background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px; display: flex; align-items: center; justify-content: center;
      margin: 0 auto 14px; font-size: 24px;
    }
    .jadwal-header h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 5px; }
    .jadwal-header p { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.5; }

    /* Add Button */
    .btn-add {
      display: inline-flex; align-items: center; gap: 7px;
      padding: 10px 20px; border-radius: 11px; border: none;
      background: #fff; color: #1e40af;
      font-size: 13px; font-weight: 700; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.25s ease;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-decoration: none; margin-bottom: 22px;
    }
    .btn-add:hover { background: #f0f9ff; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(0,0,0,0.15); }
    .btn-add:active { transform: translateY(0); }
    .btn-add .add-icon { font-size: 16px; display: flex; align-items: center; }

    /* Table inside blue card */
    .jadwal-table-wrap {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 14px; overflow: hidden;
    }
    .jadwal-table-scroll { overflow-x: auto; }

    .jadwal-table {
      width: 100%; border-collapse: collapse; min-width: 640px;
    }
    .jadwal-table thead {
      background: rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .jadwal-table thead th {
      padding: 13px 18px; font-size: 11px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.07em;
      color: rgba(255,255,255,0.5); text-align: left; white-space: nowrap;
    }
    .jadwal-table tbody tr {
      border-bottom: 1px solid rgba(255,255,255,0.06);
      transition: background 0.15s;
    }
    .jadwal-table tbody tr:last-child { border-bottom: none; }
    .jadwal-table tbody tr:hover { background: rgba(255,255,255,0.04); }
    .jadwal-table tbody td {
      padding: 14px 18px; font-size: 13.5px; color: rgba(255,255,255,0.85); vertical-align: middle;
    }

    .jt-day { font-weight: 700; color: #fff; font-size: 14px; }
    .jt-date { font-size: 12px; color: rgba(255,255,255,0.45); font-weight: 500; margin-top: 2px; }
    .jt-topic { font-weight: 600; color: #fff; font-size: 13.5px; }
    .jt-time { font-weight: 600; color: rgba(255,255,255,0.9); font-size: 13.5px; }

    .btn-detail {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 7px 14px; border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.06);
      color: rgba(255,255,255,0.8);
      font-size: 12px; font-weight: 600; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.2s; text-decoration: none;
    }
    .btn-detail:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.3); color: #fff; }
    .btn-detail .detail-icon { font-size: 14px; display: flex; align-items: center; }

    /* Empty row state */
    .jadwal-empty {
      text-align: center; padding: 40px 20px;
    }
    .jadwal-empty-icon { font-size: 36px; margin-bottom: 10px; opacity: 0.4; }
    .jadwal-empty p { font-size: 13px; color: rgba(255,255,255,0.4); font-weight: 500; }

    /* Footer inside card */
    .jadwal-footer {
      margin-top: 18px; text-align: center;
      font-size: 11.5px; color: rgba(255,255,255,0.35); line-height: 1.6;
    }
    .jadwal-footer a { color: rgba(255,255,255,0.6); text-decoration: underline; text-underline-offset: 2px; }
    .jadwal-footer a:hover { color: #fff; }


    /* ================================================================
       ADD JADWAL FORM
       ================================================================ */
    .page-content-center { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 32px; }

    .form-card {
      width: 100%; max-width: 560px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 50%, #2563eb 100%);
      border-radius: 20px; padding: 40px 36px 36px;
      position: relative; overflow: hidden;
      box-shadow: 0 20px 60px rgba(30,64,175,0.25), 0 4px 20px rgba(0,0,0,0.08);
    }
    .form-card::before { content: ''; position: absolute; top: -80px; right: -60px; width: 220px; height: 220px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .form-card::after { content: ''; position: absolute; bottom: -50px; left: -40px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .form-inner { position: relative; z-index: 2; }

    .form-header { text-align: center; margin-bottom: 32px; }
    .form-header .form-icon { width: 56px; height: 56px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 26px; }
    .form-header h1 { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .form-header p { font-size: 13px; color: rgba(255,255,255,0.6); line-height: 1.5; }

    .form-group { margin-bottom: 20px; }
    .form-group:last-of-type { margin-bottom: 28px; }
    .form-label { display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: rgba(255,255,255,0.7); margin-bottom: 8px; }
    .form-label .label-icon { font-size: 14px; opacity: 0.8; }
    .required-badge { display: inline-flex; align-items: center; justify-content: center; width: 17px; height: 17px; border-radius: 5px; background: #ef4444; color: #fff; font-size: 10px; font-weight: 800; margin-left: 2px; flex-shrink: 0; line-height: 1; }

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
    .form-textarea { resize: vertical; min-height: 110px; line-height: 1.6; }

    .input-wrapper { position: relative; }
    .input-wrapper .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 16px; color: rgba(255,255,255,0.4); pointer-events: none; transition: color 0.2s; }
    .input-wrapper .form-input { padding-left: 44px; }
    .input-wrapper .form-input:focus ~ .input-icon,
    .input-wrapper .form-input:hover ~ .input-icon { color: rgba(255,255,255,0.65); }
    .form-helper { font-size: 11px; color: rgba(255,255,255,0.4); margin-top: 5px; padding-left: 2px; }

    /* Time range row */
    .time-range-row {
      display: flex; align-items: center; gap: 12px;
    }
    .time-range-row .form-input { flex: 1; }
    .time-range-sep {
      font-size: 16px; font-weight: 700;
      color: rgba(255,255,255,0.4);
      flex-shrink: 0; padding-top: 22px;
    }

    .btn-submit {
      width: 100%; padding: 15px 24px; border-radius: 13px; border: none;
      background: #fff; color: #1e40af; font-size: 15px; font-weight: 800;
      font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.3s ease;
      letter-spacing: 0.02em; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      display: flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none;
    }
    .btn-submit:hover { background: #f0f9ff; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
    .btn-submit:active { transform: translateY(0); box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .btn-submit .btn-arrow { font-size: 16px; transition: transform 0.2s; }
    .btn-submit:hover .btn-arrow { transform: translateX(3px); }

    .btn-back {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 11px 20px; border-radius: 12px;
      border: 1.5px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.06);
      color: rgba(255,255,255,0.8); font-size: 13.5px; font-weight: 600;
      font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.25s ease;
      text-decoration: none; backdrop-filter: blur(4px);
      margin-bottom: 20px;
    }
    .btn-back:hover { border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.1); color: #fff; }
    .btn-back .back-icon { font-size: 14px; display: flex; align-items: center; }

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
      .jadwal-page { padding: 24px 16px; }
      .jadwal-card { padding: 28px 20px 22px; border-radius: 16px; }
      .jadwal-header h1 { font-size: 19px; }
      .page-content-center { padding: 24px 16px; }
      .form-card { padding: 28px 22px 24px; border-radius: 16px; }
      .form-header h1 { font-size: 19px; }
    }
  </style>
</head>
<body>
<x-sidebar />
  <!-- ==================== MAIN ==================== -->
  <div class="main-content">

    <!-- ====================================================================
         ✅ HALAMAN JADWAL TUTOR — DEFAULT PAGE
         ==================================================================== -->
         <div class="topbar">
      <div class="topbar-left">
        <div class="breadcrumb">
          <a href="#">Home</a>
          <span class="sep">/</span>
          <a href="#">Layanan Tutor</a>
          <span class="sep">/</span>
          <span>Jadwal Tutor</span>
        </div>
      </div>
      <div class="topbar-right">
        <button class="topbar-btn">
          🔔 <span class="notif-dot"></span>
        </button>
      </div>
    </div>
    
      <div class="jadwal-page">
        <div class="jadwal-card">
          <div class="jadwal-inner">

            <div class="jadwal-header">
              <div class="jadwal-icon">📅</div>
              <h1>Halaman Jadwal Tutor</h1>
              <p>Kelola jadwal mengajar Anda. Tambahkan jadwal baru atau lihat jadwal yang sudah dibuat.</p>
            </div>

            <!-- Tombol Add -->
            @if(isset($application) && $application->status == 'approved')

<a href="#page-jadwal-add" class="btn-add">
    <span class="add-icon">➕</span> Tambah Jadwal
</a>

@else

<button type="button" class="btn-add" disabled>
    <span class="add-icon">➕</span> Tambah Jadwal
</button>

<p style="color:red; margin-top:10px;">
    Anda belum disetujui sebagai tutor.
</p>

@endif
            <!-- Tabel Jadwal -->
            <div class="jadwal-table-wrap">
              <div class="jadwal-table-scroll">
                <table class="jadwal-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Hari</th>
                      <th>Tanggal</th>
                      <th>Topik Pembahasan</th>
                      <th>Waktu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="color:rgba(255,255,255,0.45); font-weight:600;">1</td>
                      <td><span class="jt-day">Kamis</span></td>
                      <td><span class="jt-date">22 Februari 2026</span></td>
                      <td><span class="jt-topic">Distribusi Normal dan Aplikasinya</span></td>
                      <td><span class="jt-time">08:00 - 10:00</span></td>
                      <td><a href="/informasi-kelas" class="btn-detail"><span class="detail-icon">👁️</span> Detail</a></td>
                    </tr>
                    <tr>
                      <td style="color:rgba(255,255,255,0.45); font-weight:600;">2</td>
                      <td><span class="jt-day">Senin</span></td>
                      <td><span class="jt-date">2 Maret 2026</span></td>
                      <td><span class="jt-topic">Normalisasi Database (1NF - 3NF)</span></td>
                      <td><span class="jt-time">10:00 - 12:00</span></td>
                      <td><a href="/informasi-kelas" class="btn-detail"><span class="detail-icon">👁️</span> Detail</a></td>
                    </tr>
                    <tr>
                      <td style="color:rgba(255,255,255,0.45); font-weight:600;">3</td>
                      <td><span class="jt-day">Rabu</span></td>
                      <td><span class="jt-date">4 Maret 2026</span></td>
                      <td><span class="jt-topic">Regresi Linier Berganda</span></td>
                      <td><span class="jt-time">14:00 - 16:00</span></td>
                      <td><a href="/informasi-kelas" class="btn-detail"><span class="detail-icon">👁️</span> Detail</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="jadwal-footer">
              Klik <a href="#page-info">Detail</a> untuk melihat kelas di halaman Informasi Kelas.
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- ====================================================================
         ✅ HALAMAN TAMBAH JADWAL
         ==================================================================== -->
    <div class="page-wrapper" id="page-jadwal-add">
      <div class="topbar">
        <div class="topbar-left">
          <div class="breadcrumb">
            <a href="#page-home">Home</a>
            <span class="sep">/</span>
            <span>Pengajuan Tutor</span>
            <span class="sep">/</span>
            <a href="#page-jadwal">Jadwal Tutor</a>
            <span class="sep">/</span>
            <span>Tambah Jadwal</span>
          </div>
        </div>
        <div class="topbar-right">
          <button class="topbar-btn">🔔 <span class="notif-dot"></span></button>
          
        </div>
      </div>

      <div class="page-content-center">
        <div class="form-card">
          <div class="form-inner">

            <a href="#page-jadwal" class="btn-back">
              <span class="back-icon">←</span> Kembali ke Jadwal
            </a>

            <div class="form-header">
              <div class="form-icon">➕</div>
              <h1>Tambah Jadwal Mengajar</h1>
              <p>Buat jadwal baru untuk kelas tutoring Anda. Jadwal akan ditampilkan di halaman Informasi Kelas.</p>
            </div>

            <form action="#" method="post">

              <!-- Hari -->
              <div class="form-group">
                <label class="form-label" for="jd-hari">
                  <span class="label-icon">📆</span> HARI
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <select class="form-select" id="jd-hari" name="hari" required>
                    <option value="" disabled selected>— Pilih Hari —</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                  </select>
                </div>
              </div>

              <!-- Tanggal -->
              <div class="form-group">
                <label class="form-label" for="jd-tanggal">
                  <span class="label-icon">📅</span> TANGGAL
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <input class="form-input" type="date" id="jd-tanggal" name="tanggal" required>
                  <span class="input-icon">🗓️</span>
                </div>
              </div>

              <!-- Topik Pembahasan -->
              <div class="form-group">
                <label class="form-label" for="jd-topik">
                  <span class="label-icon">📖</span> TOPIK PEMBAHASAN
                  <span class="required-badge">R</span>
                </label>
                <div class="input-wrapper">
                  <input class="form-input" type="text" id="jd-topik" name="topik" placeholder="Contoh: Algoritma & Struktur Data" required>
                  <span class="input-icon">📚</span>
                </div>
                <div class="form-helper">Topik yang akan Anda ajarkan pada jadwal ini</div>
              </div>

              <!-- Waktu Mulai - Selesai -->
              <div class="form-group">
                <label class="form-label">
                  <span class="label-icon">🕐</span> WAKTU
                  <span class="required-badge">R</span>
                </label>
                <div class="time-range-row">
                  <div class="input-wrapper" style="flex:1">
                    <input class="form-input" type="time" id="jd-mulai" name="waktu_mulai" required value="08:00">
                    <span class="input-icon">▶️</span>
                  </div>
                  <span class="time-range-sep">—</span>
                  <div class="input-wrapper" style="flex:1">
                    <input class="form-input" type="time" id="jd-selesai" name="waktu_selesai" required value="10:00">
                    <span class="input-icon">⏹️</span>
                  </div>
                </div>
                <div class="form-helper">Isi jam mulai dan jam selesai mengajar</div>
              </div>

              <!-- Deskripsi (opsional) -->
              <div class="form-group">
                <label class="form-label" for="jd-deskripsi">
                  <span class="label-icon">📝</span> DESKRIPSI (Opsional)
                </label>
                <textarea class="form-textarea" id="jd-deskripsi" name="deskripsi" placeholder="Catatan tambahan mengenai jadwal ini (opsional)..."></textarea>
              </div>

              <!-- Submit -->
              <button type="submit" class="btn-submit">
                SIMPAN JADWAL
                <span class="btn-arrow">→</span>
              </button>

            </form>

            <div class="form-footer-note">
              Jadwal yang dibuat akan otomatis muncul di halaman <a href="/jadwal-tutor">Jadwal Tutor</a><br>
              dan dapat dilihat oleh peserta di <a href="/informasi-kelas">Informasi Kelas</a>.
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>