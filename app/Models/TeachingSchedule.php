<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teaching_schedules';

    protected $fillable = [
        'user_id',
        'hari',
        'tanggal',
        'topik_pembahasan',
        'waktu',
        'hidden_for_tutor',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranKelas::class);
    }
}
