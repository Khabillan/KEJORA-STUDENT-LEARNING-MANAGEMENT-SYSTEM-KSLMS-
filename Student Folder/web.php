<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index'); // View All button goes here

Route::get('/courses/search', [CourseController::class, 'searchForm'])->name('courses.search.form');
Route::post('/courses/search', [CourseController::class, 'search'])->name('courses.search');

Route::get('/courses/{code}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{code}', [CourseController::class, 'update'])->name('courses.update');

Route::get('/courses/{code}/delete', [CourseController::class, 'confirmDelete'])->name('courses.delete.confirm');
Route::delete('/courses/{code}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/search', [StudentController::class, 'searchForm'])->name('students.search.form');
Route::post('/students/search', [StudentController::class, 'search'])->name('students.search');

Route::get('/students/{studentId}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{studentId}', [StudentController::class, 'update'])->name('students.update');

Route::get('/students/{studentId}/delete', [StudentController::class, 'confirmDelete'])->name('students.delete.confirm');
Route::delete('/students/{studentId}', [StudentController::class, 'destroy'])->name('students.destroy');