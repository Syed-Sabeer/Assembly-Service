<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Offer - Assembly Services</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f5f5;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f5f5f5;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; max-width: 600px;">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); padding: 30px 20px;     border-radius: 10px 10px 0 0;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="background-color: #ffffff; width: 60px; height: 60px; border-radius: 50%; font-size: 30px; line-height: 60px;">
                                                    🔔
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-top: 15px;">
                                        <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 600;">New Job Offer</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                
                                <!-- Greeting -->
                                <tr>
                                    <td style="font-size: 18px; color: #333333; padding-bottom: 20px;">
                                        Hi <strong>{{ $technicianName ?? 'Technician' }}</strong>,
                                    </td>
                                </tr>

                                <!-- Message -->
                                <tr>
                                    <td style="font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 30px;">
                                        Great news! You've been selected for a new swing set installation job. A client has requested your expertise based on your skills and availability.
                                    </td>
                                </tr>

                                <!-- Job Details Box -->
                                <tr>
                                    <td style="padding-bottom: 25px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background: linear-gradient(135deg, rgba(46, 125, 181, 0.05) 0%, rgba(118, 185, 71, 0.05) 100%); border-left: 4px solid #009688; border-radius: 4px;">
                                            <tr>
                                                <td style="padding: 25px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        
                                                        <!-- Job Details Header -->
                                                        <tr>
                                                            <td colspan="2" style="color: #2E7DB5; font-size: 18px; font-weight: 600; padding-bottom: 20px;">
                                                                📋 Job Details
                                                            </td>
                                                        </tr>

                                                        <!-- Client Name -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; width: 140px; vertical-align: top;">
                                                                Client Name:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $clientName ?? 'Client' }}
                                                            </td>
                                                        </tr>

                                                        <!-- Installation Address -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; vertical-align: top;">
                                                                Installation Address:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $installationAddress ?? 'N/A' }}
                                                            </td>
                                                        </tr>

                                                        <!-- Scheduled Date -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; vertical-align: top;">
                                                                Scheduled Date:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $scheduledDateTime ?? 'TBD' }}
                                                            </td>
                                                        </tr>

                                                        <!-- Swing Set Model -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; vertical-align: top;">
                                                                Swing Set Model:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $modelName ?? 'Swing Set' }}
                                                            </td>
                                                        </tr>

                                                        <!-- Job Payment -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; vertical-align: top;">
                                                                Job Payment:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px;">
                                                                <span style="background-color: #009688; color: #ffffff; padding: 4px 10px; border-radius: 4px; font-weight: 600; display: inline-block;">
                                                                    {{ $amount ?? '$0.00' }}
                                                                </span>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Alert Note -->
                                <tr>
                                    <td style="padding-bottom: 25px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #e9fffd;border-left: 4px solid #009688; border-radius: 4px;">
                                            <tr>
                                                <td style="padding: 15px; font-size: 14px; color: #666666;">
                                                    ⏰ <strong>Action Required:</strong> Please review and respond to this job offer within 24 hours. Accept or decline through your technician dashboard.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- CTA Button -->
                                <tr>
                                    <td align="center" style="padding: 35px 0;">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 5px;">
                                                    <a href="{{ $dashboardUrl ?? route('technician.dashboard') }}" style="color: #ffffff; text-decoration: none; padding: 15px 40px; display: block; font-size: 16px; font-weight: 600;">
                                                        Login to Dashboard
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Bottom Message -->
                                <tr>
                                    <td style="font-size: 16px; color: #555555; line-height: 1.6;">
                                        If you have any questions about this job or need additional details, please don't hesitate to contact us. We're here to support you!
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #e3e4e5; padding: 30px; border-top: 1px solid #e0e0e0; border-radius: 0 0 10px 10px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" style="font-size: 18px; font-weight: 600; color: #009688; padding-bottom: 5px;">
                                        Assembly Services
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 13px; color: #888888; padding-bottom: 15px;">
                                        Professional Swing Set Installation Services
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 14px; color: #666666; padding-bottom: 15px;">
                                        <a href="https://assembly-services.thevisionbrands.com/" style="color: #009688; text-decoration: none;">
                                            assembly-services.thevisionbrands.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- <td align="center" style="font-size: 12px; color: #999999;">
                                        Thanks for being part of the Assembly Services Team
                                    </td> -->
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>