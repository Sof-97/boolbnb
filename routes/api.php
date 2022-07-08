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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::get('/apartments', 'ApartmentController@index');
    Route::get('/apartments/{slug}', 'ApartmentController@show');
    Route::get('/apartments/search/{query}/', 'ApartmentController@search');
    Route::get('/address', 'PoiController@index');
    Route::get('/distance/{radius}/{lat}/{lon}', 'ApartmentController@radiusSearch');
});