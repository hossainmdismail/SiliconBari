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
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();

            // General Information
            $table->string('site_name', 150);
            $table->string('site_tagline', 255)->nullable();
            $table->text('company_short_description')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();

            // Contact Information
            $table->string('contact_email', 150)->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->string('whatsapp_number', 50)->nullable();
            $table->text('address')->nullable();
            $table->text('map_url')->nullable();
            $table->longText('map_embed_code')->nullable();

            // Social Media Links
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();

            // Footer Information
            $table->text('footer_text')->nullable();
            $table->string('copyright_text', 255)->nullable();

            // Default SEO Settings
            $table->string('default_meta_title')->nullable();
            $table->text('default_meta_description')->nullable();
            $table->string('default_og_title')->nullable();
            $table->text('default_og_description')->nullable();
            $table->string('default_og_image_path')->nullable();
            $table->string('canonical_base_url')->nullable();
            $table->string('default_robots_meta', 100)->default('index,follow');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_settings');
    }
};
