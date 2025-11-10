<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $user;
    public $product;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, User $user, Product $product)
    {
        $this->booking = $booking;
        $this->user = $user;
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

        return $this->subject('Payment Confirmation - Your Installation Request is Confirmed')
                    ->view('emails.payment-confirmation')
                    ->with([
                        'clientName' => $this->user->name,
                        'modelName' => $this->product->title ?? 'Swing Set',
                        'address' => $this->booking->installation_address,
                        'dateTime' => $preferredDateTime,
                        'supportEmail' => config('mail.from.address', 'support@assembly-services.com'),
                    ]);
    }
}

