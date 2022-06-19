<?php

declare(strict_types=1);

use App\Models\City;
use Carbon\CarbonImmutable;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('cities')->insert([
            [
                'id' => City::CITY_KEMEROVO_ID,
                'name' => 'Кемерово',
                'slug' => 'kemerovo',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => City::CITY_NOVOSIBIRSK_ID,
                'name' => 'Новосибирск',
                'slug' => 'novosibirsk',
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
        ]);
    }

    public function down(): void
    {
        \DB::table('cities')
            ->whereIn('id', [City::CITY_KEMEROVO_ID, City::CITY_NOVOSIBIRSK_ID])
            ->delete();
    }
};
