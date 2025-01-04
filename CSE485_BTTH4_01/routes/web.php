<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Hiển thị danh sách khóa học
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// Create - Hiển thị form tạo khóa học mới
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

// Create - Lưu dữ liệu khóa học mới
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Edit - Hiển thị form chỉnh sửa khóa học
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

// Edit - Lưu dữ liệu chỉnh sửa khóa học
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

// Delete - Xóa khóa học
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Show - Hiển thị thông tin chi tiết khóa học
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
