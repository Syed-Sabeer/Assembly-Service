<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Approved</title>
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
                    
                    <!-- Celebration Badge -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); width: 72px; height: 72px; border-radius: 50%; position: relative; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                                <span style="color: #ffffff; font-size: 36px; line-height: 72px;">🎉</span>
                            </div>
                            <h2 style="margin: 20px 0 10px; color: #1a1a1a; font-size: 26px; font-weight: 600;">Congratulations!</h2>
                            <p style="margin: 0; color: #10b981; font-size: 17px; font-weight: 500;">Your Application Has Been Approved</p>
                        </td>
                    </tr>
                    
                    <!-- Welcome Message -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Hi <strong>{{ $technicianName ?? 'Technician' }}</strong>,</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Welcome to the Assembly Services team! Your technician application has been approved, and we're thrilled to have you onboard.</p>
                        </td>
                    </tr>
                    
                    <!-- Status Box -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 8px; overflow: hidden;">
                                <tr>
                                    <td style="padding: 28px 24px; text-align: center;">
                                        <div style="margin-bottom: 16px;">
                                            <span style="display: inline-block; background-color: rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 20px; color: #ffffff; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">✓ Active Status</span>
                                        </div>
                                        <h3 style="margin: 0 0 8px; color: #ffffff; font-size: 19px; font-weight: 600;">You're Now a Certified Technician</h3>
                                        <p style="margin: 0; color: rgba(255,255,255,0.95); font-size: 14px; line-height: 1.5;">Your profile is live and you can start receiving job offers immediately</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Getting Started -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <h3 style="margin: 0 0 16px; color: #1a1a1a; font-size: 17px; font-weight: 600;">Getting Started</h3>
                            
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 0 0 12px 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width: 32px; vertical-align: top; padding-top: 2px;">
                                                    <div style="width: 24px; height: 24px; background-color: #dbeafe; border-radius: 50%; text-align: center; line-height: 24px;">
                                                        <span style="color: #3b82f6; font-size: 12px; font-weight: 600;">1</span>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 12px;">
                                                    <p style="margin: 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">Log in to your Technician Panel</p>
                                                    <p style="margin: 4px 0 0; color: #6b7280; font-size: 13px;">Access your personalized dashboard</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding: 0 0 12px 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width: 32px; vertical-align: top; padding-top: 2px;">
                                                    <div style="width: 24px; height: 24px; background-color: #dbeafe; border-radius: 50%; text-align: center; line-height: 24px;">
                                                        <span style="color: #3b82f6; font-size: 12px; font-weight: 600;">2</span>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 12px;">
                                                    <p style="margin: 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">Browse available job opportunities</p>
                                                    <p style="margin: 4px 0 0; color: #6b7280; font-size: 13px;">View installation requests in your area</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width: 32px; vertical-align: top; padding-top: 2px;">
                                                    <div style="width: 24px; height: 24px; background-color: #dbeafe; border-radius: 50%; text-align: center; line-height: 24px;">
                                                        <span style="color: #3b82f6; font-size: 12px; font-weight: 600;">3</span>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 12px;">
                                                    <p style="margin: 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">Accept jobs and start earning</p>
                                                    <p style="margin: 4px 0 0; color: #6b7280; font-size: 13px;">Begin your journey with Assembly Services</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- CTA Button -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding: 20px 0;">
                                        <a href="{{ $dashboardUrl ?? route('technician.dashboard') }}" style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 6px; font-size: 15px; font-weight: 600; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">Login to Dashboard</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Support Info -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #f9fafb; border-radius: 6px; padding: 20px 24px; border: 1px solid #e5e7eb;">
                                <h3 style="margin: 0 0 8px; color: #1a1a1a; font-size: 15px; font-weight: 600;">Need Help Getting Started?</h3>
                                <p style="margin: 0; color: #6b7280; font-size: 14px; line-height: 1.6;">Our support team is here to help. If you have any questions, reach out to us at <a href="mailto:{{ $supportEmail ?? 'support@assembly-services.com' }}" style="color: #009688; text-decoration: none;">{{ $supportEmail ?? 'support@assembly-services.com' }}</a>.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Closing -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">We're excited to have you as part of our professional network!</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Best,<br><strong>Assembly Services Team</strong></p>
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