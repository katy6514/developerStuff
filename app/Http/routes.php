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



Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/practice', function() {
  echo App::environment();
    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});



Route::get('/', function() {
  return view('index');
});

Route::get('/users', 'UserController@getIndex');
Route::post('/users', 'UserController@postIndex');
Route::get('/loremIpsum', 'LipsumController@getIndex');
Route::post('/loremIpsum', 'LipsumController@postIndex');

Route::get('/password','PasswordController@getIndex');
Route::post('/password', 'PasswordController@postIndex');

Route::get('/htpassword','HTpasswordController@getIndex');
Route::post('/htpassword', 'HTpasswordController@postIndex');
