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
        Schema::create('recognitions', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Awards, National Recognition, International Programs, Innovation Competitions, Publications, Intellectual Property, Government Programs, Strategic Partnerships
            $table->string('year');      // e.g. 2024, 2025
            $table->text('title');        // JSON translated {"id":"...","en":"..."}
            $table->text('organization'); // JSON translated {"id":"...","en":"..."} or plain text
            $table->text('description');  // JSON translated {"id":"...","en":"..."}
            
            $table->string('award_logo_path')->nullable();  // Award / Org Logo
            $table->string('certificate_path')->nullable(); // Certificate image
            $table->string('doc_path')->nullable();         // Documentation photo
            
            $table->text('story')->nullable();            // JSON translated story behind recognition
            $table->string('related_project')->nullable(); // e.g. PasokPasti, HUMARSA
            $table->string('media_coverage')->nullable();  // Media coverage URL
            
            $table->unsignedBigInteger('team_member_id')->nullable();
            $table->integer('order_num')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->foreign('team_member_id')->references('id')->on('team_members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recognitions');
    }
};
