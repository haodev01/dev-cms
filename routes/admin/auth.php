<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('admin.pages.index');
})->name('admin.dashboard');

Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
