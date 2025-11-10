<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'product_id',
        'user_id',
        'technician_id',
        'installation_address',
        'city',
        'zip',
        'preferred_date',
        'preferred_time',
        'notes',
        'amount',
        'payment_method',
        'payment_id',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: Booking belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Booking belongs to a Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship: Booking belongs to a Technician (User with technician role)
     */
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    /**
     * Relationship: Booking has many BookingStatus records
     */
    public function bookingStatuses()
    {
        return $this->hasMany(BookingStatus::class);
    }

    /**
     * Relationship: Get the latest booking status
     */
    public function latestBookingStatus()
    {
        return $this->hasOne(BookingStatus::class)->latestOfMany();
    }
}

