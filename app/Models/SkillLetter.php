<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'achievement_id',
        'letter_number',
        'generated_content',
        'pdf_file',
    ];

    protected $casts = [
        'generated_content' => 'array',
    ];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}
