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
        Schema::create('event_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('current_location')->nullable();
            $table->string('job_title')->nullable();
            $table->string('university_company')->nullable();
            $table->string('industry')->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_submissions');
    }
};
