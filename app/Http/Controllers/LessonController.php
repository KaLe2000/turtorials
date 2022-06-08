<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
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
            $lesson->course_id = $course->id;
            $lesson->city_id = 1;

            $lesson->save();

            $file = $request->file('image');
            $file->store($file->getClientOriginalName());

            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->path = $file->getPath();
            $image->entity_id = $lesson->id;
            $image->entity_type = $lesson::class;

            $image->save();
        } catch (\Throwable $exception) {
            dd($request->all(), $exception);
        }

        dd($course, $request->files);
    }
}
