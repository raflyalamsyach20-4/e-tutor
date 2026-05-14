<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview Surat Rekomendasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #e2e8f0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 32px 16px;
    }

    /* ACTION BAR */
    .action-bar {
      width: 100%; max-width: 780px;
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 20px;
    }
    .action-bar h2 {
      font-size: 16px; font-weight: 700; color: #1e293b;
      display: flex; align-items: center; gap: 8px;
    }
    .action-bar .badge {
      padding: 3px 10px; border-radius: 20px;
      background: #fef9c3; color: #a16207;
      font-size: 11px; font-weight: 600;
    }
    .btn-group { display: flex; gap: 10px; }
    .action-btn {
      display: inline-flex; align-items: center; gap: 7px;
      padding: 9px 18px; border-radius: 10px; font-size: 13px;
      font-weight: 600; cursor: pointer; transition: all 0.2s;
      border: none; font-family: 'Inter', sans-serif; text-decoration: none;
    }
    .btn-back { background: #fff; color: #475569; border: 1px solid #e2e8f0; }
    .btn-back:hover { background: #f8fafc; }
    .btn-download { background: linear-gradient(135deg, #10b981, #059669); color: #fff; }
    .btn-download:hover { background: linear-gradient(135deg, #059669, #047857); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(16,185,129,0.3); }

    /* LETTER PAPER */
    .letter-paper {
      width: 100%; max-width: 780px;
      background: #ffffff;
      box-shadow: 0 8px 40px rgba(0,0,0,0.15), 0 0 0 1px rgba(0,0,0,0.05);
      border-radius: 4px;
      padding: 72px 80px;
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      line-height: 1.7;
      color: #000;
      min-height: 1100px;
    }

    .letter-title {
      text-align: center;
      font-weight: bold;
      font-size: 13pt;
      text-decoration: underline;
      text-transform: uppercase;
      margin-bottom: 28px;
      letter-spacing: 0.03em;
    }
    .data-row { display: flex; align-items: baseline; margin-bottom: 4px; }
    .data-label { min-width: 130px; }
    .data-colon { min-width: 20px; }
    .data-value { font-weight: 500; }
    .letter-body { text-align: justify; margin-bottom: 10px; }

    .letter-closing { display: flex; justify-content: flex-end; margin-top: 32px; }
    .closing-inner { text-align: center; }

    .sig-row-top { display: flex; justify-content: flex-end; margin-top: 40px; }
    .sig-block { text-align: center; min-width: 220px; }
    .sig-space { height: 70px; }
    .sig-name { font-weight: bold; border-bottom: 2px solid #000; padding-bottom: 2px; }
    .sig-nip { font-size: 11pt; margin-top: 4px; }

    .menyetujui { text-align: center; font-weight: bold; margin-top: 40px; margin-bottom: 8px; }
    .sig-approvers { display: flex; justify-content: space-between; }
    .sig-approver { text-align: center; min-width: 220px; }
  </style>
</head>
<body>

  <div class="action-bar">
    <h2>👁️ Preview Surat Rekomendasi <span class="badge">Mode Baca</span></h2>
    <div class="btn-group">
      <a href="{{ route('surat-rekomendasi.index') }}" class="action-btn btn-back">✏️ Edit Surat</a>
      <a href="{{ route('surat-rekomendasi.download') }}" class="action-btn btn-download">⬇️ Download PDF</a>
    </div>
  </div>

  <div class="letter-paper">

    <div class="letter-title">Surat Rekomendasi Calon Tutor</div>

    <div class="data-row">
      <span class="data-label">Nama</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->lecturer_name }}</span>
    </div>
    <div class="data-row">
      <span class="data-label">NIP</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->lecturer_nip }}</span>
    </div>
    <div class="data-row">
      <span class="data-label">Jabatan Dosen</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->lecturer_position }}</span>
    </div>

    <p class="letter-body" style="margin-top:20px;">Dengan ini menerangkan bahwa:</p>

    <div class="data-row" style="margin-top:8px;">
      <span class="data-label">Nama</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->student_name }}</span>
    </div>
    <div class="data-row">
      <span class="data-label">NIM</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->student_nim }}</span>
    </div>
    <div class="data-row">
      <span class="data-label">Program Studi</span>
      <span class="data-colon">&nbsp;:&nbsp;</span>
      <span class="data-value">{{ $letter->student_prodi }}</span>
    </div>

    <p class="letter-body" style="margin-top:20px;">
      Merupakan mahasiswa yang memiliki kemampuan akademik, pemahaman materi, serta kemampuan komunikasi yang baik selama mengikuti proses perkuliahan. Berdasarkan hasil pengamatan dan penilaian selama kegiatan pembelajaran berlangsung, mahasiswa tersebut dinilai mampu untuk membantu proses pembelajaran dan layak menjadi tutor mahasiswa.
    </p>
    <p class="letter-body" style="margin-top:10px;">
      Surat rekomendasi ini dibuat sebagai salah satu persyaratan pengajuan diri sebagai tutor pada program bimbingan belajar mahasiswa. Demikian surat ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="letter-closing" style="margin-top:32px;">
      <div class="closing-inner">
        {{ $letter->place }}, {{ $letter->date->translatedFormat('d F Y') }}
      </div>
    </div>

    <div class="sig-row-top">
      <div class="sig-block">
        <div>Nama Tutor</div>
        <div class="sig-space"></div>
        <div class="sig-name">{{ $letter->student_name }}</div>
        <div class="sig-nip">{{ $letter->student_nim }}</div>
      </div>
    </div>

    <div class="menyetujui">Menyetujui</div>

    <div class="sig-approvers">
      <div class="sig-approver">
        <div>Dosen Pembimbing Akademik,</div>
        <div class="sig-space"></div>
        <div class="sig-name">{{ $letter->pa_lecturer_name }}</div>
        <div class="sig-nip">NIP. {{ $letter->pa_lecturer_nip }}</div>
      </div>
      <div class="sig-approver">
        <div>Dosen Pengampu Akademik,</div>
        <div class="sig-space"></div>
        <div class="sig-name">{{ $letter->course_lecturer_name }}</div>
        <div class="sig-nip">NIP. {{ $letter->course_lecturer_nip }}</div>
      </div>
    </div>

  </div>

</body>
</html>
