<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingSchedule extends Model
{
    use HasFactory;

    protected $table = 'teaching_schedules';

    protected $fillable = [
        'user_id',
        'hari',
        'tanggal',
        'topik_pembahasan',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
