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
        Schema::create('material_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('course_materials')->onDelete('cascade');
            $table->integer('unit_index');
            $table->string('material_type');
            $table->string('title');
            $table->string('lecture_link')->nullable();
            $table->string('assignment_link')->nullable();
            $table->timestamps();
        });

        Schema::table('course_materials', function (Blueprint $table) {
            $table->dropColumn('unit_index');
            $table->dropColumn('material_type');
            $table->dropColumn('title');
            $table->dropColumn('lecture_link');
            $table->dropColumn('assignment_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_content');

        Schema::table('course_materials', function (Blueprint $table) {
            $table->integer('unit_index');
            $table->string('material_type');
            $table->string('title');
            $table->string('lecture_link')->nullable();
            $table->string('assignment_link')->nullable();
        });
    }
};
