<!DOCTYPE html>
<html>
<head>
    <style>
        .button {
            background-color: #3b82f6;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #1e40af;">Halo!</h2>
        <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda di <strong>E-Tutor</strong>.</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('reset-password/'.$token.'?email='.$email) }}" class="button" style="color: #ffffff;">Reset Password Sekarang</a>
        </div>
        
        <p>Link reset password ini akan kedaluwarsa dalam 60 menit.</p>
        <p>Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.</p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        
        <p style="font-size: 12px; color: #777;">
            Jika Anda mengalami kesulitan menekan tombol "Reset Password Sekarang", salin dan tempel URL di bawah ini ke browser Anda:<br>
            <a href="{{ url('reset-password/'.$token.'?email='.$email) }}">{{ url('reset-password/'.$token.'?email='.$email) }}</a>
        </p>
    </div>
</body>
</html>
