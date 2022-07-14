<?php

use Illuminate\Http\Request;
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
            Route::get('/payment', 'PaymentController@generateToken');

            //Appartamento da sponsorizzare
            Route::get('/sponsorship/{apartment}', 'PaymentController@sponsorship')->name('sponsorship');
            
            Route::post('/payment/checkout', 'PaymentController@checkout')->name('checkout');
            Route::get('/payment/{id}', 'PaymentController@payment')->name('payment');
        }
    );

Route::get('/', 'Admin\ApartmentController@home')->name('home');

Route::get('{any?}', 'Admin\ApartmentController@home')->where("any", ".*");