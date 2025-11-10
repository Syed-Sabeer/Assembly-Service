<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHeroSection extends Model
{
    protected $table = 'home_hero_sections';

    protected $fillable = [
        'heading',
        'description',
        'points',
        'experience',
        'name',
        'designation',
        'badge',
        
    ];

    protected $casts = [
        'points' => 'array',
    ];
}
