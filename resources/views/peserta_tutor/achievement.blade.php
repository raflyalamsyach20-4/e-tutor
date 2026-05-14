<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Achievement — E-Tutor</title>
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
    .sidebar-brand { padding: 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 12px; }
    .sidebar-brand .brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 11px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 17px; color: #fff; }
    .sidebar-brand .brand-text { font-weight: 700; font-size: 17px; letter-spacing: -0.02em; }
    .sidebar-brand .brand-sub { font-size: 11px; color: #64748b; margin-top: 1px; }
    .sidebar-nav { flex: 1; padding: 12px 10px; display: flex; flex-direction: column; gap: 2px; overflow-y: auto; }
    .nav-item { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; text-decoration: none; transition: all 0.2s; cursor: pointer; }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-item.active { background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: #fff !important; box-shadow: 0 3px 12px rgba(59,130,246,0.3); font-weight: 600; }
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent { margin: 4px 0 2px; }
    .nav-parent > summary { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; cursor: pointer; transition: all 0.2s; user-select: none; list-style: none; }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent > summary .chevron { margin-left: auto; font-size: 11px; color: #475569; transition: transform 0.25s ease; }
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }
    .nav-children { padding: 4px 0 6px 0; display: flex; flex-direction: column; gap: 1px; }
    .nav-child { display: flex; align-items: center; gap: 10px; padding: 8px 14px 8px 46px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #64748b; text-decoration: none; transition: all 0.2s; cursor: pointer; position: relative; }
    .nav-child::before { content: ''; position: absolute; left: 30px; top: 50%; transform: translateY(-50%); width: 5px; height: 5px; border-radius: 50%; background: #334155; transition: all 0.2s; }
    .nav-child:hover { color: #cbd5e1; background: rgba(255,255,255,0.04); }
    .nav-child:hover::before { background: #64748b; }
    .nav-child.active { color: #fff; background: rgba(59,130,246,0.15); font-weight: 600; }
    .nav-child.active::before { background: #3b82f6; box-shadow: 0 0 6px rgba(59,130,246,0.5); width: 6px; height: 6px; }
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }
    .btn-logout { width: 100%; margin-top: 8px; padding: 8px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(239,68,68,0.1); color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif; }
    .btn-logout:hover { background: rgba(239,68,68,0.2); }

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
    .topbar-brand-icon { width: 36px; height: 36px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 15px; color: #fff; }
    .topbar-brand-text { font-weight: 700; font-size: 15px; color: #1e293b; letter-spacing: -0.02em; }
    .topbar-brand-sub { font-size: 10px; color: #94a3b8; font-weight: 500; display: block; line-height: 1; margin-top: 1px; }
    .topbar-right { display: flex; align-items: center; gap: 10px; }
    .topbar-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #64748b; font-size: 16px; transition: all 0.2s; position: relative; }
    .topbar-btn:hover { background: #f8fafc; color: #1e293b; border-color: #cbd5e1; }
    .notif-dot { position: absolute; top: 7px; right: 7px; width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; }

    /* ================================================================
       PAGE HEADER
       ================================================================ */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px; position: relative; overflow: hidden;
    }
    .page-header::before { content: ''; position: absolute; top: -60%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .page-header-inner { position: relative; z-index: 2; display: flex; align-items: flex-start; justify-content: space-between; }
    .page-header-text h1 { font-size: 26px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .page-header-text p { font-size: 14px; color: rgba(255,255,255,0.7); max-width: 540px; line-height: 1.6; }
    .header-stats { display: flex; gap: 14px; }
    .header-stat { background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.15); border-radius: 14px; padding: 14px 20px; text-align: center; min-width: 105px; }
    .header-stat .stat-num { font-size: 24px; font-weight: 800; color: #fff; line-height: 1; }
    .header-stat .stat-label { font-size: 11px; color: rgba(255,255,255,0.65); margin-top: 4px; font-weight: 500; }

    /* ================================================================
       CONTENT
       ================================================================ */
    .content-section { padding: 28px 32px 40px; flex: 1; }

    .upload-card {
      background: #fff; border-radius: 20px; padding: 32px;
      border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.04);
      margin-bottom: 28px;
    }
    .upload-card-header {
      display: flex; align-items: center; gap: 14px;
      margin-bottom: 8px;
    }
    .upload-card-icon {
      width: 48px; height: 48px; border-radius: 14px;
      background: linear-gradient(135deg, #eff6ff, #dbeafe);
      border: 1px solid #bfdbfe;
      display: flex; align-items: center; justify-content: center;
      font-size: 22px; flex-shrink: 0;
    }
    .upload-card-title { font-size: 17px; font-weight: 700; color: #1e293b; }
    .upload-card-desc { font-size: 13px; color: #64748b; line-height: 1.5; }

    .upload-info {
      display: flex; gap: 16px; padding: 14px 18px;
      background: #f8fafc; border: 1px solid #e2e8f0;
      border-radius: 12px; margin-bottom: 24px; flex-wrap: wrap;
    }
    .upload-info-item { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #475569; font-weight: 500; }
    .upload-info-item .info-icon { font-size: 16px; flex-shrink: 0; }
    .upload-info-item strong { color: #1e293b; font-weight: 600; }

    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
    .form-group { margin-bottom: 20px; }
    .form-label {
      display: flex; align-items: center; gap: 5px;
      font-size: 12px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.06em;
      color: #475569; margin-bottom: 8px;
    }
    .form-input, .form-textarea {
      width: 100%; padding: 12px 16px; border-radius: 12px;
      border: 1.5px solid #e2e8f0; background: #fff;
      font-size: 14px; font-family: 'Inter', sans-serif; color: #1e293b;
      outline: none; transition: all 0.2s;
    }
    .form-input:focus, .form-textarea:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .form-input:read-only { background: #f1f5f9; cursor: not-allowed; }

    .upload-zone {
      border: 2px dashed #cbd5e1; border-radius: 18px;
      padding: 40px 24px; text-align: center;
      transition: all 0.25s ease; cursor: pointer;
      background: #fafbfc; position: relative;
    }
    .upload-zone:hover { border-color: #3b82f6; background: #eff6ff; }
    .upload-zone.has-file { border-color: #22c55e; background: #f0fdf4; border-style: solid; }
    .upload-zone input[type="file"] {
      position: absolute; inset: 0; opacity: 0;
      cursor: pointer; width: 100%; height: 100%; z-index: 2;
    }
    .upload-text-main { font-size: 15px; font-weight: 600; color: #334155; margin-bottom: 4px; }
    .upload-text-sub { font-size: 12.5px; color: #94a3b8; margin-bottom: 14px; }
    .upload-accepted { display: inline-flex; align-items: center; gap: 4px; padding: 4px 12px; border-radius: 8px; background: #fff; border: 1px solid #e2e8f0; font-size: 11.5px; font-weight: 600; color: #64748b; }

    .btn-submit {
      width: 100%; padding: 15px 24px; border-radius: 13px; border: none;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff; font-size: 15px; font-weight: 800;
      cursor: pointer; transition: all 0.3s;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(37,99,235,0.35); }

    .section-header { display: flex; align-items: center; gap: 8px; font-size: 15px; font-weight: 700; color: #1e293b; margin-bottom: 16px; margin-top: 32px; }
    .table-wrapper { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
    thead th { padding: 14px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; text-align: left; }
    tbody td { padding: 16px; font-size: 13px; color: #334155; border-bottom: 1px solid #f1f5f9; }

    .status-badge { display: inline-flex; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; }
    .status-pending { background: #fef9c3; color: #a16207; }
    .status-approved { background: #dcfce7; color: #16a34a; }
    .status-rejected { background: #fee2e2; color: #dc2626; }

    .btn-download { display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; border-radius: 8px; background: #3b82f6; color: #fff; font-size: 11px; font-weight: 600; text-decoration: none; }
    .btn-download.disabled { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }

    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main-content { margin-left: 0; }
      .form-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>
<x-sidebar />

  <main class="main-content">
    <div class="topbar">
      <div class="topbar-left">
        <a href="#" class="topbar-brand">
          <div class="topbar-brand-icon">E</div>
          <div>
            <div class="topbar-brand-text">E-Tutor</div>
            <span class="topbar-brand-sub">Sistem Tutoring</span>
          </div>
        </a>
      </div>
      <div class="topbar-right">
        <a href="{{ route('notifications.index') }}" class="topbar-btn">
          🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
        </a>
      </div>
    </div>

    <div class="page-header">
      <div class="page-header-inner">
        <div class="page-header-text">
          <h1>Halaman Achievement</h1>
          <p>Kirim bukti pengajaran Anda untuk mendapatkan Surat Skills resmi.</p>
        </div>
        <div class="header-stats">
          <div class="header-stat"><div class="stat-num">{{ $achievements->count() }}</div><div class="stat-label">Total</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#86efac">{{ $achievements->where('status', 'approved')->count() }}</div><div class="stat-label">Disetujui</div></div>
          <div class="header-stat"><div class="stat-num" style="color:#fde047">{{ $achievements->where('status', 'pending')->count() }}</div><div class="stat-label">Pending</div></div>
        </div>
      </div>
    </div>

    <div class="content-section">
      @if(session('success'))
        <div style="background: #dcfce7; color: #16a34a; padding: 14px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; font-weight: 600;">
          {{ session('success') }}
        </div>
      @endif

      <div class="upload-card">
        <div class="upload-card-header">
          <div class="upload-card-icon">📤</div>
          <div>
            <div class="upload-card-title">Kirim Pengajuan Achievement</div>
            <div class="upload-card-desc">Lengkapi form di bawah ini untuk mengajukan verifikasi pengajaran.</div>
          </div>
        </div>

        <form action="{{ route('achievement.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-grid" style="margin-top: 24px;">
            <div class="form-group">
              <label class="form-label">Nama Tutor</label>
              <input type="text" class="form-input" value="{{ $studentData['nama'] }}" readonly>
            </div>
            <div class="form-group">
              <label class="form-label">NIM</label>
              <input type="text" class="form-input" value="{{ $studentData['nim'] }}" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Program Studi</label>
            <input type="text" class="form-input" value="{{ $studentData['prodi'] }}" readonly>
          </div>

          <div class="form-group">
            <label class="form-label">Topik / Materi yang Diajarkan</label>
            <input type="text" name="topic" class="form-input" placeholder="Contoh: Pemrograman Dasar Python" required>
          </div>

          <div class="form-group">
            <label class="form-label">Deskripsi Kegiatan</label>
            <textarea name="description" class="form-textarea" rows="3" placeholder="Jelaskan singkat kegiatan mengajar Anda..." required></textarea>
          </div>

          <div class="form-group">
            <label class="form-label">Upload Bukti Mengajar (Image/PDF)</label>
            <div class="upload-zone" id="uploadZone" onclick="document.getElementById('fileInput').click()">
              <input type="file" name="teaching_proof" id="fileInput" accept=".jpg,.jpeg,.png,.pdf" onchange="updateFileName(this)" required>
              <div id="uploadPlaceholder">
                <div class="upload-text-main"><span>Klik untuk upload</span> atau drag file ke sini</div>
                <div class="upload-text-sub">Screenshot atau PDF bukti mengajar</div>
                <div class="upload-accepted">📁 JPG, PNG, PDF — Maks. 2MB</div>
              </div>
              <div id="fileSelectedName" style="display:none; color:#16a34a; font-weight:600; font-size:14px;"></div>
            </div>
          </div>

          <button type="submit" class="btn-submit">
            SUBMIT PENGAJUAN
            <span>→</span>
          </button>
        </form>
      </div>

      <div class="section-header">
        <span>📋</span> Riwayat Pengajuan Surat Skills
      </div>

      <div class="table-wrapper">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Topik</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Surat Skills</th>
              </tr>
            </thead>
            <tbody>
              @forelse($achievements as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    <div style="font-weight: 600;">{{ $item->topic }}</div>
                    <div style="font-size: 11px; color: #94a3b8;">{{ Str::limit($item->description, 50) }}</div>
                  </td>
                  <td>{{ $item->created_at->translatedFormat('d M Y') }}</td>
                  <td>
                    <span class="status-badge status-{{ $item->status }}">
                      {{ ucfirst($item->status) }}
                    </span>
                  </td>
                  <td>
                    @if($item->status == 'approved' && $item->skillLetter)
                      <a href="{{ route('achievement.download', $item->id) }}" class="btn-download">
                        📥 Download
                      </a>
                    @else
                      <span style="color: #94a3b8; font-size: 11px;">Belum tersedia</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">
                    Belum ada riwayat pengajuan.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <script>
    function updateFileName(input) {
      const placeholder = document.getElementById('uploadPlaceholder');
      const fileNameDisplay = document.getElementById('fileSelectedName');
      const zone = document.getElementById('uploadZone');
      
      if (input.files && input.files[0]) {
        placeholder.style.display = 'none';
        fileNameDisplay.textContent = '✅ ' + input.files[0].name;
        fileNameDisplay.style.display = 'block';
        zone.classList.add('has-file');
      }
    }
  </script>
</body>
</html>