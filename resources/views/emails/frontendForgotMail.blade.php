<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h2 style="color: #294985;">Hello!</h2>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ route('frontend.password.reset', ['token' => $token]) }}" 
               style="background-color: #294985; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
               Reset Password
            </a>
        </p>
        <p>This password reset link will expire in 60 minutes.</p>
        <p>If you did not request a password reset, no further action is required.</p>
        <p>Regards,<br>TimeMatters Team</p>
    </div>
</body>
</html>
