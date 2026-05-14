<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Pendaftaran Kelas</title>
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

    .nav-child:hover::before { background: #64748b; }

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

    .nav-separator {
      height: 1px;
      background: rgba(255,255,255,0.06);
      margin: 8px 14px;
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

    /* ========== PAGE CONTENT ========== */
    .page-content {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 32px;
    }

    /* ========== FORM CARD ========== */
    .form-card {
      width: 100%;
      max-width: 520px;
      background: linear-gradient(160deg, #1e3a5f 0%, #1e40af 50%, #2563eb 100%);
      border-radius: 20px;
      padding: 40px 36px 36px;
      position: relative;
      overflow: hidden;
      box-shadow:
        0 20px 60px rgba(30, 64, 175, 0.25),
        0 4px 20px rgba(0,0,0,0.08);
    }

    /* Decorative circles */
    .form-card::before {
      content: '';
      position: absolute;
      top: -80px;
      right: -60px;
      width: 220px;
      height: 220px;
      background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
      border-radius: 50%;
    }

    .form-card::after {
      content: '';
      position: absolute;
      bottom: -50px;
      left: -40px;
      width: 180px;
      height: 180px;
      background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
      border-radius: 50%;
    }

    .form-inner {
      position: relative;
      z-index: 2;
    }

    /* Form Header */
    .form-header {
      text-align: center;
      margin-bottom: 32px;
    }

    .form-header .form-icon {
      width: 56px;
      height: 56px;
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      font-size: 26px;
    }

    .form-header h1 {
      font-size: 22px;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.02em;
      margin-bottom: 6px;
    }

    .form-header p {
      font-size: 13px;
      color: rgba(255,255,255,0.6);
      font-weight: 400;
      line-height: 1.5;
    }

    /* Form Fields */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group:last-of-type {
      margin-bottom: 28px;
    }

    .form-label {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: rgba(255,255,255,0.7);
      margin-bottom: 8px;
    }

    .form-label .label-icon {
      font-size: 14px;
      opacity: 0.8;
    }

    .form-input,
    .form-select {
      width: 100%;
      padding: 13px 16px;
      border-radius: 12px;
      border: 1.5px solid rgba(255,255,255,0.15);
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(4px);
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      color: #fff;
      transition: all 0.25s ease;
      outline: none;
    }

    .form-input::placeholder {
      color: rgba(255,255,255,0.35);
    }

    .form-input:hover,
    .form-select:hover {
      border-color: rgba(255,255,255,0.3);
      background: rgba(255,255,255,0.1);
    }

    .form-input:focus,
    .form-select:focus {
      border-color: rgba(255,255,255,0.5);
      background: rgba(255,255,255,0.12);
      box-shadow: 0 0 0 3px rgba(255,255,255,0.08);
    }

    /* Number input - hide spinners */
    .form-input[type="number"]::-webkit-outer-spin-button,
    .form-input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .form-input[type="number"] {
      -moz-appearance: textfield;
    }

    /* Select styling */
    .form-select {
      cursor: pointer;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.5)' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      padding-right: 42px;
    }

    .form-select option {
      background: #1e293b;
      color: #fff;
      padding: 8px;
    }

    /* Input with icon */
    .input-wrapper {
      position: relative;
    }

    .input-wrapper .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      color: rgba(255,255,255,0.4);
      pointer-events: none;
      transition: color 0.2s;
    }

    .input-wrapper .form-input {
      padding-left: 44px;
    }

    .input-wrapper .form-input:focus ~ .input-icon,
    .input-wrapper .form-input:hover ~ .input-icon {
      color: rgba(255,255,255,0.65);
    }

    /* Helper text */
    .form-helper {
      font-size: 11px;
      color: rgba(255,255,255,0.4);
      margin-top: 5px;
      padding-left: 2px;
    }

    /* Submit Button */
    .btn-submit {
      width: 100%;
      padding: 15px 24px;
      border-radius: 13px;
      border: none;
      background: #fff;
      color: #1e40af;
      font-size: 15px;
      font-weight: 800;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      letter-spacing: 0.02em;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-submit:hover {
      background: #f0f9ff;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .btn-submit:active {
      transform: translateY(0);
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .btn-submit .btn-arrow {
      font-size: 16px;
      transition: transform 0.2s;
    }

    .btn-submit:hover .btn-arrow {
      transform: translateX(3px);
    }

    /* Form Footer note */
    .form-footer-note {
      text-align: center;
      margin-top: 20px;
      font-size: 11.5px;
      color: rgba(255,255,255,0.4);
      line-height: 1.6;
    }

    .form-footer-note a {
      color: rgba(255,255,255,0.7);
      text-decoration: underline;
      text-underline-offset: 2px;
    }

    .form-footer-note a:hover {
      color: #fff;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .page-content { padding: 24px 16px; }
      .form-card { padding: 32px 24px 28px; border-radius: 16px; }
      .form-header h1 { font-size: 19px; }
      .topbar { padding: 12px 16px; }
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
          <span>Pendaftaran Kelas</span>
        </div>
      </div>
      <div class="topbar-right">
        <a href="{{ route('notifications.index') }}" class="topbar-btn">
          🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
        </a>
      </div>
    </div>

    <!-- Form Page -->
    <div class="page-content">

      <div class="form-card">
        <div class="form-inner">

          <!-- Header -->
          <div class="form-header">
            <div class="form-icon">📝</div>
            <h1>Halaman Pendaftaran Kelas</h1>
            <p>Isi formulir berikut untuk mendaftar pada kelas tutor yang tersedia</p>
          </div>

          <!-- Form -->
          
        @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
         {{ session('success') }}
       </div>
        @endif
          <form action="/pendaftaran-kelas" method="post">
           @csrf

            <!-- Nama Peserta -->
            <div class="form-group">
              <label class="form-label" for="nama">
                <span class="label-icon">👤</span> Nama Peserta
              </label>
              <div class="input-wrapper">
                <input
                  class="form-input"
                  type="text"
                  id="nama"
                  value="{{ Auth::user()->name }}"
                  disabled
                >
                <span class="input-icon">✏️</span>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="no_telepon">
                <span class="label-icon">👤</span> No telepon
              </label>
              <div class="input-wrapper">
                <input
                  class="form-input"
                  type="text"
                  id="no_telepon"
                  name="no_telepon"
                  value="{{ Auth::user()->no_telepon }}"
                  placeholder="Masukkan nomor telepon..."
                  required
                >
                <span class="input-icon">✏️</span>
              </div>
            </div>

            <!-- Kelas Tutor -->
            <div class="form-group">
              <label class="form-label" for="kelas-tutor">
                <span class="label-icon">📚</span> Kelas Tutor
              </label>
              <select class="form-select" id="kelas-tutor" name="teaching_schedule_id" required>
                <option value="" disabled selected>— Pilih Kelas Tutor —</option>
                @foreach($schedules as $schedule)
                <option value="{{ $schedule->id }}">
                  {{ $schedule->user->name }} — {{ $schedule->topik_pembahasan }} ({{ \Carbon\Carbon::parse($schedule->tanggal)->translatedFormat('d M Y') }})
                </option>
                @endforeach
              </select>
              <div class="form-helper">Pendaftaran akan dikirim ke tutor yang dipilih untuk diverifikasi</div>
            </div>

            <!-- Button Daftar -->
            <button type="submit" class="btn-submit">
              DAFTAR
              <span class="btn-arrow">→</span>
            </button>

          </form>

          <!-- Footer Note -->
          <div class="form-footer-note">
            Dengan mendaftar, Anda menyetujui bahwa data yang diisi adalah benar.<br>
            Kembali ke <a href="/informasi-kelas">Informasi Kelas</a> untuk melihat jadwal.
          </div>

        </div>
      </div>

    </div>
  </div>

</body>
</html>