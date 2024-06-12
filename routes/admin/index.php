<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {
  require_once('auth.php');
});
Route::group([], function () {
  require_once('guest.php');
});
