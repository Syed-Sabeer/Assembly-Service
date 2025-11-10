<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician En Route</title>
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
                    
                    <!-- En Route Badge -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
                                width: 64px; height: 64px; border-radius: 50%; position: relative;">
                                <span style="color: #ffffff; font-size: 32px; line-height: 64px;">✓</span>
                            </div>
                            <h2 style="margin: 20px 0 10px; color: #1a1a1a; font-size: 24px; font-weight: 600;">Technician On the Way!</h2>
                            <p style="margin: 0; color: #6b7280; font-size: 16px;">Your installation will begin shortly</p>
                        </td>
                    </tr>
                    
                    <!-- Greeting -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Hi <strong>{{ $clientName }}</strong>,</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Just a heads-up — your technician, <strong>{{ $technicianName }}</strong>, is now on the way to your location.</p>
                        </td>
                    </tr>
                    
                    <!-- Location & ETA Box -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 8px; overflow: hidden;">
                                <tr>
                                    <td style="padding: 24px;">
                                        <!-- Location -->
                                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 16px;">
                                            <tr>
                                                <td style="width: 32px; vertical-align: top;">
                                                    <div style="width: 28px; height: 28px; background-color: rgba(255,255,255,0.2); border-radius: 50%; text-align: center; line-height: 28px;">
                                                        <span style="font-size: 16px;">📍</span>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 12px;">
                                                    <p style="margin: 0 0 4px; color: rgba(255,255,255,0.9); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Installation Address</p>
                                                    <p style="margin: 0; color: #ffffff; font-size: 15px; font-weight: 500; line-height: 1.4;">{{ $address }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <!-- Divider -->
                                        <div style="height: 1px; background-color: rgba(255,255,255,0.2); margin: 16px 0;"></div>
                                        
                                        <!-- ETA -->
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width: 32px; vertical-align: top;">
                                                    <div style="width: 28px; height: 28px; background-color: rgba(255,255,255,0.2); border-radius: 50%; text-align: center; line-height: 28px;">
                                                        <span style="font-size: 16px;">🕒</span>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 12px;">
                                                    <p style="margin: 0 0 4px; color: rgba(255,255,255,0.9); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Estimated Arrival Time</p>
                                                    <p style="margin: 0; color: #ffffff; font-size: 15px; font-weight: 500;">{{ $eta }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Important Reminder -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <div style="background-color: #dff9f7; border-left: 4px solid #009688; padding: 16px 20px; border-radius: 4px;">
                                <p style="margin: 0;     color: #045049; font-size: 14px; line-height: 1.6;"><strong>Please Note:</strong> Make sure someone is available at the location at the scheduled time to greet your technician.</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Contact Information -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 6px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <h3 style="margin: 0 0 12px; color: #1a1a1a; font-size: 15px; font-weight: 600;">Need to Get in Touch?</h3>
                                        
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top; width: 120px;">
                                                    Your Technician:
                                                </td>
                                                <td style="padding: 8px 0; color: #1a1a1a; font-size: 14px; font-weight: 500;">
                                                    {{ $technicianName }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #6b7280; font-size: 14px; vertical-align: top;">
                                                    Our Support Team:
                                                </td>
                                                <td style="padding: 8px 0; color: #3b82f6; font-size: 14px; font-weight: 500;">
                                                    <a href="mailto:{{ $supportEmail }}" style="color: #3b82f6; text-decoration: none;">{{ $supportEmail }}</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Closing -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">Thank you for choosing Assembly Services!</p>
                            <p style="margin: 15px 0 0; color: #374151; font-size: 15px; line-height: 1.6;">Warm regards,<br><strong>The Assembly Services Team</strong></p>
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