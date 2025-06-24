<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

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
        'category',
        'investment_needs',
        'roadmap',
        'user_id', // Tambahkan user_id ke fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}