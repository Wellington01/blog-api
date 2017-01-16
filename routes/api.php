<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::group(array('middleware' => ['cors'],'prefix' => 'v1'), function () {
    Route::get('/', function () {
        return response()->json(['message' => 'Nutxt API', 'status' => 'Connected']);
    });
    
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
});

Route::get('/', function () {
    return redirect('api');
});
