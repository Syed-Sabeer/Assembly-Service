<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TechnicianOnRouteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $bookingStatus;
    public $technician;
    public $customer;
    public $product;
    public $eta;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, BookingStatus $bookingStatus, User $technician, User $customer, Product $product, $eta)
    {
        $this->booking = $booking;
        $this->bookingStatus = $bookingStatus;
        $this->technician = $technician;
        $this->customer = $customer;
        $this->product = $product;
        $this->eta = $eta;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Format the address
        $address = $this->booking->installation_address . ', ' . $this->booking->city . ' ' . $this->booking->zip;

        return $this->subject('Your Technician is On the Way!')
                    ->view('emails.technicians-route')
                    ->with([
                        'clientName' => $this->customer->name,
                        'technicianName' => $this->technician->name,
                        'address' => $address,
                        'eta' => $this->eta,
                        'supportEmail' => config('mail.from.address', 'support@assembly-services.com'),
                    ]);
    }
}




