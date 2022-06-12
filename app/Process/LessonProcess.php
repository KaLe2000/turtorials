<?php

declare(strict_types=1);

namespace App\Process;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Carbon;

class LessonProcess
{
    public function create(
        User $user,
        Course $course,
        string $name,
        string $description,
        Carbon $planned_date
    ): Lesson {
        $lesson = new Lesson();
        $lesson->name = $name;
        $lesson->description = $description;
        $lesson->status = Lesson::STATUS_INITIAL;
        $lesson->planned_date = $planned_date->toDateString();
        $lesson->user_id = $user->id;
        $lesson->course_id = $course->id;
        $lesson->city_id = $user->city_id;

        $lesson->save();

        return $lesson;
    }
}
