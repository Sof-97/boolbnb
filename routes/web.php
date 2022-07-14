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
            Route::get('message', 'ApartmentController@messages')->name('message');
            Route::get('sponsor', 'ApartmentController@sponsor')->name('sponsor');
        }
    );

Route::get('/', 'Admin\ApartmentController@home')->name('home');

Route::get('{any?}', 'Admin\ApartmentController@home')->where("any", ".*");