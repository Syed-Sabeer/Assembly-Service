<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f5f5f5;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f5f5; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); padding: 40px 40px 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 600; letter-spacing: -0.5px;">Assembly Services</h1>
                        </td>
                    </tr>
                    
                    <!-- Security Badge -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); width: 64px; height: 64px; border-radius: 50%; position: relative;">
                                <span style="color: #ffffff; font-size: 32px; line-height: 64px;">🔒</span>
                            </div>
                            <h2 style="margin: 20px 0 10px; color: #1a1a1a; font-size: 24px; font-weight: 600;">Password Reset Request</h2>
                            <p style="margin: 0; color: #6b7280; font-size: 16px;">Use the code below to reset your password</p>
                        </td>
                    </tr>
                    
                    <!-- Greeting -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Hi <strong>{{ $userName ?? 'Valued User' }}</strong>,</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">We received a request to reset your password. Use the verification code below to complete the process.</p>
                        </td>
                    </tr>
                    
                    <!-- OTP Box -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 8px; border: 2px solid #ffffff;">
                                <tr>
                                    <td style="padding: 30px 24px; text-align: center;">
                                        <h3 style="margin: 0 0 12px; color: #ffffff; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Your Verification Code</h3>
                                        
                                        <!-- OTP Display -->
                                        <div style="margin: 20px 0;">
                                            <div style="display: inline-block; background-color: rgba(255,255,255,0.2); padding: 20px 40px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                                                <div style="font-size: 42px; font-weight: 700; color: #ffffff; letter-spacing: 8px; font-family: 'Courier New', monospace;">
                                                    {{ $otp }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <p style="margin: 20px 0 0; color: rgba(255,255,255,0.95); font-size: 13px; line-height: 1.6;">This code will expire in <strong>10 minutes</strong>. If you didn't request this, please ignore this email.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Security Notice -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; padding: 16px 20px; border-radius: 4px;">
                                <p style="margin: 0 0 4px; color: #01685f; font-size: 14px; font-weight: 600;">Security Reminder</p>
                                <p style="margin: 0; color: #5c5c5c; font-size: 13px; line-height: 1.6;">Never share this code with anyone. Assembly Services will never ask for your password or verification code via email or phone.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Instructions -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 6px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <h3 style="margin: 0 0 12px; color: #1a1a1a; font-size: 15px; font-weight: 600;">How to Reset Your Password</h3>
                                        
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top; width: 30px;">
                                                    <strong style="color: #3375d1;">1.</strong>
                                                </td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px;">
                                                    Enter the verification code above in the password reset form
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top;">
                                                    <strong style="color: #3375d1;">2.</strong>
                                                </td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px;">
                                                    Create a new secure password
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top;">
                                                    <strong style="color: #3375d1;">3.</strong>
                                                </td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px;">
                                                    Log in with your new password
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Additional Support -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #6b7280; font-size: 14px; line-height: 1.6; text-align: center;">Having trouble? Please don't hesitate to <a href="mailto:{{ $supportEmail }}" style="color: #3b82f6; text-decoration: none;">contact us</a>.</p>
                        </td>
                    </tr>
                    
                    <!-- Closing -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Best regards,<br><strong>The Assembly Services Team</strong></p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #e3e4e5; padding: 30px 40px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0 0 10px; color: #009688; font-size: 18px; font-weight: 600;">Assembly Services</p>
                            <p style="margin: 0; color: #464748; font-size: 14px; line-height: 1.6;">Professional Swing Set Installation Services<br>
                            <a href="https://assembly-services.thevisionbrands.com" style="color: #009688; text-decoration: none;">assembly-services.thevisionbrands.com</a></p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>




