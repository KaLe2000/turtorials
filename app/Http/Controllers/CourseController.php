<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('teacher.createCourse');
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->save();

        return redirect(route('cabinet'));
    }
}
