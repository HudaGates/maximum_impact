<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'goals',
        'market',
        'tag',
        'start_date',
        'end_date',
        'pitch_deck',
        'video',
        'cover_image', // <-- TAMBAHKAN INI
        'category',
        'investment_needs',
        'roadmap',
        'user_id', // <-- TAMBAHKAN INI
    ];

    /**
     * Dapatkan user yang memiliki proyek ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}