<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'business_name',
        'industry',
        'growth_plan',
        'ambition_plan',
        'profit_goal',
        'team_plan',
        'sdg_goal',
        'battle_plan',
        'user_name',
        'user_email',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}