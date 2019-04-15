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

Auth::routes(['verify' => true]);

// Landing page is accessible for everyone.
Route::view('/privacy-statement', 'privacy-statement')->name('privacy');

Route::get('/imagetest', 'ImageTestController@index')->name('imagetest');
Route::post('/imagetest', 'ImageTestController@process')->name('imagetest');

Route::middleware('guest:web')
    ->group(function () {
        Route::get('/', 'LandingController@index')->name('index');
    });

Route::group(['middleware' => ['auth:web', 'verified']], function () {
    Route::get('browse', 'FamilyMemberController@select')->name('SelectFamilyMember');
    Route::get('/manage/{id}', 'FamilyMemberController@manage')->name('manageFamilyMember');
});

Route::group(['middleware' => ['auth:web', 'verified', 'familyMemberSelected']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('agenda', 'AgendaController@index')->name('agenda');

    Route::get('/account', 'AccountController@index')->name('profile');

    Route::get('RegisterFamilyMembers', 'Auth\RegisterFamilyMembersController@showFamilyMemberForm')->name('RegisterFamilyMembers');
    Route::post('RegisterFamilyMembers', 'Auth\RegisterFamilyMembersController@register')->name('RegisterFamilyMembers');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
