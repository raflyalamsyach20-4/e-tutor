<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKelas extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_kelas';

    protected $fillable = [
        'user_id',
        'teaching_schedule_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teachingSchedule()
    {
        return $this->belongsTo(TeachingSchedule::class);
    }
}
