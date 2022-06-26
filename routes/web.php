<?php

declare(strict_types=1);

use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonStudentController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(static function() {
    Route::get('/cabinet', function () {
        return view('cabinet.index', [
            'courses' => Course::all(),
            'user' => Auth::user(),
        ]);
    })->name('cabinet');

    // Курсы
    Route::get('/course/{course}', [CourseController::class, 'show'])
        ->name('course.show');
    Route::get('/course/create', [CourseController::class, 'create'])
        ->name('course.create');
    Route::post('/course/create', [CourseController::class, 'store'])
        ->name('course.store');

    // Предметы
    Route::get('/course/{course}/lesson/create', [LessonController::class, 'create'])
        ->name('lesson.create');
    Route::post('/course/{course}/lesson/create', [LessonController::class, 'store'])
        ->name('lesson.store');
    Route::get('/course/{course}/lesson/{lesson}', [LessonController::class, 'show'])
        ->name('lesson.show');
    Route::get('/course/{course}/lesson/{lesson}/start', [LessonController::class, '`start'])
        ->name('lesson.start');
    Route::get('/course/{course}/lesson/{lesson}/complete', [LessonController::class, 'complete'])
        ->name('lesson.complete');
    Route::post('/lesson/{lesson}/signup', [LessonStudentController::class, 'create'])
        ->name('lesson.signup');
    Route::get('/lesson/{lesson}/signup', [LessonStudentController::class, 'store'])
        ->name('lesson.sign');

    // Деньги
    Route::get('/user/{user}/cash_flow/create', [CashFlowController::class, 'create'])
        ->name('cashFlow.create');
    Route::post('/user/{user}/cash_flow/create', [CashFlowController::class, 'store'])
        ->name('cashFlow.store');
    Route::post('/course/{course}/lesson/{lesson}/start', [LessonController::class, 'start'])
        ->name('lesson.start');
    Route::post('/course/{course}/lesson/{lesson}/complete', [LessonController::class, 'complete'])
        ->name('lesson.complete');
});

Route::get('/dev/test', [\App\Http\Controllers\TestController::class, 'index']);

require __DIR__.'/auth.php';
