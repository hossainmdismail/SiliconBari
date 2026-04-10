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

        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name', 150);
            $table->string('page_key', 191)->unique();
            $table->string('page_type', 20)->default('static');

            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();

            $table->string('og_title', 255)->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image', 2048)->nullable();

            $table->string('canonical_url', 2048)->nullable();

            $table->boolean('robots_index')->default(true);
            $table->boolean('robots_follow')->default(true);

            $table->json('schema_json')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('page_type');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
    }
};
