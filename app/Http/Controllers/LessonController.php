<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\LessonStudent;
use App\Processor\LessonProcessor;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        return view('cabinet.lesson.index', [
            'course' => $course,
            'lesson' => $lesson,
            'lessonStudent' => LessonStudent::where('user_id', \Auth::id())
                ->where('lesson_id', $lesson->id)
                ->first(),
        ]);
    }

    public function create(Course $course)
    {
        return view('teacher.createLesson', [
            'course' => $course,
        ]);
    }

    public function store(Course $course, Request $request, LessonProcessor $lessonProcess)
    {
        try {
            $lesson = $lessonProcess->create(
                \Auth::user(),
                $course,
                $request->name,
                $request->description
            );

            $file = $request->file('image');
            if ($file) {
                $path = $file->storeAs('public/images', $file->getClientOriginalName());
            }

            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->path = $path ?? '';
            $image->entity_id = $lesson->id;
            $image->entity_type = $lesson::class;

            $image->save();
        } catch (\Throwable $exception) {
            dd($request->all(), $exception);
        }

        return redirect(route('course.show', $course));
    }

    // todo to open
    public function start(Course $course, Lesson $lesson)
    {
        $lesson->status = 'in_process';
        $lesson->save();

        return redirect()->back();
    }

    // todo to closed
    public function complete(Course $course, Lesson $lesson)
    {
        $lesson->status = 'completed';
        $lesson->save();

        return redirect()->back();
    }
}
