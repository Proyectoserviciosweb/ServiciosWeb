<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\PostController;
use App\http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');;
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/user/{user}/edit', [UserController::class, 'update'])->name('admin.user.update');
Route::get('/user/{user}', [UserController::class, 'show'])->name('admin.user.show');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');
Route::delete('/user/edit/{post}', [PostController::class, 'destroy'])->name('admin.post.delete');

Route::post('/user', [PostController::class, 'store'])->name('admin.user.store');

Route::get('/user/nuevo/agregar', [UserController::class,'crearUser'])->name('admin.user.crear');

Route::post('/user', [UserController::class, 'crearUsuario'])->name('admin.registro.user');
