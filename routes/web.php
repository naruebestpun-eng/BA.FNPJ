<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\DashboardController; // เพิ่ม Controller ตัวนี้
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// แก้ไข Dashboard ให้เรียกผ่าน Controller
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // โปรไฟล์ & เปลี่ยนรหัสผ่าน (มีมาให้แล้ว)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // จัดการผู้ดูแลระบบ (ใช้ resource ตัวเดียวคลุมครบทุก Route ที่คุณเขียนมา)
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';