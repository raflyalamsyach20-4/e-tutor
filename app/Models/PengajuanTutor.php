<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanTutor extends Model
{
    
    use HasFactory;
    protected $table = 'pengajuan_tutor';
    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'topik_pembahasan',
        'bukti_memenuhi',
        'deskripsi_job',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}