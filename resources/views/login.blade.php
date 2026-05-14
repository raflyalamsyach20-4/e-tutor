<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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

    /* ========== BACKGROUND ========== */
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

    /* ========== CARD ========== */
    .login-wrapper {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 440px;
      padding: 20px;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(226, 232, 240, 0.6);
      border-radius: 24px;
      padding: 48px 40px 40px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
      animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* ========== BRAND ========== */
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

    /* ========== FORM ========== */
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

    .input-wrapper .input-icon {
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

    /* Toggle password */
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

    /* ========== ROW: remember + forgot ========== */
    .form-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
    }

    .checkbox-wrapper {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }

    .checkbox-wrapper input[type="checkbox"] {
      display: none;
    }

    .custom-checkbox {
      width: 18px;
      height: 18px;
      border: 1.5px solid #CBD5E1;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
      flex-shrink: 0;
      background: #F8FAFC;
    }

    .custom-checkbox .iconify {
      font-size: 12px;
      color: #FFFFFF;
      opacity: 0;
      transform: scale(0.5);
      transition: all 0.2s;
    }

    .checkbox-wrapper input:checked + .custom-checkbox {
      background: #0091FF;
      border-color: #0091FF;
    }

    .checkbox-wrapper input:checked + .custom-checkbox .iconify {
      opacity: 1;
      transform: scale(1);
    }

    .checkbox-label {
      font-size: 13px;
      color: #64748B;
      user-select: none;
    }

    .forgot-link {
      font-size: 13px;
      font-weight: 500;
      color: #0091FF;
      text-decoration: none;
      transition: color 0.2s;
    }

    .forgot-link:hover {
      color: #0070E0;
    }

    /* ========== BUTTON ========== */
    .btn-login {
      width: 100%;
      padding: 15px 24px;
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

    .btn-login::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(0, 145, 255, 0.4);
    }

    .btn-login:hover::before {
      opacity: 1;
    }

    .btn-login:active {
      transform: translateY(0);
      box-shadow: 0 2px 10px rgba(0, 145, 255, 0.3);
    }

    /* ========== DIVIDER ========== */
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

    /* ========== SOCIAL ========== */
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

    /* ========== REGISTER LINK ========== */
    .register-link {
      text-align: center;
      margin-top: 28px;
      font-size: 13px;
      color: #64748B;
    }

    .register-link a {
      color: #0091FF;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s;
    }

    .register-link a:hover {
      color: #0070E0;
    }

    /* ========== TOAST ========== */
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

    /* ========== ANIMATIONS ========== */
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

    /* ========== RESPONSIVE ========== */
    @media (max-width: 480px) {
      .login-wrapper { padding: 16px; }
      .login-card { padding: 36px 24px 32px; border-radius: 20px; }
      .brand h1 { font-size: 24px; }
      .social-buttons { flex-direction: column; }
      .form-row { flex-direction: column; gap: 12px; align-items: flex-start; }
      .toast { left: 16px; right: 16px; max-width: none; }
    }
  </style>
</head>
<body>

  <!-- Background -->
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
      <p id="toastMessage">Login berhasil.</p>
    </div>
  </div>

  <!-- Login Card -->
  <div class="login-wrapper">
    <div class="login-card">

      <!-- Brand -->
      <div class="brand">
        <div class="brand-icon">
          <span class="iconify" data-icon="lucide:graduation-cap"></span>
        </div>
        <h1>Login</h1>
        <p>Masuk ke akun yang sudah terdaftar</p>
      </div>

      <!-- Form -->
      <!-- Form -->
<form id="loginForm" action="{{ route('login') }}" method="POST" novalidate>
  @csrf

  @if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
      {{ $errors->first() }}
    </div>
  @endif

  @if(session('loginError'))
    <div style="color: red; margin-bottom: 10px;">{{ session('loginError') }}</div>
  @endif

  <div class="form-group">
    <label class="form-label" for="email">Email</label>
    <div class="input-wrapper">
      <span class="iconify input-icon" data-icon="lucide:mail"></span>
      <input type="email" id="email" name="email" class="form-input"
             placeholder="nama@email.com" value="{{ old('email') }}" required>
    </div>
  </div>

  <div class="form-group">
    <label class="form-label" for="password">Password</label>
    <div class="input-wrapper">
      <span class="iconify input-icon" data-icon="lucide:lock"></span>
      <input type="password" id="password" name="password"
             class="form-input has-toggle" placeholder="••••••••" required>
      <button type="button" class="toggle-password" onclick="togglePw('password', this)">
        <span class="iconify" data-icon="lucide:eye"></span>
      </button>
    </div>
  </div>

  <!-- Remember me + Forgot -->
  <div class="form-row">
    <label class="checkbox-wrapper">
      <input type="checkbox" id="remember" name="remember">
      <span class="custom-checkbox">
        <span class="iconify" data-icon="lucide:check"></span>
      </span>
      <span class="checkbox-label">Ingat saya</span>
    </label>
    <a href="#" class="forgot-link">Lupa password?</a>
  </div>

  <button type="submit" class="btn-login">Login</button>

</form>

      <!-- Register link -->
      <p class="register-link">Belum punya akun? <a href="/registrasi">Daftar di sini</a></p>

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
      const email = document.getElementById('email').value.trim();
      const pw = document.getElementById('password').value;
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showToast('Gagal', 'Masukkan email yang valid.', 'error');
      if (!pw) return showToast('Gagal', 'Password tidak boleh kosong.', 'error');
      showToast('Berhasil!', 'Login berhasil. Mengalihkan...', 'success');
    }
  </script>

</body>
</html>