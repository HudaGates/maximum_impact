<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'user_id',
        'name',
        'job_title',
        'location',
        'institution',
        'about',
        'profile_photo_path', 
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

 
    public function experiences() {
        return $this->hasMany(MentorExperience::class);
    }

    public function educations() {
        return $this->hasMany(MentorEducation::class);
    }

    public function skills() {
        return $this->hasMany(MentorSkill::class);
    }
}