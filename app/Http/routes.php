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

// Route::get('/', function () {
//   echo "hello";
//     // return view('_master');
// });

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



//Route::post('/wilcoIpsum', function() {
// $generator = new Badcow\LoremIpsum\Generator();
// $paragraphs = $generator->getParagraphs(5);
// echo implode('<p>', $paragraphs);


  // $songs = array(
  //     "There's rows and rows of houses With windows painted blue With the light from a TV  Running parallel to you But there is no sunken treasure Rumored to be Wrapped inside my ribs  In a sea black with ink I am so Out of tune With you I am so out of tune With you If I had a mountain I'd try to fold it over If I had a boat (probably roll over) You know I'd probably roll over (leave it on the shore) And I leave it on the shore (leave it for somebody) I'd leave it for somebody Surely there's somebody Who needs it more than me I am so Out of tune With you I am so out of tune With you For all the leaves will burn In autumn fires and then return For all the fires we burn All will return Music is my savior I was maimed by rock and roll I was maimed by rock and roll I was tamed by rock and roll I got my name from rock and roll",
  //     "I got you and that's all I need I got you and that's all I need I got you and that's all I need I got you I got you and I still believe That you are all I will ever need It's you, oh All the way back in the seventies You were my little TV queen Your Tarzan and your friend Janine I got you I got you and I still believe That you are all I will ever need It's you, oh It's the end of the century And I can't think of anything Except you It's the end of the century And I can't think of anything But you, oh All, I, need I got you I got you, babe I got you",
  //     "Impossible Germany Unlikely Japan Wherever you go Wherever you land I’ll say what this means to me I’ll do what I can Impossible Germany Unlikely Japan The fundamental problem We all need to face This is important But I know you’re not listening Oh I know you’re not listening"
  //   );

    // $input =  Input::all();
    // print_r($input);

//});
