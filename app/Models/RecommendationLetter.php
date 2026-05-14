<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationLetter extends Model
{
    use HasFactory;

    protected $table = 'recommendation_letters';

    protected $fillable = [
        'user_id',
        'lecturer_name',
        'lecturer_nip',
        'lecturer_position',
        'student_name',
        'student_nim',
        'student_prodi',
        'place',
        'date',
        'pa_lecturer_name',
        'pa_lecturer_nip',
        'course_lecturer_name',
        'course_lecturer_nip',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
