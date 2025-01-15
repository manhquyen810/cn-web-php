<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

//Chính
Route::get('/', [PropertyController::class, 'index'])->name('properties.index');



//Thêm
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

//Sửa
Route::get('/properties/{id}/edit', [PropertyController::class, 'edit'])->name('properties.edit');

Route::put('/properties/{id}', [PropertyController::class, 'update'])->name('properties.update');

//Xóa
Route::delete('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

