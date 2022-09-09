<?php

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

Route::get('/', function () {
    return view('back-end.admin.dasboard');
});
//resorce admin
Route::resource('descriptsion', 'DescripsionController');
Route::resource('imagenews', 'ImageNewsController');
Route::resource('newslatter', 'NewslatterController');
Route::resource('thumnail', 'ThumbnailController');
Route::resource('category', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
