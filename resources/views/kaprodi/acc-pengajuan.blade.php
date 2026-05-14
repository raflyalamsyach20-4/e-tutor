<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Pengajuan Tutor — E-Tutor</title>
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
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }

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
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .nav-parent > summary .chevron { margin-left: auto; font-size: 11px; color: #475569; transition: transform 0.25s; }
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }

    .nav-children { display: flex; flex-direction: column; gap: 1px; padding: 4px 0 6px 0; }
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
    .nav-child.active {
      color: #fff; background: rgba(59,130,246,0.15); font-weight: 600;
    }
    .nav-child.active::before {
      background: #3b82f6; box-shadow: 0 0 6px rgba(59,130,246,0.5); width: 6px; height: 6px;
    }

    .notif-badge {
      margin-left: auto; display: inline-flex; align-items: center; justify-content: center;
      min-width: 20px; height: 20px; padding: 0 6px;
      border-radius: 10px; background: #ef4444; color: #fff; font-size: 10px; font-weight: 700;
    }

    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #f59e0b, #d97706); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; flex-shrink: 0; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }


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
    .topbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
    .topbar-brand-icon {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 10px; display: flex; align-items: center; justify-content: center;
      font-weight: 800; font-size: 15px; color: #fff;
    }
    .topbar-brand-text { font-weight: 700; font-size: 15px; color: #1e293b; letter-spacing: -0.02em; }
    .topbar-brand-sub { font-size: 10px; color: #94a3b8; font-weight: 500; display: block; line-height: 1; margin-top: 1px; }
    .topbar-right { display: flex; align-items: center; gap: 10px; }
    .topbar-btn {
      width: 36px; height: 36px; border-radius: 10px;
      border: 1px solid #e2e8f0; background: #fff;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; color: #64748b; font-size: 16px;
      transition: all 0.2s; position: relative;
    }
    .topbar-btn:hover { background: #f8fafc; color: #1e293b; border-color: #cbd5e1; }
    .notif-dot { position: absolute; top: 7px; right: 7px; width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; }
    .topbar-user { display: flex; align-items: center; gap: 8px; padding: 5px 10px 5px 5px; border-radius: 10px; background: #f8fafc; border: 1px solid #e2e8f0; }
    .topbar-avatar { width: 30px; height: 30px; border-radius: 8px; background: linear-gradient(135deg, #f59e0b, #d97706); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 11px; color: #fff; }
    .topbar-user-name { font-size: 12.5px; font-weight: 600; color: #334155; }


    /* ================================================================
       PAGE HEADER
       ================================================================ */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px; position: relative; overflow: hidden;
    }
    .page-header::before { content: ''; position: absolute; top: -60%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .page-header::after { content: ''; position: absolute; bottom: -40%; left: 20%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%; }
    .page-header-inner { position: relative; z-index: 2; display: flex; align-items: flex-start; justify-content: space-between; }
    .page-header-text h1 { font-size: 26px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .page-header-text p { font-size: 14px; color: rgba(255,255,255,0.7); max-width: 520px; line-height: 1.6; }
    .header-stats { display: flex; gap: 14px; }
    .header-stat { background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.15); border-radius: 14px; padding: 14px 20px; text-align: center; min-width: 105px; }
    .header-stat .stat-num { font-size: 24px; font-weight: 800; color: #fff; line-height: 1; }
    .header-stat .stat-label { font-size: 11px; color: rgba(255,255,255,0.65); margin-top: 4px; font-weight: 500; }


    /* ================================================================
       TABLE SECTION
       ================================================================ */
    .table-section { padding: 28px 32px 40px; flex: 1; }
    .table-toolbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; gap: 12px; flex-wrap: wrap; }
    .table-toolbar-left { display: flex; align-items: center; gap: 10px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 9px 14px; min-width: 260px; transition: all 0.2s; }
    .search-box:focus-within { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .search-box .search-icon { color: #94a3b8; font-size: 16px; flex-shrink: 0; }
    .search-box input { border: none; outline: none; font-size: 13px; font-family: 'Inter', sans-serif; color: #1e293b; background: transparent; width: 100%; }
    .search-box input::placeholder { color: #94a3b8; }
    .filter-btn { display: flex; align-items: center; gap: 6px; padding: 9px 16px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; font-size: 13px; font-weight: 500; color: #475569; cursor: pointer; font-family: 'Inter', sans-serif; transition: all 0.2s; }
    .filter-btn:hover { background: #f8fafc; border-color: #cbd5e1; }
    .filter-btn.active { background: #eff6ff; border-color: #bfdbfe; color: #2563eb; }
    .filter-btn .filter-icon { font-size: 16px; color: #94a3b8; }

    .table-wrapper { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.04); }
    .table-scroll { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; min-width: 900px; }
    thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
    thead th { padding: 14px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #64748b; text-align: left; white-space: nowrap; }
    tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #f8fafc; }
    tbody td { padding: 14px 16px; font-size: 13px; color: #334155; vertical-align: top; }

    .col-no { font-weight: 600; color: #94a3b8; text-align: center; width: 45px; }

    .nama-cell { min-width: 150px; }
    .nama-text { font-weight: 600; color: #1e293b; font-size: 13.5px; }
    .nim-text { font-size: 12px; color: #94a3b8; font-weight: 500; margin-top: 1px; }

    .topik-cell { min-width: 160px; }
    .topik-text { font-weight: 600; color: #1e293b; font-size: 13px; line-height: 1.4; }

    /* Bukti cell */
    .bukti-cell { min-width: 120px; }
    .btn-bukti {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 7px 14px; border-radius: 8px;
      border: 1px solid #e2e8f0; background: #fff;
      font-size: 12px; font-weight: 600; color: #2563eb;
      cursor: pointer; font-family: 'Inter', sans-serif;
      transition: all 0.2s; text-decoration: none;
    }
    .btn-bukti:hover { background: #eff6ff; border-color: #bfdbfe; }
    .btn-bukti .bukti-icon { font-size: 14px; }

    /* Deskripsi cell */
    .deskripsi-cell { min-width: 200px; max-width: 260px; }
    .deskripsi-text {
      font-size: 12.5px; color: #64748b; line-height: 1.5;
      display: -webkit-box; -webkit-line-clamp: 3;
      -webkit-box-orient: vertical; overflow: hidden;
    }

    /* Status cell */
    .status-cell { min-width: 200px; }
    .status-approve-group { display: flex; gap: 6px; }
    .btn-approve {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 7px 14px; border-radius: 8px; border: none;
      font-size: 12px; font-weight: 700; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.2s; white-space: nowrap;
    }
    .btn-approve.acc {
      background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0;
    }
    .btn-approve.acc:hover { background: #bbf7d0; }
    .btn-approve.rej {
      background: #fee2e2; color: #dc2626; border: 1px solid #fecaca;
    }
    .btn-approve.rej:hover { background: #fecaca; }

    .status-final {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 5px 12px; border-radius: 8px;
      font-size: 12px; font-weight: 700;
    }
    .status-final.approved { background: #dcfce7; color: #16a34a; }
    .status-final.rejected { background: #fee2e2; color: #dc2626; }

    .table-footer {
      padding: 14px 18px; border-top: 1px solid #f1f5f9;
      display: flex; align-items: center; justify-content: space-between;
      font-size: 12px; color: #94a3b8; background: #fafbfc;
    }
    .table-footer-info strong { color: #475569; }


    /* ================================================================
       PDF MODAL
       ================================================================ */
    .pdf-overlay {
      position: fixed; inset: 0; z-index: 200;
      background: rgba(15,23,42,0.6); backdrop-filter: blur(4px);
      display: none; align-items: center; justify-content: center;
      padding: 24px;
    }
    .pdf-overlay.show { display: flex; }

    .pdf-modal {
      background: #fff; border-radius: 20px;
      width: 100%; max-width: 780px; max-height: 90vh;
      display: flex; flex-direction: column;
      box-shadow: 0 25px 60px rgba(0,0,0,0.3);
      overflow: hidden;
      animation: modalIn 0.25s ease;
    }
    @keyframes modalIn {
      from { opacity: 0; transform: scale(0.95) translateY(10px); }
      to { opacity: 1; transform: scale(1) translateY(0); }
    }

    .pdf-modal-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 18px 24px; border-bottom: 1px solid #e2e8f0;
      background: #f8fafc;
    }
    .pdf-modal-title {
      display: flex; align-items: center; gap: 10px;
      font-size: 15px; font-weight: 700; color: #1e293b;
    }
    .pdf-modal-title .pdf-icon {
      width: 34px; height: 34px; border-radius: 9px;
      background: #fee2e2; display: flex; align-items: center; justify-content: center;
      font-size: 16px;
    }
    .pdf-modal-subtitle { font-size: 12px; color: #94a3b8; font-weight: 500; }
    .pdf-modal-close {
      width: 36px; height: 36px; border-radius: 10px;
      border: 1px solid #e2e8f0; background: #fff;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; color: #64748b; font-size: 18px;
      transition: all 0.2s;
    }
    .pdf-modal-close:hover { background: #fef2f2; color: #dc2626; border-color: #fecaca; }

    .pdf-modal-body { flex: 1; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center; position: relative; min-height: 400px; }
    .pdf-modal-body iframe { width: 100%; height: 100%; min-height: 500px; border: none; }
    .pdf-placeholder {
      text-align: center; padding: 40px;
    }
    .pdf-placeholder-icon {
      width: 80px; height: 80px; border-radius: 20px;
      background: linear-gradient(135deg, #fee2e2, #fecaca);
      border: 1px solid #fca5a5;
      display: flex; align-items: center; justify-content: center;
      font-size: 36px; margin: 0 auto 16px;
    }
    .pdf-placeholder h3 { font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
    .pdf-placeholder p { font-size: 13px; color: #94a3b8; }
    .pdf-placeholder .pdf-filename {
      display: inline-flex; align-items: center; gap: 5px;
      margin-top: 12px; padding: 6px 14px; border-radius: 8px;
      background: #fff; border: 1px solid #e2e8f0;
      font-size: 12px; font-weight: 600; color: #475569;
    }

    .pdf-modal-footer {
      padding: 14px 24px; border-top: 1px solid #e2e8f0;
      display: flex; align-items: center; justify-content: space-between;
      background: #f8fafc;
    }
    .pdf-modal-info { font-size: 12px; color: #94a3b8; font-weight: 500; }
    .pdf-modal-actions { display: flex; gap: 8px; }
    .btn-pdf-action {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 8px 16px; border-radius: 9px; border: none;
      font-size: 12px; font-weight: 700; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.2s;
    }
    .btn-pdf-action.download { background: linear-gradient(135deg, #3b82f6, #2563eb); color: #fff; box-shadow: 0 2px 8px rgba(37,99,235,0.2); }
    .btn-pdf-action.download:hover { box-shadow: 0 4px 14px rgba(37,99,235,0.3); transform: translateY(-1px); }
    .btn-pdf-action.close-modal { background: #fff; color: #475569; border: 1px solid #e2e8f0; }
    .btn-pdf-action.close-modal:hover { background: #f8fafc; }


    /* ================================================================
       CONFIRM DIALOG
       ================================================================ */
    .confirm-overlay {
      position: fixed; inset: 0; z-index: 300;
      background: rgba(15,23,42,0.6); backdrop-filter: blur(4px);
      display: none; align-items: center; justify-content: center; padding: 24px;
    }
    .confirm-overlay.show { display: flex; }

    .confirm-dialog {
      background: #fff; border-radius: 20px;
      width: 100%; max-width: 400px; padding: 32px;
      text-align: center;
      box-shadow: 0 25px 60px rgba(0,0,0,0.3);
      animation: modalIn 0.25s ease;
    }
    .confirm-icon {
      width: 64px; height: 64px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 30px; margin: 0 auto 20px;
    }
    .confirm-icon.green { background: #dcfce7; border: 2px solid #bbf7d0; }
    .confirm-icon.red { background: #fee2e2; border: 2px solid #fecaca; }
    .confirm-dialog h3 { font-size: 18px; font-weight: 800; color: #1e293b; margin-bottom: 8px; }
    .confirm-dialog p { font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 24px; }
    .confirm-dialog p strong { color: #1e293b; font-weight: 600; }
    .confirm-actions { display: flex; gap: 10px; }
    .confirm-btn {
      flex: 1; padding: 12px 20px; border-radius: 11px; border: none;
      font-size: 13.5px; font-weight: 700; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.2s;
    }
    .confirm-btn.cancel { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
    .confirm-btn.cancel:hover { background: #e2e8f0; }
    .confirm-btn.yes-green { background: linear-gradient(135deg, #22c55e, #16a34a); color: #fff; box-shadow: 0 2px 8px rgba(22,163,74,0.25); }
    .confirm-btn.yes-green:hover { box-shadow: 0 4px 14px rgba(22,163,74,0.35); transform: translateY(-1px); }
    .confirm-btn.yes-red { background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff; box-shadow: 0 2px 8px rgba(220,38,38,0.25); }
    .confirm-btn.yes-red:hover { box-shadow: 0 4px 14px rgba(220,38,38,0.35); transform: translateY(-1px); }


    /* ================================================================
       TOAST
       ================================================================ */
    .toast-container {
      position: fixed; top: 80px; right: 24px; z-index: 400;
      display: flex; flex-direction: column; gap: 10px;
    }
    .toast {
      display: flex; align-items: center; gap: 10px;
      padding: 14px 20px; border-radius: 14px;
      background: #fff; border: 1px solid #e2e8f0;
      box-shadow: 0 8px 30px rgba(0,0,0,0.12);
      animation: toastIn 0.35s ease;
      min-width: 300px;
    }
    @keyframes toastIn { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }
    .toast-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
    .toast-icon.green { background: #dcfce7; }
    .toast-icon.red { background: #fee2e2; }
    .toast-text { font-size: 13px; font-weight: 600; color: #1e293b; }
    .toast-sub { font-size: 11.5px; color: #94a3b8; font-weight: 500; margin-top: 1px; }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 1100px) { .header-stats { display: none; } }
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .page-header { padding: 24px 20px 28px; }
      .page-header-text h1 { font-size: 20px; }
      .table-section { padding: 20px 16px 32px; }
      .topbar { padding: 12px 16px; }
      .search-box { min-width: 180px; }
      .pdf-modal { max-width: 95vw; }
    }
  </style>
</head>

<body>
<div class="layout">

  <!-- ==================== SIDEBAR ==================== -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">E</div>
      <div>
        <div class="brand-text">E-Tutor</div>
        <div class="brand-sub">Sistem Tutoring</div>
      </div>
    </div>
      <details class="nav-parent kaprodi" open>
        <summary><span class="nav-icon">🛡️</span> Menu Kaprodi <span class="chevron">▶</span></summary>
        <div class="nav-children">
          <a class="nav-child active" href="#">Verifikasi Pengajuan</a>
        </div>
      </details>

    <div class="sidebar-footer">
      <div class="user-card">
        <div class="user-avatar">DR</div>
        <div class="user-info">
          <div class="user-name">Dr. Rina Susanti</div>
          <div class="user-role">Kaprodi - MI</div>
        </div>
      </div>
    </div>
  </aside>


  <!-- ==================== MAIN CONTENT ==================== -->
  <main class="main-content">

    <div class="topbar">
      <a href="#" class="topbar-brand">
        <div class="topbar-brand-icon">E</div>
        <div>
          <div class="topbar-brand-text">E-Tutor</div>
          <span class="topbar-brand-sub">Sistem Tutoring</span>
        </div>
      </a>
      <div class="topbar-right">
        <button class="topbar-btn">🔔<span class="notif-dot"></span></button>
      </div>
    </div>

    <!-- Page Header -->
    <div class="page-header">
      <div class="page-header-inner">
        <div class="page-header-text">
          <h1>Halaman Verifikasi Pengajuan Tutor</h1>
          <p>Periksa dan verifikasi pengajuan dari mahasiswa yang ingin menjadi E-Tutor. Pastikan bukti dan deskripsi sudah memenuhi syarat.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat"><div class="stat-num">5</div><div class="stat-label">Total Pengajuan</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#86efac">2</div><div class="stat-label">Disetujui</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#fde047">3</div><div class="stat-label">Menunggu</div></div>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="table-section">
      <div class="table-toolbar">
        <div class="table-toolbar-left">
          <div class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Cari nama, NIM, atau topik...">
          </div>
          <button class="filter-btn active"><span class="filter-icon">🔽</span> Semua</button>
          <button class="filter-btn"><span class="filter-icon">⏳</span> Menunggu</button>
          <button class="filter-btn"><span class="filter-icon">✅</span> Disetujui</button>
          <button class="filter-btn"><span class="filter-icon">❌</span> Ditolak</button>
        </div>
      </div>
      
      <div class="table-wrapper">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th class="col-no">No</th>
                <th>Nama / NIM</th>
                <th>Topik Pembahasan</th>
                <th>Bukti</th>
                <th>Deskripsi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($applications as $index => $app)
              <tr id="row-{{ $app->id }}">
                <td class="col-no">{{ $index + 1 }}</td>
                <td class="nama-cell">
                  <div class="nama-text">{{ $app->nama }}</div>
                  <div class="nim-text">{{ $app->nim }}</div>
                </td>
                <td class="topik-cell">
                  <div class="topik-text">{{ $app->topik_pembahasan }}</div>
                </td>
                <td class="bukti-cell">
                  <a href="{{ Storage::url($app->bukti_memenuhi) }}" target="_blank" class="btn-bukti">
                    <span class="bukti-icon">📄</span> Lihat Berkas
                  </a>
                </td>
                <td class="deskripsi-cell">
                  <div class="deskripsi-text">{{ $app->deskripsi_job }}</div>
                </td>
                <td class="status-cell">
                  @if($app->status === 'pending')
                  <div class="status-approve-group">
                    <form action="/acc-pengajuan/{{ $app->id }}/approve" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" class="btn-approve acc">✓ Setujui</button>
                    </form>
                    <form action="/acc-pengajuan/{{ $app->id }}/reject" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" class="btn-approve rej">✗ Tolak</button>
                    </form>
                  </div>
                  @elseif($app->status === 'approved')
                  <span class="status-final approved">✓ Disetujui</span>
                  @else
                  <span class="status-final rejected">✗ Ditolak</span>
                  @endif
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">Belum ada pengajuan tutor.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="table-footer">
          <div class="table-footer-info">Menampilkan <strong>{{ $applications->count() }}</strong> pengajuan</div>
        </div>
      </div>
    </div>

  </main>
</div>


<!-- ==================== PDF MODAL ==================== -->
<div class="pdf-overlay" id="pdfOverlay" onclick="closePdfOutside(event)">
  <div class="pdf-modal">
    <div class="pdf-modal-header">
      <div class="pdf-modal-title">
        <div class="pdf-icon">📄</div>
        <div>
          <div id="pdfTitle">Bukti Pengajuan</div>
          <div class="pdf-modal-subtitle" id="pdfSubtitle">NIM: —</div>
        </div>
      </div>
      <button class="pdf-modal-close" onclick="closePdf()">✕</button>
    </div>
    <div class="pdf-modal-body">
      <div class="pdf-placeholder" id="pdfPlaceholder">
        <div class="pdf-placeholder-icon">📄</div>
        <h3>Preview Berkas</h3>
        <p>File PDF akan ditampilkan di sini saat terhubung ke backend</p>
        <div class="pdf-filename" id="pdfFilename">📎 bukti_rizky_firmansyah.pdf</div>
      </div>
    </div>
    <div class="pdf-modal-footer">
      <div class="pdf-modal-info" id="pdfInfo">PDF — 2.4 MB</div>
      <div class="pdf-modal-actions">
        <button class="btn-pdf-action download" onclick="showToast('green','Download Dimulai','File sedang diunduh...')">⬇ Download</button>
        <button class="btn-pdf-action close-modal" onclick="closePdf()">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- ==================== CONFIRM DIALOG ==================== -->
<div class="confirm-overlay" id="confirmOverlay">
  <div class="confirm-dialog">
    <div class="confirm-icon" id="confirmIcon">✓</div>
    <h3 id="confirmTitle">Setujui Pengajuan?</h3>
    <p id="confirmText">Apakah Anda yakin ingin <strong id="confirmAction">menyetujui</strong> pengajuan dari <strong id="confirmName">—</strong>?</p>
    <div class="confirm-actions">
      <button class="confirm-btn cancel" onclick="closeConfirm()">Batal</button>
      <button class="confirm-btn" id="confirmYes" onclick="executeAction()">Ya, Lanjutkan</button>
    </div>
  </div>
</div>


<!-- ==================== TOAST CONTAINER ==================== -->
<div class="toast-container" id="toastContainer"></div>


<script>
  let currentAction = '';
  let currentRow = '';

  // ========== PDF MODAL ==========
  function openPdf(name, filename, nim) {
    document.getElementById('pdfTitle').textContent = 'Bukti Pengajuan — ' + name;
    document.getElementById('pdfSubtitle').textContent = 'NIM: ' + nim;
    document.getElementById('pdfFilename').textContent = '📎 ' + filename;
    document.getElementById('pdfOverlay').classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closePdf() {
    document.getElementById('pdfOverlay').classList.remove('show');
    document.body.style.overflow = '';
  }

  function closePdfOutside(e) {
    if (e.target === document.getElementById('pdfOverlay')) closePdf();
  }

  // ========== CONFIRM DIALOG ==========
  function openConfirm(type, row, name) {
    currentAction = type;
    currentRow = row;
    const overlay = document.getElementById('confirmOverlay');
    const icon = document.getElementById('confirmIcon');
    const title = document.getElementById('confirmTitle');
    const text = document.getElementById('confirmText');
    const action = document.getElementById('confirmAction');
    const nameEl = document.getElementById('confirmName');
    const yesBtn = document.getElementById('confirmYes');

    if (type === 'acc') {
      icon.className = 'confirm-icon green';
      icon.textContent = '✓';
      title.textContent = 'Setujui Pengajuan?';
      action.textContent = 'menyetujui';
      yesBtn.className = 'confirm-btn yes-green';
      yesBtn.textContent = 'Ya, Setujui';
    } else {
      icon.className = 'confirm-icon red';
      icon.textContent = '✗';
      title.textContent = 'Tolak Pengajuan?';
      action.textContent = 'menolak';
      yesBtn.className = 'confirm-btn yes-red';
      yesBtn.textContent = 'Ya, Tolak';
    }
    nameEl.textContent = name;
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeConfirm() {
    document.getElementById('confirmOverlay').classList.remove('show');
    document.body.style.overflow = '';
  }

  function executeAction() {
    const row = document.getElementById('row-' + currentRow);
    const statusCell = row.querySelector('.status-cell');
    const name = row.querySelector('.nama-text').textContent;

    if (currentAction === 'acc') {
      statusCell.innerHTML = '<span class="status-final approved">✓ Disetujui</span>';
      row.style.opacity = '0';
      setTimeout(() => { row.style.opacity = '1'; row.style.transition = 'opacity 0.4s'; }, 0);
      showToast('green', 'Pengajuan Disetujui', name + ' telah disetujui sebagai E-Tutor');
    } else {
      statusCell.innerHTML = '<span class="status-final rejected">✗ Ditolak</span>';
      row.style.opacity = '0';
      setTimeout(() => { row.style.opacity = '1'; row.style.transition = 'opacity 0.4'; }, 0);
      showToast('red', 'Pengajuan Ditolak', 'Pengajuan dari ' + name + ' telah ditolak');
    }
    closeConfirm();
  }

  // ========== TOAST ==========
  function showToast(type, title, sub) {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML =
      '<div class="toast-icon ' + type + '">' + (type === 'green' ? '✓' : '✗') + '</div>' +
      '<div><div class="toast-text">' + title + '</div><div class="toast-sub">' + sub + '</div></div>';
    container.appendChild(toast);
    setTimeout(() => { toast.style.opacity = '0'; toast.style.transform = 'translateX(40px)'; toast.style.transition = 'all 0.3s'; }, 3000);
    setTimeout(() => { toast.remove(); }, 3400);
  }

  // ========== KEYBOARD ==========
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { closePdf(); closeConfirm(); }
  });

  // ========== FILTER BUTTONS ==========
  document.querySelectorAll('.filter-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
      btn.classList.add('active');
    });
  });
</script>

</body>
</html>