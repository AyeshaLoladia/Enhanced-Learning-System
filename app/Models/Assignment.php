<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_course_id',
        'material_id',
        'file_path',
        'student_score',
        'grade',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
