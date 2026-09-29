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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->string('year'); // e.g. Origin, 2024, 2025
            $table->string('status'); // Research, Prototype, Pilot, Live
            $table->text('title'); // JSON translated {"id":"...","en":"..."}
            $table->text('subtitle')->nullable(); // JSON translated
            $table->text('description'); // JSON translated
            
            $table->string('image_path')->nullable(); // primary photo / mockup
            $table->string('video_path')->nullable(); // optional video path
            $table->string('document_path')->nullable(); // optional document path
            
            $table->text('gallery')->nullable(); // JSON array of multiple image paths
            $table->text('locations')->nullable(); // JSON array of locations
            $table->text('technologies')->nullable(); // JSON array of tech used
            
            $table->text('lessons_learned')->nullable(); // JSON translated
            $table->text('impact')->nullable(); // JSON translated
            $table->text('achievements')->nullable(); // JSON translated
            
            $table->string('related_product')->nullable(); // e.g. AgroPredict, IoT Portable, Plant AR
            $table->integer('order_num')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
