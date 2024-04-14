<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'student_course', 'course_id', 'student_id')->withPivot('completed_percentage', 'is_completed')->withTimestamps();
    }

    public function enrollment()
    {
        return $this->belongsToMany(User::class, 'enrollment', 'course_id', 'student_id');
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'placement',
        'mandatory',
        'start_date',
        'end_date',
        'faculty_id',
        'no_of_units',
        'hours',
        'intro_video_link',
        'module_overview',
        'learning_outcomes',
        'learning_activities',
        'assessment_methods',
        'internal_weightage',
    ];

    /**
     * The attributes that should have default values.
     *
     * @var array<int, mixed>
     */
}