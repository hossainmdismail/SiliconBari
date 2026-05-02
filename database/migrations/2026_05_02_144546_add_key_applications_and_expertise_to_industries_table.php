<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('industries', function (Blueprint $table): void {
            $table->json('key_applications')->nullable()->after('short_description');
            $table->json('expertise')->nullable()->after('key_applications');
        });
    }

    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table): void {
            $table->dropColumn(['key_applications', 'expertise']);
        });
    }
};
