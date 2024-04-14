<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    protected $table = 'material_content';
    protected $fillable = [
        'material_id',
        'unit_index',
        'material_type',
        'title',
        'lecture_link',
        'assignment_link',
        'course_id',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'material_id');
    }
}