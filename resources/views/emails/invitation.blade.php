<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #0f172a; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: linear-gradient(to br, #1e293b, #0f172a); border-radius: 16px; overflow: hidden; border: 1px solid #334155; }
        .header { background: linear-gradient(to r, #4f46e5, #7c3aed); padding: 30px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 24px; }
        .content { padding: 40px 30px; color: #cbd5e1; }
        .content h2 { color: white; margin-top: 0; }
        .token-box { background: #1e293b; border: 2px solid #4f46e5; border-radius: 12px; padding: 20px; text-align: center; margin: 30px 0; }
        .token { font-size: 32px; font-weight: bold; color: #818cf8; letter-spacing: 4px; }
        .button { display: inline-block; background: linear-gradient(to r, #4f46e5, #7c3aed); color: white; padding: 14px 32px; text-decoration: none; border-radius: 8px; font-weight: bold; margin: 20px 0; }
        .footer { background: #0f172a; padding: 20px; text-align: center; color: #64748b; font-size: 12px; border-top: 1px solid #334155; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏠 EasyColoc Invitation</h1>
        </div>
        <div class="content">
            <h2>Hello!</h2>
            <p><strong>{{ $inviterName }}</strong> has invited you to join their colocation: <strong>{{ $colocationName }}</strong></p>
            
            <p>Use the token below to join:</p>
            
            <div class="token-box">
                <div class="token">{{ $token }}</div>
            </div>
            
            <p style="text-align: center;">
                <a href="{{ route('colocations.join.page') }}" class="button">Join Colocation</a>
            </p>
            
            <p style="font-size: 14px; color: #94a3b8;">
                Simply click the button above and enter your token to join the colocation and start managing expenses together!
            </p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} EasyColoc. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
