<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi secara massal.
     * Nama kolom telah diperbarui sesuai migrasi.
     */
    protected $fillable = [
        'user_id',
        'name',
        'job_title',
        'location',
        'institution',
        'about',
        'profile_photo_path', // <--- PASTIKAN BARIS INI ADA DAN TIDAK DI-KOMENTAR
    ];

    /**
     * Relasi ke model User (pemilik profil mentor ini).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- RELASI-RELASI INI SUDAH BENAR ---
    public function experiences() {
        return $this->hasMany(MentorExperience::class);
    }

    public function educations() {
        return $this->hasMany(MentorEducation::class);
    }

    public function skills() {
        return $this->hasMany(MentorSkill::class);
    }
}