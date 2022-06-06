<?php

declare(strict_types=1);

use App\Models\Discipline;
use Carbon\CarbonImmutable;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('disciplines')->insert([
            [
                'id' => Discipline::SUBJECT_MATH_ID,
                'name' => 'Математика',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => Discipline::SUBJECT_ENG_ID,
                'name' => 'Английский',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
        ]);
    }

    public function down(): void
    {
        \DB::table('disciplines')
            ->whereIn('id', [Discipline::SUBJECT_MATH_ID, Discipline::SUBJECT_ENG_ID])
            ->delete();
    }
};
