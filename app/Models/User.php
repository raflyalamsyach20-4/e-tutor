<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['name', 'email', 'no_telepon', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

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

    public function pengajuanTutor()
    {
        return $this->hasOne(PengajuanTutor::class);
    }

    public function teachingSchedules()
    {
        return $this->hasMany(TeachingSchedule::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranKelas::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
