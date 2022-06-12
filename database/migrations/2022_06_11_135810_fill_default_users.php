<?php

declare(strict_types=1);

use App\Models\City;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('users')->insert([
            [
                'id' => User::DEV_TEACHER_MATH,
                'name' => 'Dev Math Teacher',
                'type' => User::TYPE_TEACHER,
                'city_id' => City::CITY_KEMEROVO_ID,
                'email' => 'mathteacher@local.dev',
                'email_verified_at' => null,
                'password' => Hash::make('123123123'),
                'remember_token' => null,
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => User::DEV_TEACHER_ENG,
                'name' => 'Dev Eng Teacher',
                'type' => User::TYPE_TEACHER,
                'city_id' => City::CITY_KEMEROVO_ID,
                'email' => 'engteacher@local.dev',
                'email_verified_at' => null,
                'password' => Hash::make('123123123'),
                'remember_token' => null,
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => User::DEV_STUDENT_MATH,
                'name' => 'Dev Math Student',
                'type' => User::TYPE_STUDENT,
                'city_id' => City::CITY_KEMEROVO_ID,
                'email' => 'mathstudent@local.dev',
                'email_verified_at' => null,
                'password' => Hash::make('123123123'),
                'remember_token' => null,
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
            [
                'id' => User::DEV_STUDENT_ENG,
                'name' => 'Dev Eng Student',
                'type' => User::TYPE_STUDENT,
                'city_id' => City::CITY_KEMEROVO_ID,
                'email' => 'engstudent@local.dev',
                'email_verified_at' => null,
                'password' => Hash::make('123123123'),
                'remember_token' => null,
                'created_at' => CarbonImmutable::now(),
                'updated_at' => CarbonImmutable::now(),
            ],
        ]);
    }

    public function down(): void
    {
        \DB::table('users')->whereIn('id', [
            User::DEV_TEACHER_MATH,
            User::DEV_TEACHER_ENG,
            User::DEV_STUDENT_MATH,
            User::DEV_STUDENT_ENG,
        ])->delete();
    }
};
