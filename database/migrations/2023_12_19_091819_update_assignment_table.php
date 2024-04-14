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
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->string('mandatory', 100)->default('elective');
            $table->dropColumn('description');
            $table->string('placement')->default('Open To All');
            $table->string('hours')->default('20');
            $table->text('module_overview')->default('This is the module overview');
            $table->text('learning_outcomes')->default('These are the learning outcomes');
            $table->text('learning_activities')->default('These are the learning activities');
            $table->text('assessment_methods')->default('These are the assessment methods');
            $table->text('internal_weightage')->default('This is the internal weightage');
            $table->string('no_of_units', 100)->default('1');
        });

        Schema::table('course_materials', function (Blueprint $table) {
            $table->integer('unit')->default('1');
            $table->dropColumn('material_index');
            $table->integer('unit_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->string('file_path', 100)->nullable();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('mandatory');
            $table->string('description', 100)->nullable();
            $table->dropColumn('placement');
            $table->dropColumn('hours');
            $table->dropColumn('module_overview');
            $table->dropColumn('learning_outcomes');
            $table->dropColumn('learning_activities');
            $table->dropColumn('assessment_methods');
            $table->dropColumn('internal_weightage');
            $table->dropColumn('no_of_units');
        });

        Schema::table('course_materials', function (Blueprint $table) {
            $table->dropColumn('unit');
            $table->integer('material_index');
            $table->dropColumn('unit_index');
        });
    }
};
