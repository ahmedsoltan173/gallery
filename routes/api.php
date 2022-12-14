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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('api-image', [App\Http\Controllers\HomeController::class, 'image']);
Route::post('api-image', 'App\Http\Controllers\HomeController@image');
Route::post('api-gallery', 'App\Http\Controllers\HomeController@gallery');

Route::get('image/{id}', 'App\Http\Controllers\ApiContrller@show');
Route::get('api-sort', 'App\Http\Controllers\ApiContrller@sort');
// Route::post('api-image', 'App\Http\Controllers\HomeController@image');
