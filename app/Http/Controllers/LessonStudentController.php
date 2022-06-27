<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Processor\LessonStudentProcessor;
use Illuminate\Support\Carbon;

class LessonStudentController extends Controller
{
    public function create(Lesson $lesson): \Illuminate\Contracts\View\View
    {
        return view('student.signUp');
    }

    public function store(Lesson $lesson, LessonStudentProcessor $lessonStudentProcess): \Illuminate\Http\RedirectResponse
    {
        // todo check to lesson status & planned_date
        // todo create reserved cashFlow for student & teacher
        $lessonStudent = $lessonStudentProcess->create(\Auth::user(), $lesson, Carbon::now());

        return redirect(route('lesson.show', ['course' => $lesson->course,'lesson' => $lesson]));
    }
}
