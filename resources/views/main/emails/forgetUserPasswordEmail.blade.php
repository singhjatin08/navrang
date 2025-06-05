<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F9DCBE;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .header {
            background-color: #F9DCBE;
            color: #450A20;
            padding: 30px;
            text-align: center;
        }
        .header img {
            width: 140px;
            margin-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .content {
            padding: 30px;
            color: #333;
            font-size: 16px;
            line-height: 1.7;
        }
        .content p {
            margin: 15px 0;
        }
        .button {
            display: inline-block;
            background-color: #450A20;
            color: #fff !important;
            padding: 14px 26px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 20px;
        }
        .footer {
            background-color: #450A20;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #fff;
        }
        .footer a {
            color: #F9DCBE;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://navrangaromacandles.com/public/assets/images/logo.png" alt="Logo">
            <h1>Password Reset Request</h1>
        </div>
        <div class="content">
            <p>Hello {{ $name ?? 'User' }},</p>

            <p>We received a request to reset your password for your {{ config('app.name') }} account. This password reset link is valid for 10 minutes only. Click the button below to set a new password:</p>

            <p style="text-align: center;">
                <a href="{{ $url }}" class="button">Reset Password</a>
            </p>

            <p>If you did not request a password reset, no further action is required.</p>

            <p>Thanks,<br>The {{ config('app.name') }} Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved. <br>
            Having trouble? <a href="{{ $url }}">Click here</a> to open the link manually.
        </div>
    </div>
</body>
</html>
