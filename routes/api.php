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

Route::group(array('middleware' => ['cors','auth:api'],'prefix' => 'v1'), function () {

    Route::get('/', function () {
        return response()->json(['message' => 'Nutxt API', 'status' => 'Connected']);
    });
    
    Route::resource('posts', 'PostsController', ['except' =>[
        'create', 'edit'
    ]]);
    
    Route::resource('categories', 'CategoriesController', ['except' =>[
        'create', 'edit'
    ]]);
});

Route::get('/', function () {
    return redirect('v1');
});
