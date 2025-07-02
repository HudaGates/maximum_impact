<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'investor_name', 
        'amount',
        'funding_type',
        'project',
        'payment_method',
        'sender',
        'origin_bank',
        'destination_bank',
        'status',
    ];

   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}