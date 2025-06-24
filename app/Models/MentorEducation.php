<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorEducation extends Model
{
    use HasFactory;

    /**
     * PERBAIKAN: Kolom disesuaikan dengan file migrasi.
     */
    protected $fillable = [
        'university',
        'title',
        'field_of_study',
        'location',
        'start_date',
        'end_date',
        'grade',              // 
        'activities',         // 
        'description',        //    // Sebelumnya 'end_year'
    ];
protected $dates = ['start_date', 'end_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'mentor_educations';

}