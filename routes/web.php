<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(array('middleware' => 'cors','prefix' => 'api'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => 'Nutxt API', 'status' => 'Connected']);;
  });

  Route::resource('posts', 'PostsController');
  Route::resource('categories', 'CategoriesController');
});

Route::get('/', function () {
    return redirect('api');
});
