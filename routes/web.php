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
Route::get('/detail/{id}', 'reader\HomeController@show');
//resorce admin



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('descriptsion', 'DescripsionController');
    Route::resource('imagenews', 'ImageNewsController');
    Route::resource('newslatter', 'NewslatterController');
    Route::resource('thumnail', 'ThumnaildController');
    Route::resource('category', 'CategoryController');
});



Route::prefix('latter')->middleware(['auth', 'latter'])->group(function () {
    Route::get('/', 'news\IndexController@index')->name('home');
    Route::resource('newsaatter', 'news\NewsLatterController');
    Route::resource('thumNails', 'news\ThumnailController');
});




Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Auth::routes(['verify' => true]);
