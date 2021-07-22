<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// https://litvinjuan.medium.com/how-to-fix-target-class-does-not-exist-in-laravel-8-f9e28b79f8b4
Route::get('/greeting', 'App\Http\Controllers\API\PostController@test');

Route::get('posts', 'App\Http\Controllers\API\PostController@index');
Route::group(['prefix' => 'post'], function () {
    Route::get('add', 'App\Http\Controllers\API\PostController@add');
    Route::post('add', 'App\Http\Controllers\API\PostController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\API\PostController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\API\PostController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\API\PostController@delete');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
