<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessGrowth extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_growths';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'goals_month_1',
        'revenue_target_month_2',
        'profit_target_month_1',
        'team_dev_target_month_1',
        'social_impact_target_month_1',
        'strategy_month_1',
    ];

    /**
     * The attributes that should be cast.
     * Kita tidak lagi membutuhkan casting ke array.
     *
     * @var array
     */
    protected $casts = [];
}