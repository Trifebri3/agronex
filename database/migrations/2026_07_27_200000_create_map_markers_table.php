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
        Schema::create('map_markers', function (Blueprint $table) {
            $table->id();
            $table->text('title'); // JSON string for translation
            $table->string('marker_type'); // e.g. IoT Node, Solar Microgrid, Farmers Community
            $table->string('latitude');
            $table->string('longitude');
            $table->text('details')->nullable(); // JSON list of properties
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_markers');
    }
};
