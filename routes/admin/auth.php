<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('admin.pages.index');
})->name('admin.dashboard');

Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::resource('/articles', ArticleController::class);
Route::resource('/tags', TagController::class);
Route::resource('/categories', CategoryController::class);
