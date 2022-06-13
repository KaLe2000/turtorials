<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_students', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->string('status');
            $table->timestamp('planned_date');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_students');
    }
};
