<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'location',
        'category',
        'image',
        'status',
        'type',
        'area',
        'commencement_date',
        'price_range',
    ];

    protected $casts = [
        'commencement_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
