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
     * Ini penting agar metode `create()` bisa berjalan.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'amount',
        'funding_type',
        'project',
        'payment_method',
        'status',
    ];

    // =============================================================
    // INI ADALAH RELASI YANG HILANG DAN MENYEBABKAN ERROR
    // =============================================================
    /**
     * Mendefinisikan bahwa sebuah Investment "milik" (belongs to) satu User.
     */
    public function user(): BelongsTo
    {
        // Ini akan menghubungkan 'user_id' di tabel ini
        // dengan 'id' di tabel 'users'.
        return $this->belongsTo(User::class, 'user_id');
    }
    // =============================================================
}