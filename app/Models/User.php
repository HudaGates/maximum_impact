<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Mentor;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'headline',
        'location',
        'about',
        'role',  
        'status', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // =============================================================
    // METHOD BARU YANG DITAMBAHKAN
    // =============================================================
    /**
     * Accessor untuk mendapatkan nama lengkap pengguna.
     * Ini akan menggabungkan first_name dan last_name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        
        return "{$this->first_name} {$this->last_name}";
    }
 
    public function educations(): HasMany
    {
        return $this->hasMany(MentorEducation::class, 'mentor_id');
    }

 
    public function experiences(): HasMany
    {
        return $this->hasMany(MentorExperience::class, 'mentor_id');
    }

   
    public function skills(): HasMany
    {
        return $this->hasMany(MentorSkill::class, 'mentor_id');
    }
    public function mentor()
    {
        
        return $this->hasOne(Mentor::class);
    }
}