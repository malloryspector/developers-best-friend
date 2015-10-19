<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return view('index');
});

Route::controller('lorem-ipsum', 'LoremController');
Route::controller('random-user-generator', 'RandomUserController');
Route::controller('xkcd-password-generator', 'PasswordController');

Route::get('/practice', function() {
  echo "Hello World!";
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
