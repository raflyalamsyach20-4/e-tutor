<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tutor - Surat Rekomendasi</title>
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
       SIDEBAR (copied from pengajuan-tutor for consistency)
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
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }
    .btn-logout { width: 100%; margin-top: 8px; padding: 8px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(239,68,68,0.1); color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif; }
    .btn-logout:hover { background: rgba(239,68,68,0.2); }

    /* ================================================================
       MAIN LAYOUT
       ================================================================ */
    .main-content { margin-left: 270px; flex: 1; min-height: 100vh; display: flex; flex-direction: column; }

    .topbar { background: #fff; padding: 16px 32px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 50; }
    .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; }
    .breadcrumb a { color: #3b82f6; text-decoration: none; font-weight: 500; }
    .breadcrumb .sep { color: #cbd5e1; }
    .topbar-right { display: flex; align-items: center; gap: 10px; }

    /* ================================================================
       ACTION BUTTONS TOPBAR
       ================================================================ */
    .action-btn {
      display: inline-flex; align-items: center; gap: 7px;
      padding: 9px 18px; border-radius: 10px; font-size: 13px;
      font-weight: 600; cursor: pointer; transition: all 0.2s;
      border: none; font-family: 'Inter', sans-serif; text-decoration: none;
    }
    .btn-save { background: #3b82f6; color: #fff; }
    .btn-save:hover { background: #2563eb; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(59,130,246,0.3); }
    .btn-preview { background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; }
    .btn-preview:hover { background: #f1f5f9; color: #1e293b; }
    .btn-download { background: linear-gradient(135deg, #10b981, #059669); color: #fff; }
    .btn-download:hover { background: linear-gradient(135deg, #059669, #047857); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(16,185,129,0.3); }

    /* ================================================================
       LETTER AREA
       ================================================================ */
    .letter-outer { flex: 1; padding: 32px; display: flex; justify-content: center; }
    .letter-wrapper { width: 100%; max-width: 780px; }

    /* Alert messages */
    .alert-success { padding: 12px 16px; background: #dcfce7; border: 1px solid #bbf7d0; border-radius: 10px; color: #16a34a; font-size: 13px; font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
    .alert-error { padding: 12px 16px; background: #fee2e2; border: 1px solid #fecaca; border-radius: 10px; color: #dc2626; font-size: 13px; margin-bottom: 20px; }

    /* The letter paper */
    .letter-paper {
      background: #ffffff;
      border-radius: 4px;
      box-shadow: 0 4px 32px rgba(0,0,0,0.12), 0 0 0 1px rgba(0,0,0,0.05);
      padding: 60px 72px;
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      line-height: 1.7;
      color: #000;
      min-height: 1100px;
      position: relative;
    }

    /* Letter title */
    .letter-title {
      text-align: center;
      font-weight: bold;
      font-size: 13pt;
      text-decoration: underline;
      text-transform: uppercase;
      margin-bottom: 28px;
      letter-spacing: 0.03em;
    }

    /* Data rows */
    .data-row {
      display: flex;
      align-items: baseline;
      margin-bottom: 4px;
      gap: 0;
    }
    .data-label {
      min-width: 130px;
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
    }
    .data-colon {
      min-width: 20px;
      font-family: 'Times New Roman', Times, serif;
    }

    /* Editable inline fields */
    .field-inline {
      flex: 1;
      border: none;
      border-bottom: 1.5px dashed #94a3b8;
      outline: none;
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      color: #000;
      background: transparent;
      padding: 0 4px 1px;
      min-width: 0;
      transition: border-color 0.2s;
    }
    .field-inline:focus { border-bottom-color: #3b82f6; background: rgba(59,130,246,0.04); }
    .field-inline::placeholder { color: #94a3b8; font-style: italic; font-size: 11pt; }

    .letter-separator { margin: 18px 0 14px; }

    .letter-body { text-align: justify; margin-bottom: 10px; }

    /* Closing / date area */
    .letter-closing { display: flex; justify-content: flex-end; margin-top: 28px; }
    .closing-inner { text-align: center; }
    .closing-place-date { display: flex; align-items: baseline; gap: 4px; justify-content: flex-end; }

    .field-place {
      border: none; border-bottom: 1.5px dashed #94a3b8;
      outline: none; font-family: 'Times New Roman', Times, serif;
      font-size: 12pt; color: #000; background: transparent;
      padding: 0 4px 1px; width: 120px; text-align: center;
      transition: border-color 0.2s;
    }
    .field-place:focus { border-bottom-color: #3b82f6; background: rgba(59,130,246,0.04); }

    .field-date {
      border: none; border-bottom: 1.5px dashed #94a3b8;
      outline: none; font-family: 'Times New Roman', Times, serif;
      font-size: 12pt; color: #000; background: rgba(59,130,246,0.02);
      padding: 0 6px 1px; width: 170px;
      transition: border-color 0.2s; cursor: pointer;
    }
    .field-date:focus { border-bottom-color: #3b82f6; }

    /* Signature section */
    .sig-row-top { display: flex; justify-content: flex-end; margin-top: 32px; }
    .sig-block-right { text-align: center; min-width: 200px; }
    .sig-name-box { margin-top: 70px; border-bottom: 2px solid #000; padding-bottom: 2px; }
    .field-sig-name {
      border: none; outline: none;
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt; font-weight: bold;
      color: #000; background: transparent;
      text-align: center; width: 100%;
      border-bottom: 1.5px dashed #94a3b8;
      padding-bottom: 2px; transition: border-color 0.2s;
    }
    .field-sig-name:focus { border-bottom-color: #3b82f6; background: rgba(59,130,246,0.04); }
    .field-sig-nip {
      border: none; outline: none;
      font-family: 'Times New Roman', Times, serif;
      font-size: 11pt; color: #000; background: transparent;
      text-align: center; width: 100%;
      border-bottom: 1.5px dashed #94a3b8;
      padding-bottom: 2px; margin-top: 4px; transition: border-color 0.2s;
    }
    .field-sig-nip:focus { border-bottom-color: #3b82f6; background: rgba(59,130,246,0.04); }

    .menyetujui { text-align: center; font-weight: bold; margin-top: 36px; margin-bottom: 4px; font-size: 12pt; }
    .sig-approvers { display: flex; justify-content: space-between; margin-top: 4px; }
    .sig-approver { text-align: center; min-width: 200px; }
    .sig-approver-label { font-size: 12pt; }

    /* Edit hint banner */
    .edit-hint {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 16px; background: linear-gradient(135deg, #eff6ff, #dbeafe);
      border: 1px solid #bfdbfe; border-radius: 10px;
      font-size: 12px; color: #1d4ed8; font-weight: 500;
      margin-bottom: 20px; font-family: 'Inter', sans-serif;
    }

    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main-content { margin-left: 0; }
      .letter-outer { padding: 16px; }
      .letter-paper { padding: 32px 28px; }
      .topbar { padding: 12px 16px; flex-wrap: wrap; gap: 8px; }
      .topbar-right { flex-wrap: wrap; }
    }
  </style>
</head>
<body>

<x-sidebar />


  <!-- MAIN -->
  <div class="main-content">
    <!-- TOPBAR -->
    <div class="topbar">
      <div class="breadcrumb">
        <a href="/pengajuan-tutor">Home</a>
        <span class="sep">/</span>
        <span>Surat Rekomendasi</span>
      </div>
      <div class="topbar-right">
        @if($letter)
          <a href="{{ route('surat-rekomendasi.preview') }}" class="action-btn btn-preview">👁️ Preview</a>
          <a href="{{ route('surat-rekomendasi.download') }}" class="action-btn btn-download">⬇️ Download PDF</a>
        @endif
        <button type="submit" form="form-surat" class="action-btn btn-save">💾 Simpan</button>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="letter-outer">
      <div class="letter-wrapper">

        {{-- Alert Success --}}
        @if(session('success'))
          <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        {{-- Alert Error --}}
        @if($errors->any())
          <div class="alert-error">
            <ul style="margin-left:18px">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="edit-hint">
          ✏️ Klik pada kolom yang bergaris putus-putus untuk mengedit. Tekan <strong>Simpan</strong> untuk menyimpan data.
        </div>

        <!-- LETTER PAPER -->
        <form id="form-surat" action="{{ route('surat-rekomendasi.store') }}" method="POST">
          @csrf
          <div class="letter-paper">

            <!-- JUDUL -->
            <div class="letter-title">Surat Rekomendasi Calon Tutor</div>

            <!-- DATA DOSEN -->
            <div class="data-row">
              <span class="data-label">Nama</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="lecturer_name" id="lecturer_name"
                placeholder="Nama dosen..."
                value="{{ old('lecturer_name', $letter->lecturer_name ?? '') }}">
            </div>
            <div class="data-row">
              <span class="data-label">NIP</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="lecturer_nip"
                placeholder="NIP dosen..."
                value="{{ old('lecturer_nip', $letter->lecturer_nip ?? '') }}">
            </div>
            <div class="data-row">
              <span class="data-label">Jabatan Dosen</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="lecturer_position"
                placeholder="Jabatan dosen..."
                value="{{ old('lecturer_position', $letter->lecturer_position ?? '') }}">
            </div>

            <!-- KALIMAT PEMBUKA -->
            <p class="letter-body" style="margin-top:20px;">Dengan ini menerangkan bahwa:</p>

            <!-- DATA MAHASISWA -->
            <div class="data-row" style="margin-top:8px;">
              <span class="data-label">Nama</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="student_name" id="student_name"
                placeholder="Nama mahasiswa..."
                value="{{ old('student_name', $letter->student_name ?? ($pengajuan->nama ?? $user->name ?? '')) }}">
            </div>
            <div class="data-row">
              <span class="data-label">NIM</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="student_nim"
                placeholder="NIM mahasiswa..."
                value="{{ old('student_nim', $letter->student_nim ?? ($pengajuan->nim ?? '')) }}">
            </div>
            <div class="data-row">
              <span class="data-label">Program Studi</span>
              <span class="data-colon">&nbsp;:&nbsp;</span>
              <input class="field-inline" type="text" name="student_prodi"
                placeholder="Program studi..."
                value="{{ old('student_prodi', $letter->student_prodi ?? '') }}">
            </div>

            <!-- ISI SURAT -->
            <p class="letter-body" style="margin-top:20px;">
              Merupakan mahasiswa yang memiliki kemampuan akademik, pemahaman materi, serta kemampuan komunikasi yang baik selama mengikuti proses perkuliahan. Berdasarkan hasil pengamatan dan penilaian selama kegiatan pembelajaran berlangsung, mahasiswa tersebut dinilai mampu untuk membantu proses pembelajaran dan layak menjadi tutor mahasiswa.
            </p>
            <p class="letter-body" style="margin-top:10px;">
              Surat rekomendasi ini dibuat sebagai salah satu persyaratan pengajuan diri sebagai tutor pada program bimbingan belajar mahasiswa. Demikian surat ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.
            </p>

            <!-- PENUTUP / TANGGAL -->
            <div class="letter-closing" style="margin-top:32px;">
              <div class="closing-inner">
                <div class="closing-place-date">
                  <input class="field-place" type="text" name="place"
                    placeholder="Kota..."
                    value="{{ old('place', $letter->place ?? 'Palembang') }}">,&nbsp;
                  <input class="field-date" type="date" name="date"
                    value="{{ old('date', optional($letter)->date ? $letter->date->format('Y-m-d') : now()->format('Y-m-d')) }}">
                </div>
              </div>
            </div>

            <!-- TANDA TANGAN CALON TUTOR -->
            <div class="sig-row-top">
              <div class="sig-block-right">
                <div>Nama Tutor</div>
                <div class="sig-name-box">
                  <input class="field-sig-name" type="text" name="student_name_sig" disabled
                    id="sig-student-name"
                    value="{{ old('student_name', $letter->student_name ?? ($pengajuan->nama ?? $user->name ?? '')) }}">
                </div>
                <div style="margin-top:6px;">
                  <input class="field-sig-nip" type="text" name="student_nim_sig" disabled
                    id="sig-student-nim"
                    value="{{ old('student_nim', $letter->student_nim ?? ($pengajuan->nim ?? '')) }}">
                </div>
              </div>
            </div>

            <!-- MENYETUJUI -->
            <div class="menyetujui">Menyetujui</div>

            <div class="sig-approvers">
              <!-- Dosen PA -->
              <div class="sig-approver">
                <div class="sig-approver-label">Dosen Pembimbing Akademik,</div>
                <div style="margin-top: 70px; border-bottom: 2px solid #000; padding-bottom: 2px;">
                  <input class="field-sig-name" type="text" name="pa_lecturer_name"
                    placeholder="Nama Dosen PA..."
                    value="{{ old('pa_lecturer_name', $letter->pa_lecturer_name ?? '') }}">
                </div>
                <div style="margin-top:4px;">
                  <input class="field-sig-nip" type="text" name="pa_lecturer_nip"
                    placeholder="NIP..."
                    value="{{ old('pa_lecturer_nip', $letter->pa_lecturer_nip ?? '') }}">
                </div>
              </div>

              <!-- Dosen Pengampu -->
              <div class="sig-approver">
                <div class="sig-approver-label">Dosen Pengampu Akademik,</div>
                <div style="margin-top: 70px; border-bottom: 2px solid #000; padding-bottom: 2px;">
                  <input class="field-sig-name" type="text" name="course_lecturer_name"
                    placeholder="Nama Dosen Pengampu..."
                    value="{{ old('course_lecturer_name', $letter->course_lecturer_name ?? '') }}">
                </div>
                <div style="margin-top:4px;">
                  <input class="field-sig-nip" type="text" name="course_lecturer_nip"
                    placeholder="NIP..."
                    value="{{ old('course_lecturer_nip', $letter->course_lecturer_nip ?? '') }}">
                </div>
              </div>
            </div>

          </div><!-- end letter-paper -->
        </form>

      </div>
    </div><!-- end letter-outer -->
  </div>

  <script>
    // Sync student name & nim ke signature box (read-only)
    const studentNameInput = document.getElementById('student_name');
    const sigStudentName   = document.getElementById('sig-student-name');
    const studentNimInput  = document.querySelector('input[name="student_nim"]');
    const sigStudentNim    = document.getElementById('sig-student-nim');

    if (studentNameInput && sigStudentName) {
      studentNameInput.addEventListener('input', () => {
        sigStudentName.value = studentNameInput.value;
      });
    }
    if (studentNimInput && sigStudentNim) {
      studentNimInput.addEventListener('input', () => {
        sigStudentNim.value = studentNimInput.value;
      });
    }
  </script>
</body>
</html>
