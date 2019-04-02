<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Landing page is accessible for everyone.
Route::view('/privacy-statement', 'privacy-statement')->name('privacy');


Route::middleware('guest:web')
    ->group(function () {
        Route::get('/', 'LandingController@index')->name('index');
    });

Route::middleware('auth:web')
    ->group(function () {
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    });

