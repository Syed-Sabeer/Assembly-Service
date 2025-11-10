<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $userName;

    public function __construct($otp, $userName = null)
    {
        $this->otp = $otp;
        $this->userName = $userName;
    }

    public function build()
    {
        $supportEmail = config('mail.from.address', 'support@assembly-services.com');
        
        return $this->subject('Password Reset OTP - Assembly Services')
                    ->view('emails.password-reset-otp')
                    ->with([
                        'otp' => $this->otp,
                        'userName' => $this->userName,
                        'supportEmail' => $supportEmail,
                    ]);
    }
}
