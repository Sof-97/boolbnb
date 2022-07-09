<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();



Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(
        function () {
            Route::resource('apartments', 'ApartmentController');
            Route::get('dashboard', 'ApartmentController@dashboard')->name('dashboard');
        }
    );

Route::get('/', function () {
    return view('guest.index');
});

Route::get('{any?}', function () {
    return view('guest.index');
})->where("any", ".*");
