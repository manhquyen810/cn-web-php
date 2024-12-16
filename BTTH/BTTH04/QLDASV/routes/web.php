<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesisController;

// Gốc - Index ban đầu
Route::get('/', [ThesisController::class, 'index'])->name('theses.index');

// Create - Hiển thị form đồ án mới
Route::get('/theses/create',[ThesisController::class,'create'])->name('theses.create');

//Create - Lưu lại dữ liệu đồ án mới
Route::post('/theses',[ThesisController::class,'store'])->name('theses.store');

//Edit - Hiển thị form sửa
Route::get('/theses/{id}/edit', [ThesisController::class, 'edit'])->name('theses.edit');

//Edit - Lưu lại dữ liệu sửa
Route::put('/theses/{id}', [ThesisController::class, 'update'])->name('theses.update');

//Delete - Xóa dữ liệu
Route::delete('/theses/{id}', [ThesisController::class, 'destroy'])->name('theses.destroy');
