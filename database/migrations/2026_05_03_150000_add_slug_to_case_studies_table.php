<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table): void {
            $table->string('slug', 191)->nullable()->after('title');
        });

        $existingSlugs = [];

        DB::table('case_studies')
            ->select('id', 'title')
            ->orderBy('id')
            ->get()
            ->each(function (object $caseStudy) use (&$existingSlugs): void {
                $baseSlug = Str::slug($caseStudy->title ?: "case-study-{$caseStudy->id}");
                $slug = $baseSlug !== '' ? $baseSlug : "case-study-{$caseStudy->id}";
                $suffix = 1;

                while (in_array($slug, $existingSlugs, true)) {
                    $slug = "{$baseSlug}-{$suffix}";
                    $suffix++;
                }

                DB::table('case_studies')
                    ->where('id', $caseStudy->id)
                    ->update(['slug' => $slug]);

                $existingSlugs[] = $slug;
            });

        Schema::table('case_studies', function (Blueprint $table): void {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table): void {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
