<?php

declare(strict_types=1);

namespace App\Process;

use App\Models\Lesson;
use App\Models\LessonStudent;
use App\Models\User;
use Illuminate\Support\Carbon;

class LessonStudentProcess
{
    public function create(
        User $user,
        Lesson $lesson,
        Carbon $plannedDate
    ): LessonStudent {
        $lessonStudent = new LessonStudent();
        $lessonStudent->user_id = $user->id;
        $lessonStudent->lesson_id = $lesson->id;
        $lessonStudent->status = LessonStudent::STATUS_INITIAL;
        $lessonStudent->planned_date = $plannedDate->toDateString();

        $lessonStudent->save();

        return $lessonStudent;
    }
}
