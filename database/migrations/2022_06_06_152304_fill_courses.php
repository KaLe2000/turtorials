<?php

declare(strict_types=1);

use App\Models\Course;
use Carbon\CarbonImmutable;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('courses')->insert([
            [
                'id' => Course::COURSE_MATH,
                'name' => 'Математика',
                'slug' => 'math',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => Course::COURSE_ENG,
                'name' => 'Английский',
                'slug' => 'eng',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
        ]);
    }

    public function down(): void
    {
        \DB::table('courses')
            ->whereIn('id', [Course::COURSE_MATH, Course::COURSE_ENG])
            ->delete();
    }
};
