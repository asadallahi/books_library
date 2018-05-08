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


Route::resource('/', 'DashboardController');
Route::post('books.add_review', 'BooksController@addReview');
Route::resource('books', 'BooksController');
Route::get('register', 'UsersController@register');
Route::post('register', 'UsersController@doRegister');
Route::get('logout', 'UsersController@logout');

