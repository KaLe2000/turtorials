<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\User;
use App\Process\CashFlowProcess;
use App\Process\LessonProcess;
use Illuminate\Console\Command;

class DevProcessLessons extends Command
{
    protected $signature = 'dev:lessons_process';

    protected $description = 'Create default development lessons for test';

    public function handle(LessonProcess $lessonProcess, CashFlowProcess $cashFlowProcess): int
    {
        $lessons = $this->createLessons($lessonProcess);
        $this->createFlows($cashFlowProcess);

        return 0;
    }

    private function createLessons(LessonProcess $lessonProcess): \Illuminate\Support\Collection
    {
        $lessonsFor = [
            [User::DEV_TEACHER_MATH, Course::COURSE_MATH],
            [User::DEV_TEACHER_ENG, Course::COURSE_ENG],
        ];

        $lessons = collect();
        foreach ($lessonsFor as [$user_id, $course_id]) {
            $lessons->push($lessonProcess->create(
                User::find($user_id),
                Course::find($course_id),
                'Test Lesson',
                'This is Test Lesson'
            ));
        }

        return $lessons;
    }

    private function createFlows(CashFlowProcess $cashFlowProcess): void
    {
        foreach ([User::DEV_STUDENT_MATH, User::DEV_STUDENT_ENG] as $user_id) {
            $cashFlowProcess->create(User::find($user_id), 100);
        }
    }
}
