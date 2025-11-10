<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
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
                    
                    <!-- Success Badge -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); width: 64px; height: 64px; border-radius: 50%; position: relative;">
                                <span style="color: #ffffff; font-size: 36px; line-height: 64px;">✓</span>
                            </div>
                            <h2 style="margin: 20px 0 10px; color: #1a1a1a; font-size: 24px; font-weight: 600;">Payment Received</h2>
                            <p style="margin: 0; color: #6b7280; font-size: 16px;">Your installation request is in progress</p>
                        </td>
                    </tr>
                    
                    <!-- Greeting -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Hi <strong>{{ $clientName ?? 'Valued Customer' }}</strong>,</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Thank you for your payment! We've successfully received your order for swing set installation.</p>
                        </td>
                    </tr>
                    
                    <!-- Order Details Box -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 6px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <h3 style="margin: 0 0 16px; color: #1a1a1a; font-size: 16px; font-weight: 600;">Installation Details</h3>
                                        
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top; width: 140px;">Swing Set Model:</td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">{{ $modelName ?? 'Swing Set' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top;">Installation Address:</td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">{{ $address ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top;">Preferred Date & Time:</td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">{{ $dateTime ?? 'TBD' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Next Steps -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; padding: 16px 20px; border-radius: 4px;">
                                <p style="margin: 0; color: #1e40af; font-size: 14px; line-height: 1.6;"><strong>What's Next?</strong><br>Your selected technician will be notified shortly. Once they accept the job, you'll receive another confirmation with full details and contact information.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Important Notice -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 16px 20px; border-radius: 4px;">
                                <p style="margin: 0; color: #92400e; font-size: 13px; line-height: 1.6;"><strong>Important Reminder:</strong> Please ensure your complete swing set kit is available at the installation location. Our service covers professional installation only.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Contact Section -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">If you have any questions, feel free to reply to this email or contact us at <a href="mailto:{{ $supportEmail ?? 'support@assembly-services.com' }}" style="color: #3b82f6; text-decoration: none;">{{ $supportEmail ?? 'support@assembly-services.com' }}</a>.</p>
                            <p style="margin: 20px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Thanks for choosing Assembly Services!</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Best,<br><strong>The Assembly Services Team</strong></p>
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