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
    .nav-child.active { color: #fff; background: rgba(59,130,246,0.15); font-weight: 600; }
    .nav-child.active::before { background: #3b82f6; box-shadow: 0 0 6px rgba(59,130,246,0.5); width: 6px; height: 6px; }
    .notif-badge {
      margin-left: auto; display: inline-flex; align-items: center; justify-content: center;
      min-width: 20px; height: 20px; padding: 0 6px;
      border-radius: 10px; background: #ef4444; color: #fff; font-size: 10px; font-weight: 700;
    }
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; flex-shrink: 0; }
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
    .topbar-avatar { width: 30px; height: 30px; border-radius: 8px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 11px; color: #fff; }
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
    .page-header-text p { font-size: 14px; color: rgba(255,255,255,0.7); max-width: 540px; line-height: 1.6; }
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
    table { width: 100%; border-collapse: collapse; min-width: 1050px; }
    thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
    thead th { padding: 14px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #64748b; text-align: left; white-space: nowrap; }
    tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #f8fafc; }
    tbody tr.row-flash-green { animation: flashGreen 0.6s ease; }
    tbody tr.row-flash-red { animation: flashRed 0.6s ease; }
    @keyframes flashGreen { 0% { background: #dcfce7; } 100% { background: transparent; } }
    @keyframes flashRed { 0% { background: #fee2e2; } 100% { background: transparent; } }
    tbody td { padding: 14px 16px; font-size: 13px; color: #334155; vertical-align: top; }
    .col-no { font-weight: 600; color: #94a3b8; text-align: center; width: 45px; }

    .nama-cell { min-width: 145px; }
    .nama-text { font-weight: 600; color: #1e293b; font-size: 13.5px; }
    .nim-text { font-size: 12px; color: #94a3b8; font-weight: 500; margin-top: 1px; }
    .topik-cell { min-width: 135px; }
    .topik-text { font-weight: 600; color: #1e293b; font-size: 13px; line-height: 1.4; }

    /* ================================================================
       SURAT SKILLS — Kolom Utama
       ================================================================ */
    .skill-cell { min-width: 230px; }
    .skill-counter {
      display: flex; align-items: center; gap: 8px;
      margin-bottom: 10px;
    }
    .skill-counter-num {
      font-size: 22px; font-weight: 800; line-height: 1;
    }
    .skill-counter-num.low { color: #64748b; }
    .skill-counter-num.mid { color: #2563eb; }
    .skill-counter-num.high { color: #16a34a; }
    .skill-counter-label { font-size: 11px; color: #94a3b8; font-weight: 500; line-height: 1.3; }

    .skill-bar-wrap { margin-bottom: 10px; }
    .skill-bar-bg {
      width: 100%; height: 6px; background: #f1f5f9;
      border-radius: 20px; overflow: hidden;
    }
    .skill-bar-fill {
      height: 100%; border-radius: 20px;
      transition: width 0.5s ease;
    }
    .skill-bar-fill.low { background: linear-gradient(90deg, #94a3b8, #cbd5e1); }
    .skill-bar-fill.mid { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
    .skill-bar-fill.high { background: linear-gradient(90deg, #22c55e, #4ade80); }

    .skill-badges {
      display: flex; flex-wrap: wrap; gap: 4px;
    }
    .skill-tag {
      display: inline-flex; align-items: center; gap: 3px;
      padding: 3px 8px; border-radius: 6px;
      font-size: 10.5px; font-weight: 600;
      border: 1px solid; white-space: nowrap;
    }
    .skill-tag.approved {
      background: #f0fdf4; color: #16a34a; border-color: #bbf7d0;
    }
    .skill-tag.pending {
      background: #fefce8; color: #a16207; border-color: #fef08a;
    }
    .skill-tag.new {
      background: #eff6ff; color: #2563eb; border-color: #bfdbfe;
    }

    /* Bukti cell */
    .bukti-cell { min-width: 110px; }
    .btn-bukti {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 7px 14px; border-radius: 8px;
      border: 1px solid #e2e8f0; background: #fff;
      font-size: 12px; font-weight: 600; color: #2563eb;
      cursor: pointer; font-family: 'Inter', sans-serif;
      transition: all 0.2s; text-decoration: none;
    }
    .btn-bukti:hover { background: #eff6ff; border-color: #bfdbfe; }

    /* Status cell */
    .status-cell { min-width: 200px; }
    .status-approve-group { display: flex; gap: 6px; }
    .btn-approve {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 7px 14px; border-radius: 8px; border: none;
      font-size: 12px; font-weight: 700; font-family: 'Inter', sans-serif;
      cursor: pointer; transition: all 0.2s; white-space: nowrap;
    }
    .btn-approve.acc { background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0; }
    .btn-approve.acc:hover { background: #bbf7d0; transform: translateY(-1px); box-shadow: 0 2px 8px rgba(22,163,74,0.2); }
    .btn-approve.rej { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
    .btn-approve.rej:hover { background: #fecaca; transform: translateY(-1px); box-shadow: 0 2px 8px rgba(220,38,38,0.2); }

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
      display: none; align-items: center; justify-content: center; padding: 24px;
    }
    .pdf-overlay.show { display: flex; }
    .pdf-modal {
      background: #fff; border-radius: 20px;
      width: 100%; max-width: 780px; max-height: 90vh;
      display: flex; flex-direction: column;
      box-shadow: 0 25px 60px rgba(0,0,0,0.3); overflow: hidden;
      animation: modalIn 0.25s ease;
    }
    @keyframes modalIn { from { opacity: 0; transform: scale(0.95) translateY(10px); } to { opacity: 1; transform: scale(1) translateY(0); } }
    .pdf-modal-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 18px 24px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;
    }
    .pdf-modal-title { display: flex; align-items: center; gap: 10px; font-size: 15px; font-weight: 700; color: #1e293b; }
    .pdf-modal-title .pdf-icon { width: 34px; height: 34px; border-radius: 9px; background: #eff6ff; border: 1px solid #bfdbfe; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    .pdf-modal-subtitle { font-size: 12px; color: #94a3b8; font-weight: 500; }
    .pdf-modal-close { width: 36px; height: 36px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #64748b; font-size: 18px; transition: all 0.2s; }
    .pdf-modal-close:hover { background: #fef2f2; color: #dc2626; border-color: #fecaca; }
    .pdf-modal-body { flex: 1; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center; min-height: 400px; }
    .pdf-modal-body iframe { width: 100%; height: 100%; min-height: 500px; border: none; }
    .pdf-placeholder { text-align: center; padding: 40px; }
    .pdf-placeholder-icon { width: 80px; height: 80px; border-radius: 20px; background: linear-gradient(135deg, #eff6ff, #dbeafe); border: 1px solid #bfdbfe; display: flex; align-items: center; justify-content: center; font-size: 36px; margin: 0 auto 16px; }
    .pdf-placeholder h3 { font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
    .pdf-placeholder p { font-size: 13px; color: #94a3b8; }
    .pdf-filename { display: inline-flex; align-items: center; gap: 5px; margin-top: 12px; padding: 6px 14px; border-radius: 8px; background: #fff; border: 1px solid #e2e8f0; font-size: 12px; font-weight: 600; color: #475569; }
    .pdf-modal-footer { padding: 14px 24px; border-top: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; background: #f8fafc; }
    .pdf-modal-info { font-size: 12px; color: #94a3b8; font-weight: 500; }
    .pdf-modal-actions { display: flex; gap: 8px; }
    .btn-pdf-action { display: inline-flex; align-items: center; gap: 5px; padding: 8px 16px; border-radius: 9px; border: none; font-size: 12px; font-weight: 700; font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.2s; }
    .btn-pdf-action.download { background: linear-gradient(135deg, #3b82f6, #2563eb); color: #fff; box-shadow: 0 2px 8px rgba(37,99,235,0.2); }
    .btn-pdf-action.download:hover { box-shadow: 0 4px 14px rgba(37,99,235,0.3); transform: translateY(-1px); }
    .btn-pdf-action.close-modal { background: #fff; color: #475569; border: 1px solid #e2e8f0; }
    .btn-pdf-action.close-modal:hover { background: #f8fafc; }

    /* ================================================================
       CONFIRM DIALOG
       ================================================================ */
    .confirm-overlay { position: fixed; inset: 0; z-index: 300; background: rgba(15,23,42,0.6); backdrop-filter: blur(4px); display: none; align-items: center; justify-content: center; padding: 24px; }
    .confirm-overlay.show { display: flex; }
    .confirm-dialog { background: #fff; border-radius: 20px; width: 100%; max-width: 420px; padding: 32px; text-align: center; box-shadow: 0 25px 60px rgba(0,0,0,0.3); animation: modalIn 0.25s ease; }
    .confirm-icon { width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 20px; }
    .confirm-icon.green { background: #dcfce7; border: 2px solid #bbf7d0; }
    .confirm-icon.red { background: #fee2e2; border: 2px solid #fecaca; }
    .confirm-dialog h3 { font-size: 18px; font-weight: 800; color: #1e293b; margin-bottom: 8px; }
    .confirm-dialog p { font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 24px; }
    .confirm-dialog p strong { color: #1e293b; font-weight: 600; }
    .confirm-actions { display: flex; gap: 10px; }
    .confirm-btn { flex: 1; padding: 12px 20px; border-radius: 11px; border: none; font-size: 13.5px; font-weight: 700; font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.2s; }
    .confirm-btn.cancel { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
    .confirm-btn.cancel:hover { background: #e2e8f0; }
    .confirm-btn.yes-green { background: linear-gradient(135deg, #22c55e, #16a34a); color: #fff; box-shadow: 0 2px 8px rgba(22,163,74,0.25); }
    .confirm-btn.yes-green:hover { box-shadow: 0 4px 14px rgba(22,163,74,0.35); transform: translateY(-1px); }
    .confirm-btn.yes-red { background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff; box-shadow: 0 2px 8px rgba(220,38,38,0.25); }
    .confirm-btn.yes-red:hover { box-shadow: 0 4px 14px rgba(220,38,38,0.35); transform: translateY(-1px); }

    /* ================================================================
       TOAST
       ================================================================ */
    .toast-container { position: fixed; top: 80px; right: 24px; z-index: 400; display: flex; flex-direction: column; gap: 10px; }
    .toast { display: flex; align-items: center; gap: 10px; padding: 14px 20px; border-radius: 14px; background: #fff; border: 1px solid #e2e8f0; box-shadow: 0 8px 30px rgba(0,0,0,0.12); animation: toastIn 0.35s ease; min-width: 330px; }
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
      <details class="nav-parent admin" open>
        <summary><span class="nav-icon">⚙️</span> Menu Admin <span class="chevron">▶</span></summary>
        <div class="nav-children">
          <a class="nav-child active" href="#">Verifikasi Surat Skills</a>
          
        </div>
      </details>
      <div class="nav-separator"></div>
      
      <a class="nav-item" href="#" style="color:#f87171;"><span class="nav-icon">🚪</span> Log Out</a>
    </nav>
    <div class="sidebar-footer">
        @auth
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{ Auth::user()->role }}</div>
            </div>
        </div>
        <form action="/logout" method="POST" style="margin-top: 10px;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
        @endauth


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
          <h1>Halaman Verifikasi Surat Skills</h1>
          <p>Verifikasi bukti mengajar dari tutor untuk penerbitan surat skills. Semakin aktif mengajar, semakin banyak skills yang didapatkan.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat"><div class="stat-num">6</div><div class="stat-label">Total Permohonan</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#86efac">3</div><div class="stat-label">Disetujui</div></div>
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
            <input type="text" placeholder="Cari nama tutor, NIM, atau topik...">
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
                <th>Nama Tutor / NIM</th>
                <th>Topik yang Diajar</th>
                <th>Surat Skills</th>
                <th>Bukti Mengajar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

              <!-- Row 1 — Menunggu, 2 skills, pengajuan baru -->
              <tr id="row-1">
                <td class="col-no">1</td>
                <td class="nama-cell">
                  <div class="nama-text">Rizky Firmansyah</div>
                  <div class="nim-text">2023015</div>
                </td>
                <td class="topik-cell"><div class="topik-text">Teori Graf & Pohon (Tree)</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num mid">2</span>
                    <span class="skill-counter-label">dari 10 skills</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill mid" style="width:20%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ Graf BFS/DFS</span>
                    <span class="skill-tag approved">✓ Pohon Biner</span>
                    <span class="skill-tag new">+ Pohon AVL</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Rizky Firmansyah','bukti_mengajar_rizky_3.pdf','2023015')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <div class="status-approve-group">
                    <button class="btn-approve acc" onclick="openConfirm('acc',1,'Rizky Firmansyah','Pohon AVL')">✓ Setujui</button>
                    <button class="btn-approve rej" onclick="openConfirm('rej',1,'Rizky Firmansyah','Pohon AVL')">✗ Tolak</button>
                  </div>
                </td>
              </tr>

              <!-- Row 2 — Disetujui, 7 skills -->
              <tr id="row-2">
                <td class="col-no">2</td>
                <td class="nama-cell">
                  <div class="nama-text">Udin Saputra</div>
                  <div class="nim-text">2022008</div>
                </td>
                <td class="topik-cell"><div class="topik-text">Distribusi Normal & Aplikasinya</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num high">7</span>
                    <span class="skill-counter-label">dari 10 skills</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill high" style="width:70%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ Distribusi</span>
                    <span class="skill-tag approved">✓ Normal Std</span>
                    <span class="skill-tag approved">✓ Z-Score</span>
                    <span class="skill-tag approved">✓ Sampling</span>
                    <span class="skill-tag approved">✓ Uji Hipotesis</span>
                    <span class="skill-tag approved">✓ Regresi</span>
                    <span class="skill-tag approved">✓ Korelasi</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Udin Saputra','bukti_mengajar_udin_7.pdf','2022008')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <span class="status-final approved">✓ Disetujui</span>
                </td>
              </tr>

              <!-- Row 3 — Menunggu, 3 skills -->
              <tr id="row-3">
                <td class="col-no">3</td>
                <td class="nama-cell">
                  <div class="nama-text">Siti Aminah</div>
                  <div class="nim-text">2023023</div>
                </td>
                <td class="topik-cell"><div class="topik-text">CRUD dengan PHP & MySQL</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num mid">3</span>
                    <span class="skill-counter-label">dari 10 skills</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill mid" style="width:30%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ CRUD Dasar</span>
                    <span class="skill-tag approved">✓ Koneksi DB</span>
                    <span class="skill-tag new">+ Autentikasi</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Siti Aminah','bukti_mengajar_siti_3.pdf','2023023')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <div class="status-approve-group">
                    <button class="btn-approve acc" onclick="openConfirm('acc',3,'Siti Aminah','Autentikasi')">✓ Setujui</button>
                    <button class="btn-approve rej" onclick="openConfirm('rej',3,'Siti Aminah','Autentikasi')">✗ Tolak</button>
                  </div>
                </td>
              </tr>

              <!-- Row 4 — Disetujui, 10 skills (penuh!) -->
              <tr id="row-4">
                <td class="col-no">4</td>
                <td class="nama-cell">
                  <div class="nama-text">Fajar Nugroho</div>
                  <div class="nim-text">2022019</div>
                </td>
                <td class="topik-cell"><div class="topik-text">Algoritma Pembelajaran Mesin</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num high">10</span>
                    <span class="skill-counter-label">dari 10 skills — Lengkap!</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill high" style="width:100%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ Regresi Linear</span>
                    <span class="skill-tag approved">✓ Klasifikasi</span>
                    <span class="skill-tag approved">✓ Clustering</span>
                    <span class="skill-tag approved">✓ Neural Network</span>
                    <span class="skill-tag approved">+6 lainnya</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Fajar Nugroho','bukti_mengajar_fajar_full.pdf','2022019')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <span class="status-final approved">✓ Disetujui</span>
                </td>
              </tr>

              <!-- Row 5 — Menunggu, 1 skill (baru mulai) -->
              <tr id="row-5">
                <td class="col-no">5</td>
                <td class="nama-cell">
                  <div class="nama-text">Dewi Lestari</div>
                  <div class="nim-text">2023031</div>
                </td>
                <td class="topik-cell"><div class="topik-text">Normalisasi Database (1NF–3NF)</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num low">1</span>
                    <span class="skill-counter-label">dari 10 skills</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill low" style="width:10%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ Normalisasi 1NF</span>
                    <span class="skill-tag new">+ Normalisasi 2NF</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Dewi Lestari','bukti_mengajar_dewi_1.pdf','2023031')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <div class="status-approve-group">
                    <button class="btn-approve acc" onclick="openConfirm('acc',5,'Dewi Lestari','Normalisasi 2NF')">✓ Setujui</button>
                    <button class="btn-approve rej" onclick="openConfirm('rej',5,'Dewi Lestari','Normalisasi 2NF')">✗ Tolak</button>
                  </div>
                </td>
              </tr>

              <!-- Row 6 — Disetujui, 5 skills -->
              <tr id="row-6">
                <td class="col-no">6</td>
                <td class="nama-cell">
                  <div class="nama-text">Budi Santoso</div>
                  <div class="nim-text">2022042</div>
                </td>
                <td class="topik-cell"><div class="topik-text">Model OSI & Protokol TCP/IP</div></td>
                <td class="skill-cell">
                  <div class="skill-counter">
                    <span class="skill-counter-num mid">5</span>
                    <span class="skill-counter-label">dari 10 skills</span>
                  </div>
                  <div class="skill-bar-wrap">
                    <div class="skill-bar-bg"><div class="skill-bar-fill mid" style="width:50%"></div></div>
                  </div>
                  <div class="skill-badges">
                    <span class="skill-tag approved">✓ OSI Layer</span>
                    <span class="skill-tag approved">✓ TCP/IP</span>
                    <span class="skill-tag approved">✓ Subnetting</span>
                    <span class="skill-tag approved">✓ Routing</span>
                    <span class="skill-tag approved">✓ DNS</span>
                  </div>
                </td>
                <td class="bukti-cell">
                  <button class="btn-bukti" onclick="openPdf('Budi Santoso','bukti_mengajar_budi_5.pdf','2022042')">
                    <span>📄</span> Lihat Berkas
                  </button>
                </td>
                <td class="status-cell">
                  <span class="status-final approved">✓ Disetujui</span>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="table-footer">
          <div class="table-footer-info">Menampilkan <strong>1–6</strong> dari <strong>6</strong> permohonan</div>
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
          <div id="pdfTitle">Bukti Mengajar</div>
          <div class="pdf-modal-subtitle" id="pdfSubtitle">NIM: —</div>
        </div>
      </div>
      <button class="pdf-modal-close" onclick="closePdf()">✕</button>
    </div>
    <div class="pdf-modal-body">
      <div class="pdf-placeholder" id="pdfPlaceholder">
        <div class="pdf-placeholder-icon">📄</div>
        <h3>Preview Bukti Mengajar</h3>
        <p>File bukti mengajar akan ditampilkan di sini saat terhubung ke backend</p>
        <div class="pdf-filename" id="pdfFilename">📎 bukti_mengajar.pdf</div>
      </div>
    </div>
    <div class="pdf-modal-footer">
      <div class="pdf-modal-info" id="pdfInfo">PDF — 1.8 MB</div>
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
    <h3 id="confirmTitle">Setujui Surat Skills?</h3>
    <p id="confirmText">Apakah Anda yakin ingin <strong id="confirmAction">menyetujui</strong> surat skills "<strong id="confirmSkillName">—</strong>" untuk <strong id="confirmName">—</strong>?</p>
    <div class="confirm-actions">
      <button class="confirm-btn cancel" onclick="closeConfirm()">Batal</button>
      <button class="confirm-btn" id="confirmYes" onclick="executeAction()">Ya, Lanjutkan</button>
    </div>
  </div>
</div>


<!-- ==================== TOAST ==================== -->
<div class="toast-container" id="toastContainer"></div>


<script>
  var currentAction = '';
  var currentRow = '';
  var currentSkillTag = '';

  /* ===== PDF MODAL ===== */
  function openPdf(name, filename, nim) {
    document.getElementById('pdfTitle').textContent = 'Bukti Mengajar — ' + name;
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

  /* ===== CONFIRM DIALOG ===== */
  function openConfirm(type, row, name, skill) {
    currentAction = type;
    currentRow = row;
    currentSkillTag = skill;
    var overlay = document.getElementById('confirmOverlay');
    var icon = document.getElementById('confirmIcon');
    var title = document.getElementById('confirmTitle');
    var action = document.getElementById('confirmAction');
    var skillName = document.getElementById('confirmSkillName');
    var nameEl = document.getElementById('confirmName');
    var yesBtn = document.getElementById('confirmYes');

    if (type === 'acc') {
      icon.className = 'confirm-icon green';
      icon.textContent = '📜';
      title.textContent = 'Setujui Surat Skills?';
      action.textContent = 'menyetujui surat skills';
      yesBtn.className = 'confirm-btn yes-green';
      yesBtn.textContent = 'Ya, Setujui';
    } else {
      icon.className = 'confirm-icon red';
      icon.textContent = '✗';
      title.textContent = 'Tolak Surat Skills?';
      action.textContent = 'menolak surat skills';
      yesBtn.className = 'confirm-btn yes-red';
      yesBtn.textContent = 'Ya, Tolak';
    }
    skillName.textContent = skill;
    nameEl.textContent = name;
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
  }
  function closeConfirm() {
    document.getElementById('confirmOverlay').classList.remove('show');
    document.body.style.overflow = '';
  }

  function executeAction() {
    var row = document.getElementById('row-' + currentRow);
    var statusCell = row.querySelector('.status-cell');
    var name = row.querySelector('.nama-text').textContent;
    var skillCell = row.querySelector('.skill-cell');

    /* Ubah skill tag "new" menjadi "approved" */
    var newTags = skillCell.querySelectorAll('.skill-tag.new');
    newTags.forEach(function(tag) {
      tag.classList.remove('new');
      tag.classList.add('approved');
      var text = tag.textContent.replace('+ ', '✓ ');
      tag.textContent = text;
    });

    /* Naikkan counter */
    var counterNum = skillCell.querySelector('.skill-counter-num');
    var counterLabel = skillCell.querySelector('.skill-counter-label');
    var currentCount = parseInt(counterNum.textContent);
    var newCount = currentAction === 'acc' ? currentCount + 1 : currentCount;
    counterNum.textContent = newCount;
    if (newCount >= 8) counterNum.className = 'skill-counter-num high';
    else if (newCount >= 3) counterNum.className = 'skill-counter-num mid';
    else counterNum.className = 'skill-counter-num low';

    if (newCount >= 10) counterLabel.textContent = 'dari 10 skills — Lengkap!';
    else counterLabel.textContent = 'dari 10 skills';

    /* Naikkan bar */
    var barFill = skillCell.querySelector('.skill-bar-fill');
    barFill.style.width = (newCount * 10) + '%';
    if (newCount >= 8) barFill.className = 'skill-bar-fill high';
    else if (newCount >= 3) barFill.className = 'skill-bar-fill mid';
    else barFill.className = 'skill-bar-fill low';

    /* Ganti status */
    if (currentAction === 'acc') {
      statusCell.innerHTML = '<span class="status-final approved">✓ Disetujui</span>';
      row.classList.add('row-flash-green');
      setTimeout(function() { row.classList.remove('row-flash-green'); }, 700);
      showToast('green', 'Surat Skills Disetujui', 'Skill "' + currentSkillTag + '" untuk ' + name + ' telah disetujui (' + newCount + '/10)');
    } else {
      /* Kembalikan tag new */
      newTags.forEach(function(tag) {
        tag.classList.remove('approved');
        tag.classList.add('new');
        var text = tag.textContent.replace('✓ ', '+ ');
        tag.textContent = text;
      });
      counterNum.textContent = currentCount;
      if (currentCount >= 8) counterNum.className = 'skill-counter-num high';
      else if (currentCount >= 3) counterNum.className = 'skill-counter-num mid';
      else counterNum.className = 'skill-counter-num low';
      if (currentCount >= 10) counterLabel.textContent = 'dari 10 skills — Lengkap!';
      else counterLabel.textContent = 'dari 10 skills';
      barFill.style.width = (currentCount * 10) + '%';

      statusCell.innerHTML = '<span class="status-final rejected">✗ Ditolak</span>';
      row.classList.add('row-flash-red');
      setTimeout(function() { row.classList.remove('row-flash-red'); }, 700);
      showToast('red', 'Surat Skills Ditolak', 'Skill "' + currentSkillTag + '" untuk ' + name + ' ditolak');
    }
    closeConfirm();
  }

  /* ===== TOAST ===== */
  function showToast(type, title, sub) {
    var container = document.getElementById('toastContainer');
    var toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML =
      '<div class="toast-icon ' + type + '">' + (type === 'green' ? '📜' : '✗') + '</div>' +
      '<div><div class="toast-text">' + title + '</div><div class="toast-sub">' + sub + '</div></div>';
    container.appendChild(toast);
    setTimeout(function() {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(40px)';
      toast.style.transition = 'all 0.3s';
    }, 3000);
    setTimeout(function() { toast.remove(); }, 3400);
  }

  /* ===== KEYBOARD ===== */
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { closePdf(); closeConfirm(); }
  });

  /* ===== FILTER BUTTONS ===== */
  document.querySelectorAll('.filter-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
      btn.classList.add('active');
    });
  });
</script>

</body>
</html>