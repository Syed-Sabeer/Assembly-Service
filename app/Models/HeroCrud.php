<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroCrud extends Model
{
    use HasFactory;

    protected $table = 'hero_cruds'; 

    protected $fillable = [
        'badge_title',
        'title',
        'description',
        'image',
        'video_link',
        'button_link',
    ];
}
