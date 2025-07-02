<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorExperience extends Model
{
    use HasFactory;

    /**
     * PERBAIKAN: Kolom disesuaikan dengan file migrasi.
     */
    protected $fillable = [
        'mentor_id',
        'position',
        'type',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}