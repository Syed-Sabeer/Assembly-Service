<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $table = 'about_sections';

    protected $fillable = [
        'about_heading',
        'about_vision',
        'about_mission',
        'local_reach_value',
        'trusted_expertise_value',
        'whoarewe_heading',
        'whoarewe_description',
        'whoarewe_points',
        'whoarewe_value',
        'about_tab_value1',
        'about_tab_heading1',
        'about_tab_description1',
        'about_tab_value2',
        'about_tab_heading2',
        'about_tab_description2',
        'about_tab_value3',
        'about_tab_heading3',
        'about_tab_description3',
        'about_tab_value4',
        'about_tab_heading4',
        'about_tab_description4',
    ];

    protected $casts = [
        'whoarewe_points' => 'array', 
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
