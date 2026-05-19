<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            background-color: #f8fafc; /* brand-light */
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .container {
            max-width: 540px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px -10px rgba(15, 76, 129, 0.1);
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }
        .header {
            background-color: #0F4C81; /* brand-blue */
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.02em;
        }
        .header h1 span {
            color: #F59E0B; /* brand-yellow */
        }
        .content {
            padding: 40px 36px;
        }
        .greeting {
            font-size: 20px;
            font-weight: 700;
            color: #0F4C81; /* brand-blue */
            margin-top: 0;
            margin-bottom: 20px;
        }
        .text {
            margin-bottom: 24px;
            font-size: 15px;
            color: #475569;
            line-height: 1.7;
        }
        .button-wrapper {
            text-align: center;
            margin: 40px 0;
        }
        .button {
            background-color: #F59E0B; /* brand-yellow */
            color: #0F4C81 !important;
            padding: 16px 32px;
            text-decoration: none;
            border-radius: 14px;
            font-weight: 800;
            font-size: 15px;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.25);
        }
        .divider {
            border: none;
            border-top: 2px dashed #f1f5f9;
            margin: 10px 36px 30px;
        }
        .footer {
            font-size: 12px;
            color: #94a3b8;
            padding: 0 36px 36px;
            line-height: 1.6;
        }
        .footer-link {
            color: #0F4C81;
            font-weight: 600;
            word-break: break-all;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div style="background-color: #f8fafc; padding: 20px 0;">
        <div class="container">
            <div class="header">
                <h1>E-Tutor <span>Premium</span></h1>
            </div>
            <div class="content">
                <h2 class="greeting">Halo! 👋</h2>
                <p class="text">Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda di sistem akademik <strong>E-Tutor</strong>.</p>
                
                <div class="button-wrapper">
                    <a href="{{ url('reset-password/'.$token.'?email='.$email) }}" class="button">Atur Ulang Password</a>
                </div>
                
                <p class="text">Tautan ini dikirimkan secara khusus dan hanya berlaku selama <strong>60 menit</strong>. Jika Anda tidak pernah merasa meminta pengaturan ulang password, akun Anda aman dan silakan abaikan email ini.</p>
                <p class="text" style="margin-bottom: 0; margin-top: 30px;">Salam hormat,<br><strong style="color: #0F4C81;">Tim Akademik E-Tutor</strong></p>
            </div>
            
            <hr class="divider">
            
            <div class="footer">
                Jika Anda mengalami kesulitan menekan tombol "Atur Ulang Password", salin dan tempel URL di bawah ini ke browser Anda:<br><br>
                <a href="{{ url('reset-password/'.$token.'?email='.$email) }}" class="footer-link">{{ url('reset-password/'.$token.'?email='.$email) }}</a>
            </div>
        </div>
    </div>
</body>
</html>
