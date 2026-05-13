<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mata_kuliah',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}