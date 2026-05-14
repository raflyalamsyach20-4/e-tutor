<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  <style>
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #FFFFFF;
      color: #0F172A;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .bg-decoration {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .bg-circle {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
    }

    .bg-circle-1 {
      width: 600px;
      height: 600px;
      background: #0091FF;
      top: -200px;
      right: -150px;
      opacity: 0.12;
      animation: float 6s ease-in-out infinite;
    }

    .bg-circle-2 {
      width: 500px;
      height: 500px;
      background: #0091FF;
      bottom: -200px;
      left: -150px;
      opacity: 0.08;
      animation: float 8s ease-in-out infinite reverse;
    }

    .bg-grid {
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(to right, #e2e8f0 1px, transparent 1px),
        linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
      background-size: 60px 60px;
      opacity: 0.25;
      pointer-events: none;
      z-index: 0;
      mask-image: radial-gradient(ellipse at center, black 30%, transparent 75%);
      -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 75%);
    }

    .register-wrapper {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 440px;
      padding: 20px;
    }

    .register-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(226, 232, 240, 0.6);
      border-radius: 24px;
      padding: 48px 40px 40px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
      animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .brand {
      text-align: center;
      margin-bottom: 36px;
    }

    .brand-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 56px;
      height: 56px;
      background: linear-gradient(135deg, #0091FF, #0070E0);
      border-radius: 16px;
      margin-bottom: 16px;
      box-shadow: 0 8px 24px rgba(0, 145, 255, 0.3);
    }

    .brand-icon .iconify {
      font-size: 28px;
      color: #FFFFFF;
    }

    .brand h1 {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 700;
      color: #0F172A;
      letter-spacing: -0.02em;
    }

    .brand p {
      font-size: 14px;
      color: #64748B;
      margin-top: 6px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      margin-bottom: 8px;
    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper .iconify.input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 18px;
      color: #94A3B8;
      transition: color 0.3s;
      pointer-events: none;
    }

    .form-input {
      width: 100%;
      padding: 14px 16px 14px 46px;
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      color: #0F172A;
      background: #F8FAFC;
      border: 1.5px solid #E2E8F0;
      border-radius: 12px;
      outline: none;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .form-input::placeholder {
      color: #94A3B8;
    }

    .form-input:hover {
      border-color: #CBD5E1;
      background: #FFFFFF;
    }

    .form-input:focus {
      border-color: #0091FF;
      background: #FFFFFF;
      box-shadow: 0 0 0 4px rgba(0, 145, 255, 0.08);
    }

    .form-input:focus ~ .input-icon {
      color: #0091FF;
    }

    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      padding: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
    }

    .toggle-password:hover {
      background: rgba(0, 0, 0, 0.04);
    }

    .toggle-password .iconify {
      font-size: 18px;
      color: #94A3B8;
      transition: color 0.2s;
    }

    .toggle-password:hover .iconify {
      color: #64748B;
    }

    .form-input.has-toggle {
      padding-right: 46px;
    }

    .password-strength {
      display: flex;
      gap: 4px;
      margin-top: 10px;
      align-items: center;
    }

    .strength-bar {
      flex: 1;
      height: 3px;
      border-radius: 3px;
      background: #E2E8F0;
      transition: background 0.3s;
    }

    .strength-bar.active.weak { background: #EF4444; }
    .strength-bar.active.medium { background: #F59E0B; }
    .strength-bar.active.strong { background: #22C55E; }

    .strength-text {
      font-size: 11px;
      font-weight: 500;
      margin-left: 8px;
      color: #94A3B8;
      min-width: 50px;
      text-align: right;
    }

    .strength-text.weak { color: #EF4444; }
    .strength-text.medium { color: #F59E0B; }
    .strength-text.strong { color: #22C55E; }

    .btn-register {
      width: 100%;
      padding: 15px 24px;
      margin-top: 8px;
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      font-weight: 600;
      color: #FFFFFF;
      background: linear-gradient(135deg, #0091FF, #0070E0);
      border: none;
      border-radius: 12px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      box-shadow: 0 4px 16px rgba(0, 145, 255, 0.3);
    }

    .btn-register::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-register:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(0, 145, 255, 0.4);
    }

    .btn-register:hover::before {
      opacity: 1;
    }

    .btn-register:active {
      transform: translateY(0);
      box-shadow: 0 2px 10px rgba(0, 145, 255, 0.3);
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 16px;
      margin: 24px 0;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #E2E8F0;
    }

    .divider span {
      font-size: 12px;
      color: #94A3B8;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .social-buttons {
      display: flex;
      gap: 12px;
    }

    .btn-social {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 12px 16px;
      font-family: 'Inter', sans-serif;
      font-size: 13px;
      font-weight: 500;
      color: #334155;
      background: #FFFFFF;
      border: 1.5px solid #E2E8F0;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-social .iconify {
      font-size: 18px;
    }

    .btn-social:hover {
      border-color: #CBD5E1;
      background: #F8FAFC;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .btn-social:active {
      transform: translateY(0);
    }

    .login-link {
      text-align: center;
      margin-top: 28px;
      font-size: 13px;
      color: #64748B;
    }

    .login-link a {
      color: #0091FF;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s;
    }

    .login-link a:hover {
      color: #0070E0;
    }

    .terms {
      text-align: center;
      margin-top: 20px;
      font-size: 11px;
      color: #94A3B8;
      line-height: 1.6;
    }

    .terms a {
      color: #64748B;
      text-decoration: underline;
      text-underline-offset: 2px;
      transition: color 0.2s;
    }

    .terms a:hover {
      color: #0091FF;
    }

    /* Toast */
    .toast {
      position: fixed;
      top: 24px;
      right: 24px;
      background: #FFFFFF;
      border: 1px solid #E2E8F0;
      border-radius: 14px;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
      z-index: 1000;
      transform: translateX(calc(100% + 40px));
      transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      max-width: 360px;
    }

    .toast.show {
      transform: translateX(0);
    }

    .toast-icon {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .toast-icon.success { background: #ECFDF5; color: #059669; }
    .toast-icon.error { background: #FEF2F2; color: #DC2626; }

    .toast-content h4 {
      font-size: 13px;
      font-weight: 600;
      color: #0F172A;
    }

    .toast-content p {
      font-size: 12px;
      color: #64748B;
      margin-top: 2px;
    }

    /* Animations */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }

    .form-group:nth-child(1) { animation: fadeInUp 0.5s 0.1s cubic-bezier(0.16, 1, 0.3, 1) both; }
    .form-group:nth-child(2) { animation: fadeInUp 0.5s 0.15s cubic-bezier(0.16, 1, 0.3, 1) both; }
    .form-group:nth-child(3) { animation: fadeInUp 0.5s 0.2s cubic-bezier(0.16, 1, 0.3, 1) both; }
    .form-group:nth-child(4) { animation: fadeInUp 0.5s 0.25s cubic-bezier(0.16, 1, 0.3, 1) both; }

    @media (max-width: 480px) {
      .register-wrapper { padding: 16px; }
      .register-card { padding: 36px 24px 32px; border-radius: 20px; }
      .brand h1 { font-size: 24px; }
      .social-buttons { flex-direction: column; }
      .toast { left: 16px; right: 16px; max-width: none; }
    }
  </style>
</head>
<body>

  <div class="bg-decoration">
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
  </div>
  <div class="bg-grid"></div>

  <!-- Toast -->
  <div class="toast" id="toast">
    <div class="toast-icon success" id="toastIcon">
      <span class="iconify" data-icon="lucide:check-circle" data-width="18"></span>
    </div>
    <div class="toast-content">
      <h4 id="toastTitle">Berhasil!</h4>
      <p id="toastMessage">Akun berhasil dibuat.</p>
    </div>
  </div>

  <div class="register-wrapper">
    <div class="register-card">

      <div class="brand">
        <div class="brand-icon">
          <span class="iconify" data-icon="lucide:graduation-cap"></span>
        </div>
        <h1>Registrasi</h1>
        <p>Buat akun baru untuk mulai belajar</p>
      </div>

      <form id="registerForm" action="/registrasi" method="POST" novalidate>
  @csrf
  <div class="form-group">
    <label class="form-label" for="name">Name</label>
    <div class="input-wrapper">
      <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap" autocomplete="name" required>
      <span class="iconify input-icon" data-icon="lucide:user"></span>
    </div>
    @error('name')
      <small style="color: red;">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label class="form-label" for="email">Email Address</label>
    <div class="input-wrapper">
      <input type="email" id="email" name="email" class="form-input" placeholder="contoh@email.com" autocomplete="email" required>
      <span class="iconify input-icon" data-icon="lucide:mail"></span>
    </div>
    @error('email')
      <small style="color: red;">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label class="form-label" for="password">Password</label>
    <div class="input-wrapper">
      <input type="password" id="password" name="password" class="form-input has-toggle" placeholder="Minimal 8 karakter" autocomplete="new-password" required>
      <span class="iconify input-icon" data-icon="lucide:lock"></span>
      <button type="button" class="toggle-password" onclick="togglePw('password', this)" aria-label="Toggle password">
        <span class="iconify" data-icon="lucide:eye"></span>
      </button>
    </div>
    @error('password')
      <small style="color: red;">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
  <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
  <div class="input-wrapper">
    <span class="iconify input-icon" data-icon="lucide:lock"></span>
    <input type="password" 
           id="password_confirmation" 
           name="password_confirmation"
           class="form-input has-toggle" 
           placeholder="Ulangi password" 
           required>
    <button type="button" class="toggle-password" onclick="togglePw('password_confirmation', this)">
      <span class="iconify" data-icon="lucide:eye"></span>
    </button>
  </div>
</div>
  @if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
  @endif

  <button type="submit" class="btn-register">Registrasi</button>
</form>

      <p class="login-link">Sudah punya akun? <a href="/login">Login di sini</a></p>

      <p class="terms">
        Dengan mendaftar, Anda menyetujui
        <a href="#">Syarat & Ketentuan</a> dan
        <a href="#">Kebijakan Privasi</a> kami.
      </p>

    </div>
  </div>

  <script>
    function togglePw(id, btn) {
      const input = document.getElementById(id);
      const icon = btn.querySelector('.iconify');
      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-icon', 'lucide:eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-icon', 'lucide:eye');
      }
    }

    function checkStrength(pw) {
      const bars = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3'), document.getElementById('bar4')];
      const text = document.getElementById('strengthText');
      let score = 0;
      if (pw.length >= 8) score++;
      if (/[a-z]/.test(pw) && /[A-Z]/.test(pw)) score++;
      if (/\d/.test(pw)) score++;
      if (/[^a-zA-Z0-9]/.test(pw)) score++;
      const levels = ['', 'weak', 'medium', 'medium', 'strong'];
      const labels = ['', 'Lemah', 'Sedang', 'Sedang', 'Kuat'];
      bars.forEach((bar, i) => {
        bar.className = 'strength-bar';
        if (i < score) bar.classList.add('active', levels[score]);
      });
      text.className = 'strength-text';
      if (pw.length > 0) {
        text.classList.add(levels[score]);
        text.textContent = labels[score];
      } else {
        text.textContent = '';
      }
    }

    let toastTimer;
    function showToast(title, msg, type) {
      const toast = document.getElementById('toast');
      const icon = document.getElementById('toastIcon');
      clearTimeout(toastTimer);
      icon.className = 'toast-icon ' + (type === 'error' ? 'error' : 'success');
      icon.innerHTML = type === 'error'
        ? '<span class="iconify" data-icon="lucide:x-circle" data-width="18"></span>'
        : '<span class="iconify" data-icon="lucide:check-circle" data-width="18"></span>';
      document.getElementById('toastTitle').textContent = title;
      document.getElementById('toastMessage').textContent = msg;
      toast.classList.add('show');
      toastTimer = setTimeout(() => toast.classList.remove('show'), 3500);
    }

    function handleSubmit(e) {
      e.preventDefault();
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const pw = document.getElementById('password').value;
      const cpw = document.getElementById('confirmPassword').value;
      if (!name) return showToast('Gagal', 'Nama tidak boleh kosong.', 'error');
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showToast('Gagal', 'Masukkan email yang valid.', 'error');
      if (pw.length < 8) return showToast('Gagal', 'Password minimal 8 karakter.', 'error');
      if (pw !== cpw) return showToast('Gagal', 'Password tidak cocok.', 'error');
      showToast('Berhasil!', 'Akun berhasil dibuat untuk ' + name + '.', 'success');
    }
  </script>

</body>
</html>