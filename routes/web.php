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
            'courses' => Course::all(),
        ]);
    })->name('cabinet');

    Route::get('/course/{course}', [CourseController::class, 'show'])
        ->name('course.show');
    Route::get('/course/create', [CourseController::class, 'create'])
        ->name('course.store');
    Route::post('/course/store', [CourseController::class, 'store'])
        ->name('course.store');

    Route::get('/course/{course}/lesson/{lesson}', [LessonController::class, 'show'])
        ->name('lesson.show');
    Route::get('/course/{course}/lesson/create', [LessonController::class, 'create'])
        ->name('lesson.create');
    Route::post('/course/{course}/lesson/store', [LessonController::class, 'store'])
        ->name('lesson.store');
    Route::post('/course/{course}/lesson/{lesson}/start', [LessonController::class, 'start'])
        ->name('lesson.start');
    Route::post('/course/{course}/lesson/{lesson}/complete', [LessonController::class, 'complete'])
        ->name('lesson.complete');
});

Route::get('/dev/test', [\App\Http\Controllers\TestController::class, 'index']);

require __DIR__.'/auth.php';
