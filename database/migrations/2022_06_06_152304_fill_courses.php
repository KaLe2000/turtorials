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
                'id' => Course::SUBJECT_MATH_ID,
                'name' => 'Математика',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => Course::SUBJECT_ENG_ID,
                'name' => 'Английский',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
        ]);
    }

    public function down(): void
    {
        \DB::table('courses')
            ->whereIn('id', [Course::SUBJECT_MATH_ID, Course::SUBJECT_ENG_ID])
            ->delete();
    }
};
