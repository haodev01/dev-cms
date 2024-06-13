<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/register', [AuthController::class, 'doReigster'])->name('admin.doReigster');
Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.doLogin');
