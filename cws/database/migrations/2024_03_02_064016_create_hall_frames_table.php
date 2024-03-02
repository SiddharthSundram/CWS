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
        Schema::create('hall_frames', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('industry');
            $table->string('featured_image')->nullable();
            $table->text('description');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall_frames');
    }
};
