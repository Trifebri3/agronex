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
        Schema::table('haki_items', function (Blueprint $table) {
            $table->string('creator_name')->nullable()->after('title');
            $table->string('holder_name')->nullable()->after('creator_name');
            $table->text('address')->nullable()->after('holder_name');
            $table->string('citizenship')->default('Indonesia')->nullable()->after('address');
            $table->string('record_number')->nullable()->after('registration_number');
            $table->string('first_announced_date')->nullable()->after('registration_date');
            $table->string('first_announced_place')->nullable()->after('first_announced_date');
            $table->string('protection_period')->nullable()->after('first_announced_place');
            $table->text('description')->nullable()->after('document_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('haki_items', function (Blueprint $table) {
            $table->dropColumn([
                'creator_name',
                'holder_name',
                'address',
                'citizenship',
                'record_number',
                'first_announced_date',
                'first_announced_place',
                'protection_period',
                'description'
            ]);
        });
    }
};
