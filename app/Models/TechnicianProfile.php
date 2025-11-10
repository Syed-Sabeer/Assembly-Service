<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianProfile extends Model
{
    use HasFactory;

    protected $table = 'technician_profiles';

    protected $fillable = [
        'user_id',
        'job_title',
        'year_of_experience',
        'about',
        'certification',
        'education',
        'projects',
        'resume',
        'profile_picture',
        'is_approved'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'certification' => 'array',
        'education' => 'array',
        'projects' => 'array',
    ];

    /**
     * Relationship: TechnicianProfile belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
