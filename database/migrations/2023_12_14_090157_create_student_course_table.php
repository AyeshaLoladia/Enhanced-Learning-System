<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_course', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            $table->integer('completed_percentage')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->unique(['student_id', 'course_id']);
            $table->timestamps();
        });

        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('course_materials')->onDelete('cascade');
            $table->string('file_path');
            $table->integer('student_score')->nullable();
            $table->string('grade')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course');
        Schema::dropIfExists('assignments');
    }
};
