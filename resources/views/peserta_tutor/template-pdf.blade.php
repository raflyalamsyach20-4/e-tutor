<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Rekomendasi - {{ $letter->student_name }}</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      line-height: 1.7;
      color: #000;
      background: #fff;
      padding: 0;
      margin: 0;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      padding: 25mm 25mm 20mm 30mm;
    }

    .letter-title {
      text-align: center;
      font-weight: bold;
      font-size: 13pt;
      text-decoration: underline;
      text-transform: uppercase;
      margin-bottom: 30px;
      letter-spacing: 0.04em;
    }

    .data-row {
      display: flex;
      margin-bottom: 4px;
    }
    .data-label { width: 145px; }
    .data-colon { width: 20px; }
    .data-value { font-weight: normal; }

    .letter-body {
      text-align: justify;
      margin-bottom: 10px;
    }

    .letter-closing {
      text-align: right;
      margin-top: 30px;
      margin-right: 0;
    }

    .sig-section-right {
      margin-top: 40px;
      text-align: center;
      float: right;
      width: 220px;
    }
    .sig-space { height: 75px; }
    .sig-name { font-weight: bold; border-bottom: 2px solid #000; padding-bottom: 2px; }
    .sig-nip { margin-top: 4px; }

    .clearfix { clear: both; }

    .menyetujui {
      text-align: center;
      font-weight: bold;
      margin-top: 45px;
      margin-bottom: 8px;
    }

    .sig-approvers-table {
      width: 100%;
      border-collapse: collapse;
    }
    .sig-approvers-table td {
      width: 50%;
      text-align: center;
      vertical-align: top;
      padding: 0 10px;
    }
    .sig-approver-space { height: 75px; }
  </style>
</head>
<body>
<div class="page">

  <div class="letter-title">Surat Rekomendasi Calon Tutor</div>

  <div class="data-row">
    <span class="data-label">Nama</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->lecturer_name }}</span>
  </div>
  <div class="data-row">
    <span class="data-label">NIP</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->lecturer_nip }}</span>
  </div>
  <div class="data-row">
    <span class="data-label">Jabatan Dosen</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->lecturer_position }}</span>
  </div>

  <p class="letter-body" style="margin-top:20px;">Dengan ini menerangkan bahwa:</p>

  <div class="data-row" style="margin-top:8px;">
    <span class="data-label">Nama</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->student_name }}</span>
  </div>
  <div class="data-row">
    <span class="data-label">NIM</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->student_nim }}</span>
  </div>
  <div class="data-row">
    <span class="data-label">Program Studi</span>
    <span class="data-colon">:</span>
    <span class="data-value">{{ $letter->student_prodi }}</span>
  </div>

  <p class="letter-body" style="margin-top:20px;">
    Merupakan mahasiswa yang memiliki kemampuan akademik, pemahaman materi, serta
    kemampuan komunikasi yang baik selama mengikuti proses perkuliahan. Berdasarkan hasil
    pengamatan dan penilaian selama kegiatan pembelajaran berlangsung, mahasiswa tersebut
    dinilai mampu untuk membantu proses pembelajaran dan layak menjadi tutor mahasiswa.
  </p>
  <p class="letter-body" style="margin-top:10px;">
    Surat rekomendasi ini dibuat sebagai salah satu persyaratan pengajuan diri sebagai tutor pada
    program bimbingan belajar mahasiswa. Demikian surat ini dibuat dengan sebenar-benarnya
    agar dapat dipergunakan sebagaimana mestinya.
  </p>

  <div class="letter-closing">
    {{ $letter->place }}, {{ $letter->date->translatedFormat('d F Y') }}
  </div>

  <!-- Tanda tangan calon tutor (kanan) -->
  <div class="sig-section-right">
    <div>Nama Tutor</div>
    <div class="sig-space"></div>
    <div class="sig-name">{{ $letter->student_name }}</div>
    <div class="sig-nip">{{ $letter->student_nim }}</div>
  </div>

  <div class="clearfix"></div>

  <!-- Menyetujui -->
  <div class="menyetujui">Menyetujui</div>

  <table class="sig-approvers-table">
    <tr>
      <td>
        <div>Dosen Pembimbing Akademik,</div>
        <div class="sig-approver-space"></div>
        <div class="sig-name">{{ $letter->pa_lecturer_name }}</div>
        <div class="sig-nip">NIP. {{ $letter->pa_lecturer_nip }}</div>
      </td>
      <td>
        <div>Dosen Pengampu Akademik,</div>
        <div class="sig-approver-space"></div>
        <div class="sig-name">{{ $letter->course_lecturer_name }}</div>
        <div class="sig-nip">NIP. {{ $letter->course_lecturer_nip }}</div>
      </td>
    </tr>
  </table>

</div>
</body>
</html>
