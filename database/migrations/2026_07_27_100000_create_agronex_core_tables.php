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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Schema::create('ecosystem_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('use_case');
            $table->string('image_path')->nullable();
            $table->string('video_url')->nullable();
            $table->text('features')->nullable(); // JSON or text list
            $table->string('demo_url')->nullable();
            $table->string('status')->default('Coming Soon'); // Coming Soon, Beta, Live
            $table->string('target_url')->nullable();
            $table->timestamps();
        });

        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('icon'); // svg/icon class
            $table->timestamps();
        });

        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('features')->nullable();
            $table->string('image_path')->nullable();
            $table->text('detail_content')->nullable();
            $table->timestamps();
        });

        Schema::create('impact_stats', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g. "4.200+"
            $table->string('label'); // e.g. "Farmers Reached"
            $table->string('icon')->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });

        Schema::create('esg_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // environmental, social, governance
            $table->string('metric_name');
            $table->string('value');
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('field_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('village_name');
            $table->text('story');
            $table->string('photo_path')->nullable();
            $table->string('video_url')->nullable();
            $table->text('validation_data')->nullable();
            $table->text('observations')->nullable();
            $table->text('interview_quotes')->nullable(); // JSON list
            $table->text('problems')->nullable();
            $table->text('solutions')->nullable();
            $table->text('lessons')->nullable();
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // FGD, Workshop, FGD, Training, Pilot Project, etc
            $table->date('activity_date');
            $table->string('location');
            $table->text('description');
            $table->string('photo_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type'); // photo, video, drone
            $table->string('category'); // community, technology, events, before_after
            $table->string('media_path');
            $table->string('secondary_media_path')->nullable(); // before/after comparison
            $table->timestamps();
        });

        Schema::create('knowledge_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // Article, Journal, Insight, Research, Policy Brief, Whitepaper, Case Study
            $table->text('content');
            $table->string('file_path')->nullable();
            $table->string('author')->nullable();
            $table->date('published_at')->nullable();
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('newsroom_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // Press Release, Media Coverage, Award, Interview, Publication, Podcast, Newsletter
            $table->text('content');
            $table->string('link_url')->nullable();
            $table->date('publish_date');
            $table->string('source')->nullable();
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('haki_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type'); // Patent, Copyright, Trademark, Industrial Design, Software Registration
            $table->string('registration_number');
            $table->string('status');
            $table->date('registration_date');
            $table->string('document_path')->nullable();
            $table->timestamps();
        });

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path');
            $table->string('type'); // Government, University, NGO, CSR, Startup, Investor, Community, International Organization
            $table->text('collaboration_story')->nullable();
            $table->text('goal')->nullable();
            $table->text('program')->nullable();
            $table->text('results')->nullable();
            $table->text('impact')->nullable();
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('category'); // CEO, CTO, AI Engineer, Agronomist, Research, Designer, Community, Advisor, Board
            $table->string('photo_path')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('email')->nullable();
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->text('contributions')->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamps();
        });

        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('department'); // Open Position, Volunteer, Research, Internship
            $table->string('location')->default('Remote / On-site');
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // contact, investor_request
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new'); // new, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('haki_items');
        Schema::dropIfExists('newsroom_items');
        Schema::dropIfExists('knowledge_items');
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('field_stories');
        Schema::dropIfExists('esg_metrics');
        Schema::dropIfExists('impact_stats');
        Schema::dropIfExists('products');
        Schema::dropIfExists('technologies');
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('ecosystem_items');
        Schema::dropIfExists('settings');
    }
};
