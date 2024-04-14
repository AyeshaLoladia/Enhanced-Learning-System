<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $table = 'course_materials';
    protected $fillable = [
        'unit',
        'unit_index',
        'material_type',
        'title',
        'lecture_link',
        'assignment_link',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function content()
    {
        return $this->hasMany(Content::class, 'material_id');
    }
}