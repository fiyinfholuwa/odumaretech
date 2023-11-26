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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('course_url', 255)->nullable();
            $table->string('level', 50)->nullable();
            $table->string('language', 50)->nullable();
            $table->string('price', 20)->nullable();
            $table->string('lecture', 255)->nullable();
            $table->string('cohort', 255)->nullable();
            $table->string('start_date', 255)->nullable();
            $table->string('discount', 20)->nullable();
            $table->string('duration', 50)->nullable();
            $table->integer('category')->nullable();
            $table->text('support')->nullable();
            $table->text('experience')->nullable();
            $table->text('certification')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
