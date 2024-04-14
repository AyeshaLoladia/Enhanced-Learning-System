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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('intro_video_link', 100)->nullable()->default('#dfe0e0');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('branch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('intro_video_link');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('branch', 100);
        });
    }
};
