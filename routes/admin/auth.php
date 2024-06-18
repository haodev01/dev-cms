<?php

use App\Helpers\PermissionHelper;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('admin.pages.index');
})->name('admin.dashboard');

Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::resource('/articles', ArticleController::class);
Route::resource('/tags', TagController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::resource('/users', AdminController::class);
Route::get('/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/register', [AuthController::class, 'doReigster'])->name('admin.doReigster');
