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


Route::get('/','DashboardController@index');
Route::get('create-category','BlogPostController@index');


Route::post('post-category','CategoryController@store');
Route::get('all-categories','CategoryController@index');
Route::get('edit-category/{id}','CategoryController@edit');
Route::post('update-category/{id}','CategoryController@update');
Route::get('delete-category/{id}','CategoryController@destroy');

//posts

Route::get('get-blog-post-form','BlogPostController@create');
Route::post('store-blog-post','BlogPostController@store');
Route::get('all-blogs','BlogPostController@index');
Route::get('edit-post/{id}','BlogPostController@edit');
Route::post('update-post/{id}','BlogPostController@update');
Route::get('delete-post/{id}','BlogPostController@destroy');





