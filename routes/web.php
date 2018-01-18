<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'UserController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/authority'], function (){
    Route::get('/', 'Authority\Auth\LoginController@showLoginForm')->name('authority.login');
    Route::post('/', 'Authority\Auth\LoginController@login')->name('authority.login.submit');
    Route::get('/home', 'Authority\AuthorityController@index')->name('authority.home');
    Route::get('/logout', 'Authority\Auth\LoginController@logout')->name('authority.logout');
    Route::get('/forgot', 'Authority\Auth\ForgotPasswordController@showLinkRequestForm')->name('authority.password.request');
    Route::post('/forgot', 'Authority\Auth\ForgotPasswordController@sendResetLinkEmail')->name('authority.password.email');

    Route::get('/reset/{token}', 'Authority\Auth\ResetPasswordController@showResetForm')->name('authority.password.reset');
    Route::post('/reset', 'Authority\Auth\ResetPasswordController@reset')->name('authority.password.reset.request');
});
