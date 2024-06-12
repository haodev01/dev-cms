<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
  return view('admin.pages.login');
});
Route::get('/register', function () {
  return view('admin.pages.register');
});
