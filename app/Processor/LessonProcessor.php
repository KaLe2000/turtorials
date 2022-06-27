<?php

declare(strict_types=1);

namespace App\Processor;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class LessonProcessor
{
    public function create(
        User $user,
        Course $course,
        string $name,
        string $description
    ): Lesson {
        $lesson = new Lesson();
        $lesson->name = $name;
        $lesson->description = $description;
        $lesson->status = Lesson::STATUS_OPEN;
        $lesson->user_id = $user->id;
        $lesson->course_id = $course->id;
        $lesson->city_id = $user->city_id;

        $lesson->save();

        return $lesson;
    }
}
