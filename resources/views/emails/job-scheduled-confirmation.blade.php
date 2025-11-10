<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Scheduled - Assembly Services</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f5f5;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f5f5f5;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; max-width: 600px;">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); border-radius: 10px 10px 0 0; padding: 30px 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="background-color: #ffffff; width: 60px; height: 60px; border-radius: 50%; font-size: 30px; line-height: 60px;">
                                                    ✓
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-top: 15px;">
                                        <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 600;">Job Scheduled Successfully!</h1>
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
                                        Hi <strong>{{ $technicianName }}</strong>,
                                    </td>
                                </tr>

                                <!-- Message -->
                                <tr>
                                    <td style="font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 30px;">
                                        Great! You've successfully accepted the following job, and it's now scheduled in your Technician Panel. The client is looking forward to working with you.
                                    </td>
                                </tr>

                                <!-- Job Details Box -->
                                <tr>
                                    <td style="padding-bottom: 25px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background: linear-gradient(135deg, rgba(46, 125, 181, 0.05) 0%, rgba(118, 185, 71, 0.05) 100%); border-left: 4px solid #76B947; border-radius: 4px;">
                                            <tr>
                                                <td style="padding: 25px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        
                                                        <!-- Job Details Header -->
                                                        <tr>
                                                            <td colspan="2" style=" color: #009688; font-size: 18px; font-weight: 600; padding-bottom: 20px;">
                                                                📅 Your Scheduled Job
                                                            </td>
                                                        </tr>

                                                        <!-- Client Name -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; width: 140px; vertical-align: top;">
                                                                Client:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $clientName }}
                                                            </td>
                                                        </tr>

                                                        <!-- Installation Address -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; vertical-align: top;">
                                                                Address:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                {{ $installationAddress }}
                                                            </td>
                                                        </tr>

                                                        <!-- Scheduled Date & Time -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; padding-bottom: 15px; vertical-align: top;">
                                                                Date & Time:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px; padding-bottom: 15px;">
                                                                <strong style="color: #009688;">{{ $scheduledDateTime }}</strong>
                                                            </td>
                                                        </tr>

                                                        <!-- Job Type -->
                                                        <tr>
                                                            <td style="font-weight: 600; color: #333333; font-size: 15px; vertical-align: top;">
                                                                Job Type:
                                                            </td>
                                                            <td style="color: #555555; font-size: 15px;">
                                                                Swing Set Assembly
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Important Reminder Box -->
                                <tr>
                                    <td style="padding-bottom: 25px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #E8F5E9; border-left: 4px solid #76B947; border-radius: 4px;">
                                            <tr>
                                                <td style="padding: 20px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="font-size: 15px; font-weight: 600; color: #009688; padding-bottom: 10px;">
                                                                📍 Important Reminder
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; color: #555555; line-height: 1.6;">
                                                                Remember to mark yourself as <strong>"On Route"</strong> in your dashboard when you're heading out on the day of the appointment. This helps the client track your arrival.
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Preparation Tips -->
                                <tr>
                                    <td style="padding-bottom: 30px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="font-size: 16px; font-weight: 600; color: #333333; padding-bottom: 15px;">
                                                    🛠️ Preparation Tips
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="font-size: 14px; color: #555555; line-height: 1.8; padding-left: 20px;">
                                                                • Review the job details before the scheduled date<br>
                                                                • Ensure you have all necessary tools and equipment<br>
                                                                • Contact the client if you need any clarifications<br>
                                                                • Arrive on time or notify the client of any delays
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
                                    <td align="center" style="padding: 35px 0;">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);border-radius: 5px;">
                                                    <a href="{{ $dashboardUrl }}" style="color: #ffffff; text-decoration: none; padding: 15px 40px; display: block; font-size: 16px; font-weight: 600;">
                                                        Access Your Dashboard
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Bottom Message -->
                                <tr>
                                    <td style="font-size: 16px; color: #555555; line-height: 1.6; text-align: center;">
                                        Thanks for being part of the Assembly Services network!
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
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