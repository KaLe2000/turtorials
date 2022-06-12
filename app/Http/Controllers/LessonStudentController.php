<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonStudent;

class LessonStudentController extends Controller
{
    public function create(Lesson $lesson): \Illuminate\Contracts\View\View
    {
        return view('student.signUp');
    }

    public function store(Lesson $lesson): \Illuminate\Http\RedirectResponse
    {
        // todo check to lesson status & planned_date
        // todo create reserved cashFlow for student & teacher
        $lessonStudent = new LessonStudent();
        $lessonStudent->user_id = \Auth::user()->id;
        $lessonStudent->lesson_id = $lesson->id;

        $lessonStudent->save();

        return redirect(route('lesson.show', ['course' => $lesson->course,'lesson' => $lesson]));
    }
}
