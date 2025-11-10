<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobScheduledConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $bookingStatus;
    public $technician;
    public $customer;
    public $product;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, BookingStatus $bookingStatus, User $technician, User $customer, Product $product)
    {
        $this->booking = $booking;
        $this->bookingStatus = $bookingStatus;
        $this->technician = $technician;
        $this->customer = $customer;
        $this->product = $product;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Format the installation address
        $installationAddress = $this->booking->installation_address . ', ' . $this->booking->city . ' ' . $this->booking->zip;
        
        // Format scheduled date & time
        $scheduledDateTime = 'TBD';
        if ($this->booking->preferred_date) {
            $scheduledDateTime = $this->booking->preferred_date->format('F j, Y');
            if ($this->booking->preferred_time) {
                $scheduledDateTime .= ' at ' . $this->booking->preferred_time;
            }
        }

        return $this->subject('Job Scheduled Successfully!')
                    ->view('emails.job-scheduled-confirmation')
                    ->with([
                        'technicianName' => $this->technician->name,
                        'clientName' => $this->customer->name,
                        'installationAddress' => $installationAddress,
                        'scheduledDateTime' => $scheduledDateTime,
                        'dashboardUrl' => route('technician.dashboard'),
                    ]);
    }
}




