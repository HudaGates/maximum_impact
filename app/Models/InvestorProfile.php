<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'investment_name',
        'investment_focus',
        'growth_plan',
        'ambition_plan',
        'profit_goal',
        'team_plan',
        'sdg_goal',
        'strategy_plan',
        'investor_name',
        'investor_email',
    ];

    /**
     * Mendefinisikan relasi bahwa setiap profil investor dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}