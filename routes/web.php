<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(static function() {
    Route::get('/cabinet', function () {
        return view('cabinet.index', [
            'courses' => Course::pluck('name'),
        ]);
    })->name('cabinet');

    Route::get('/course/create', [CourseController::class, 'create'])
        ->name('course.store');
    Route::post('/course/store', [CourseController::class, 'store'])
        ->name('course.store');

    Route::get('/course/{course}/lesson/create', [LessonController::class, 'create'])
        ->name('lesson.store');
    Route::post('/course/{course}/lesson/store', [LessonController::class, 'store'])
        ->name('lesson.store');
});

require __DIR__.'/auth.php';
