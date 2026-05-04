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
        Schema::create('career_submissions', function (Blueprint $col) {
            $col->id();
            $col->foreignId('career_id')->constrained()->onDelete('cascade');
            $col->string('full_name');
            $col->string('email');
            $col->string('phone');
            $col->string('current_location');
            $col->string('linkedin_url')->nullable();
            $col->string('portfolio_url')->nullable();
            $col->string('highest_education');
            $col->string('university');
            $col->string('years_of_experience');
            $col->string('current_company')->nullable();
            $col->string('resume_path');
            $col->text('cover_letter')->nullable();
            $col->string('status')->default('pending'); // pending, reviewed, shortlisted, rejected
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_submissions');
    }
};
