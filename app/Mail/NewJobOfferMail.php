<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewJobOfferMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $technician;
    public $customer;
    public $product;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, User $technician, User $customer, Product $product)
    {
        $this->booking = $booking;
        $this->technician = $technician;
        $this->customer = $customer;
        $this->product = $product;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $preferredDateTime = $this->booking->preferred_date 
            ? $this->booking->preferred_date->format('F j, Y') . ' at ' . $this->booking->preferred_time
            : 'TBD';

        $amount = '$' . number_format($this->booking->amount, 2);

        return $this->subject('New Job Offer - Swing Set Installation')
                    ->view('emails.new-job-offer')
                    ->with([
                        'technicianName' => $this->technician->name,
                        'clientName' => $this->customer->name,
                        'installationAddress' => $this->booking->installation_address . ', ' . $this->booking->city . ', ' . $this->booking->zip,
                        'scheduledDateTime' => $preferredDateTime,
                        'modelName' => $this->product->title ?? 'Swing Set',
                        'amount' => $amount,
                        'dashboardUrl' => route('technician.dashboard'),
                    ]);
    }
}

