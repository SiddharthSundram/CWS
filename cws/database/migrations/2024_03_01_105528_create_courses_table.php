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
            $table->string('duration');
            $table->string('instructor');
            $table->string('fees');
            $table->string('discount_fees');
            $table->enum('lang',["en","hi"])->default("hi");
            $table->foreignId('category_id')->constrained()->onDelete("cascade");
            $table->string('featured_image')->nullable();
            $table->string('description');            

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
