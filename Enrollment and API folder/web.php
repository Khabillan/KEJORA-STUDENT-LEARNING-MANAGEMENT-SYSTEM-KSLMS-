<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/search', [CourseController::class, 'searchForm'])->name('courses.search.form');
Route::post('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::get('/courses/{courseCode}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{courseCode}', [CourseController::class, 'update'])->name('courses.update');
Route::get('/courses/{courseCode}/delete', [CourseController::class, 'confirmDelete'])->name('courses.delete.confirm');
Route::delete('/courses/{courseCode}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/search', [StudentController::class, 'searchForm'])->name('students.search.form');
Route::post('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::get('/students/{studentId}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{studentId}', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{studentId}/delete', [StudentController::class, 'confirmDelete'])->name('students.delete.confirm');
Route::delete('/students/{studentId}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

Route::get('/students/{studentId}/courses', [EnrollmentController::class, 'listCoursesByStudent'])->name('students.courses');
Route::get('/courses/{courseCode}/students', [EnrollmentController::class, 'listStudentsByCourse'])->name('courses.students');

Route::get('/students/{studentId}/courses', [EnrollmentController::class, 'listCoursesByStudent'])->name('students.courses');
Route::get('/courses/{courseCode}/students', [EnrollmentController::class, 'listStudentsByCourse'])->name('courses.students');

Route::get('/student-ids', function (Request $request) {
    $students = $request->session()->get('students', []);
    $ids = [];

    foreach ($students as $s) {
        $ids[] = $s->getStudentId();
    }

    return response()->json($ids);
});

Route::get('/course-codes', function (Request $request) {
    $courses = $request->session()->get('courses', []);
    $codes = [];

    foreach ($courses as $c) {
        $codes[] = $c->getCourseCode();
    }

    return response()->json($codes);
});