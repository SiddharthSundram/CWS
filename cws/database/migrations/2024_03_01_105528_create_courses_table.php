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
            $table->string('name');
            $table->string('course_slug')->unique(); // Add a unique slug column
            $table->string('duration');
            $table->string('instructor');
            $table->string('fees');
            $table->string('discount_fees');
            $table->enum('lang',["English","Hindi"])->default("Hindi");
            $table->foreignId('category_id')->constrained()->onDelete("cascade");
            $table->string('featured_image')->nullable();
            $table->string('description');            
            $table->json('features')->nullable(); // Add a JSON column for features
            $table->boolean('status')->default(false);
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
