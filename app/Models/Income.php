<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'sender',
        'source_bank',
        'destination_bank',
        'amount',
        'funding_type',
        'investment_type',
    ];
}