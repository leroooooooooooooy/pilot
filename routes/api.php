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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/metric/{id?}', 'MetricController@get');
Route::post('/metric', 'MetricController@post');
Route::put('/metric/{id}', 'MetricController@put');

Route::get('/data_point/{id?}', 'DataPointController@get');
Route::post('/data_point', 'DataPointController@post');
Route::put('/data_point/{id}', 'DataPointController@put');
