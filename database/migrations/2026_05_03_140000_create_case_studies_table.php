<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table): void {
            $table->id();
            $table->date('published_date')->nullable()->index();
            $table->string('title', 191);
            $table->text('short_description')->nullable();
            $table->string('thumbnail', 2048)->nullable();
            $table->string('written_by', 191)->nullable()->index();
            $table->string('industry', 191)->nullable()->index();
            $table->string('category', 191)->nullable()->index();
            $table->longText('text_body')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
        });

        Schema::create('case_study_technology', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('case_study_id')->constrained()->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['case_study_id', 'technology_id']);
            $table->index(['case_study_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_study_technology');
        Schema::dropIfExists('case_studies');
    }
};
