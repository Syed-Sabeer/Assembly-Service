<?php

namespace App\Mail;

use App\Models\TechnicianProfile;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TechnicianApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $technician;
    public $user;
    public $dashboardUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(TechnicianProfile $technician, User $user)
    {
        $this->technician = $technician;
        $this->user = $user;
        $this->dashboardUrl = route('technician.dashboard');
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Congratulations! Your Technician Application Has Been Approved')
                    ->view('emails.technicians-approved')
                    ->with([
                        'technicianName' => $this->user->name,
                        'dashboardUrl' => $this->dashboardUrl,
                        'supportEmail' => config('mail.from.address', 'support@assembly-services.com'),
                    ]);
    }
}

