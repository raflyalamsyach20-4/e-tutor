<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Keterangan Skills</title>
  <style>
    body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; padding: 20px; }
    .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
    .header h2 { margin: 0; text-transform: uppercase; }
    .letter-number { text-align: center; margin-bottom: 30px; font-weight: bold; }
    .content { text-align: justify; margin-bottom: 40px; }
    .data-table { margin: 20px 0; }
    .data-table td { padding: 5px 0; }
    .data-label { width: 150px; }
    .footer { margin-top: 50px; }
    .footer-table { width: 100%; }
    .footer-sign { width: 250px; text-align: center; float: right; }
    .sign-space { height: 80px; }
    .sign-name { font-weight: bold; text-decoration: underline; }
  </style>
</head>
<body>
  <div class="header">
    <h2>E-TUTOR UNIVERSITY</h2>
    <p>Jl. Kampus No. 1, Palembang, Indonesia</p>
  </div>

  <div class="letter-number">
    SURAT KETERANGAN SKILLS<br>
    Nomor: {{ $data['letter_number'] }}
  </div>

  <div class="content">
    Yang bertanda tangan di bawah ini, menerangkan bahwa:

    <table class="data-table">
      <tr>
        <td class="data-label">Nama</td>
        <td>: {{ $data['student_name'] }}</td>
      </tr>
      <tr>
        <td class="data-label">NIM</td>
        <td>: {{ $data['student_nim'] }}</td>
      </tr>
      <tr>
        <td class="data-label">Program Studi</td>
        <td>: {{ $data['student_prodi'] }}</td>
      </tr>
    </table>

    Telah melaksanakan kegiatan mengajar sebagai Tutor Mahasiswa pada topik:
    <br><strong>"{{ $data['topic'] }}"</strong><br>
    
    Selama pelaksanaan kegiatan, yang bersangkutan telah menunjukkan kemampuan komunikasi, penguasaan materi, dan integritas yang baik dalam membimbing mahasiswa lainnya.
    
    <p>Demikian surat keterangan ini diberikan agar dapat dipergunakan sebagaimana mestinya.</p>
  </div>

  <div class="footer">
    <div class="footer-sign">
      <p>{{ $data['place'] }}, {{ $data['date'] }}</p>
      <p>Administrator E-Tutor,</p>
      <div class="sign-space"></div>
      <p class="sign-name">Administrator</p>
      <p>NIP. 199001012020011001</p>
    </div>
  </div>
</body>
</html>
