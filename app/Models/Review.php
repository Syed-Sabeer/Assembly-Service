<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'booking_id',
        'rating',
        'review',
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: Review belongs to a Booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the technician through the booking
     */
    public function technician()
    {
        return $this->hasOneThrough(
            User::class,
            Booking::class,
            'id', // Foreign key on bookings table
            'id', // Foreign key on users table
            'booking_id', // Local key on reviews table
            'technician_id' // Local key on bookings table
        );
    }
}

