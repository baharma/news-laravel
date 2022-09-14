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


Route::get('/', 'reader\HomeController@index');
//resorce admin



Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('descriptsion', 'DescripsionController');
    Route::resource('imagenews', 'ImageNewsController');
    Route::resource('newslatter', 'NewslatterController');
    Route::resource('thumnail', 'ThumbnailController');
    Route::resource('category', 'CategoryController');
});






Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
