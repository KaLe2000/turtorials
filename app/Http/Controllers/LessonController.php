<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        return view('cabinet.lesson.index', [
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }

    public function create(Course $course)
    {
        return view('teacher.createLesson', [
            'course' => $course,
        ]);
    }

    public function store(Course $course, Request $request)
    {
        try {
            $lesson = new Lesson();
            $lesson->name = $request->name;
            $lesson->description = $request->description;
            $lesson->status = 'initial';
            $lesson->planned_date = $request->date;
            $lesson->user_id = \Auth::user()->id;
            $lesson->course_id = $course->id;
            $lesson->city_id = \Auth::user()->city_id;

            $lesson->save();

            $file = $request->file('image');
            $path = $file->storeAs('public/images', $file->getClientOriginalName());

            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->path = $path;
            $image->entity_id = $lesson->id;
            $image->entity_type = $lesson::class;

            $image->save();
        } catch (\Throwable $exception) {
            dd($request->all(), $exception);
        }

        return redirect(route('course.show', $course));
    }

    public function start(Course $course, Lesson $lesson)
    {
        $lesson->status = 'in_process';
        $lesson->save();

        return redirect()->back();
    }

    public function complete(Course $course, Lesson $lesson)
    {
        $lesson->status = 'completed';
        $lesson->save();

        return redirect()->back();
    }
}
