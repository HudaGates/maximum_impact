<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessGrowth extends Model
{
    use HasFactory;

    // Nama tabel sudah benar
    protected $table = 'business_growths';

    /**
     * The attributes that are mass assignable.
     * Ini adalah inti perbaikannya. Kolomnya sekarang generik.
     */
    protected $fillable = [
        'user_id',
        'month',
        'year',
        'goals',
        'revenue_target',
        'profit_target',
        'team_dev_target',
        'social_impact_target',
        'strategy',
    ];
}