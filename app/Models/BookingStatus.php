<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;

    protected $table = 'booking_status';

    protected $fillable = [
        'booking_id',
        'technician_id',
        'status',
        'eta',
    ];

    protected $casts = [
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: BookingStatus belongs to a Booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Relationship: BookingStatus belongs to a Technician (User)
     */
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    /**
     * Get status text
     */
    public function getStatusTextAttribute()
    {
        return \App\Helpers\BookingStatusHelper::getStatusText($this->status);
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return \App\Helpers\BookingStatusHelper::getStatusLabel($this->status);
    }
}
