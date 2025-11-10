<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Request</title>
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
                    
                    <!-- Completion Badge -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); width: 64px; height: 64px; border-radius: 50%; position: relative;">
                                <span style="color: #ffffff; font-size: 32px; line-height: 64px;">✓</span>
                            </div>
                            <h2 style="margin: 20px 0 10px; color: #1a1a1a; font-size: 24px; font-weight: 600;">How Did We Do?</h2>
                            <p style="margin: 0; color: #6b7280; font-size: 16px;">Your installation is complete</p>
                        </td>
                    </tr>
                    
                    <!-- Greeting -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Hi <strong>{{ $clientName }}</strong>,</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Your swing set installation is now complete. We hope everything went smoothly and you're satisfied with the service!</p>
                        </td>
                    </tr>
                    
                    <!-- Feedback Request Box -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 8px; border: 2px solid #ffffff;">
                                <tr>
                                    <td style="padding: 30px 24px; text-align: center;">
                                        <h3 style="margin: 0 0 12px; color: #ffffff; font-size: 18px; font-weight: 600;">We'd Love Your Feedback!</h3>
                                        <p style="margin: 0 0 20px;     color: #ffffff; font-size: 14px; line-height: 1.6;">Please take a moment to rate your technician and share your experience. Your feedback helps us improve and supports our team.</p>
                                        
                                        <!-- Star Rating Visual -->
                                        <div style="margin: 0 0 24px;">
                                            <span style="    color: #ffffff; font-size: 28px; letter-spacing: 4px;">★ ★ ★ ★ ★</span>
                                        </div>
                                        
                                        <!-- CTA Button -->
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <a href="{{ $reviewLink }}" style="display: inline-block; background-color: #1a1a1a; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 6px; font-size: 15px; font-weight: 600; text-align: center;">Leave a Review</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Why Feedback Matters -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #eff6ff; border-left: 4px solid #009688; padding: 16px 20px; border-radius: 4px;">
                                <p style="margin: 0 0 4px; color: #01685f; font-size: 14px; font-weight: 600;">Why Your Feedback Matters</p>
                                <p style="margin: 0;     color: #5c5c5c; font-size: 13px; line-height: 1.6;">Your honest review helps us maintain quality service and assists other customers in making informed decisions. It also directly supports your technician's growth and success.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Service Summary (Optional Section) -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 6px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <h3 style="margin: 0 0 12px; color: #1a1a1a; font-size: 15px; font-weight: 600;">Service Completed</h3>
                                        
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 6px 0; color: #6b7280; font-size: 14px; vertical-align: top; width: 100px;">
                                                    Technician:
                                                </td>
                                                <td style="padding: 6px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">
                                                    {{ $technicianName }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0; color: #6b7280; font-size: 14px; vertical-align: top;">
                                                    Service Date:
                                                </td>
                                                <td style="padding: 6px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">
                                                    {{ $scheduledDateTime }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0; color: #6b7280; font-size: 14px; vertical-align: top;">
                                                    Location:
                                                </td>
                                                <td style="padding: 6px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">
                                                    {{ $installationAddress }}
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
                            <p style="margin: 0; color: #6b7280; font-size: 14px; line-height: 1.6; text-align: center;">Have any issues or concerns? Please don't hesitate to <a href="mailto:{{ $supportEmail }}" style="color: #3b82f6; text-decoration: none;">contact us</a>.</p>
                        </td>
                    </tr>
                    
                    <!-- Closing -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Thanks again for choosing Assembly Services!</p>
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