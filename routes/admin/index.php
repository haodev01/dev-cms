<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
  require_once('guest.php');
});
Route::group(['middleware' => 'auth'], function () {
  require_once('auth.php');
});
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
  ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
  ->name('ckfinder_browser');
