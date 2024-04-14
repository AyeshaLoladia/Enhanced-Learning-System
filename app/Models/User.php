<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function courses()
    {
        if ($this->hasRole('faculty')) {
            // One-to-Many relationship for faculty
            return $this->hasMany(Course::class, 'faculty_id');
        } else if ($this->hasRole('student')) {
            // Many-to-Many relationship for students
            return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id')->withPivot('completed_percentage', 'is_completed')->withTimestamps();
        }
        return null;
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'student_id');
    }

    public function enrollment()
    {
        return $this->belongsToMany(Course::class, 'enrollment', 'student_id', 'course_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'rollno',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}