<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('users.index'); // Hiển thị danh sách người dùng

// Create - Hiển thị form tạo mới
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Create - Lưu dữ liệu người dùng mới
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Edit - Hiển thị form sửa người dùng
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Edit - Lưu dữ liệu sửa người dùng
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Delete - Xóa người dùng
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Show - Hiển thị thông tin chi tiết người dùng
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
