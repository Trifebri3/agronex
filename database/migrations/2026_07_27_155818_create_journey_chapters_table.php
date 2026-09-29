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
        Schema::create('journey_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('chapter_tag'); // e.g., "Chapter 01", "Field Study"
            $table->string('year_label');  // e.g., "2024", "Garut, West Java"
            $table->text('title');         // JSON dynamic translate string e.g. {"id":"...","en":"..."}
            $table->text('content');       // JSON dynamic translate string e.g. {"id":"...","en":"..."}
            $table->text('features')->nullable(); // JSON list for features (e.g. PasokPasti solution tags)
            $table->string('image_path')->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_chapters');
    }
};
