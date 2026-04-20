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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();
            $table->text('short_description');
            $table->string('category', 150);
            $table->string('thumbnail', 2048)->nullable();
            $table->string('banner', 2048)->nullable();
            $table->longText('overview')->nullable();
            $table->text('key_features_description')->nullable();
            $table->json('what_we_deliver')->nullable();
            $table->json('our_process')->nullable();
            $table->json('key_features')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index('category');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
