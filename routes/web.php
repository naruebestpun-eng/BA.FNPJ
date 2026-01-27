<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // โปรไฟล์ผู้ใช้งาน
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ส่วนการจัดการข้อมูล (Admin)
    Route::resource('users', UserController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('terms', TermController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('students', StudentController::class);

    // ส่วนของอาจารย์ (ถ้ามี Controller แล้วสามารถเปิดใช้ได้เลย)
    // Route::get('/instructor/subjects', [InstructorController::class, 'subjects'])->name('instructor.subjects');
    // Route::resource('attendance', AttendanceController::class);
});

require __DIR__.'/auth.php';