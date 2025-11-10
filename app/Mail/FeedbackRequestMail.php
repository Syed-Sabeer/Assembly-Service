<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackRequestMail extends Mailable
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

        // Generate review link (user profile page where they can leave a review)
        $reviewLink = route('user.profile') . '#booking-' . $this->booking->id;

        return $this->subject('How Did We Do? - Share Your Experience')
                    ->view('emails.feedback-request')
                    ->with([
                        'clientName' => $this->customer->name,
                        'technicianName' => $this->technician->name,
                        'installationAddress' => $installationAddress,
                        'scheduledDateTime' => $scheduledDateTime,
                        'jobType' => $this->product->title ?? 'Swing Set Assembly',
                        'reviewLink' => $reviewLink,
                        'supportEmail' => config('mail.from.address', 'support@assembly-services.com'),
                    ]);
    }
}




