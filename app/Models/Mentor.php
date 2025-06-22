<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;
    protected $guarded = []; // Izinkan semua field diisi

    public function experiences() {
        return $this->hasMany(Experience::class)->orderBy('start_date', 'desc');
    }
    public function educations() {
        return $this->hasMany(Education::class)->orderBy('start_year', 'desc');
    }
    public function skills() {
        return $this->hasMany(Skill::class);
    }
}
