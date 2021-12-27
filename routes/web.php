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
// Categories

Route::get('create-category', 'CategoryController@create');
Route::post('post-category','CategoryController@store');
Route::get('all-categories','CategoryController@index');
Route::get('edit-category/{id}','CategoryController@edit');
Route::post('update-category/{id}','CategoryController@update');
Route::get('delete-category/{id}','CategoryController@destroy');

// Organisme assureur

Route::get('create-assurance', 'AssuranceController@create');
Route::post('post-assurance','AssuranceController@store');
Route::get('all-assurance','AssuranceController@index');
Route::get('edit-assurance/{id}','AssuranceController@edit');
Route::post('update-assurance/{id}','AssuranceController@update');
Route::get('delete-assurance/{id}','AssuranceController@destroy');

// Actes Médicaux

Route::get('create-acte', 'ActMedicalController@create');
Route::post('post-acte','ActMedicalController@store');
Route::get('all-actes','ActMedicalController@index');
Route::get('edit-acte/{id}','ActMedicalController@edit');
Route::post('update-acte/{id}','ActMedicalController@update');
Route::get('delete-acte/{id}','ActMedicalController@destroy');


// Médiiaments

Route::get('create-medicament', 'MedicamentController@create');
Route::post('post-medicament','MedicamentController@store');
Route::get('all-medicaments','MedicamentController@index');
Route::get('edit-medicament/{id}','MedicamentController@edit');
Route::post('update-medicament/{id}','MedicamentController@update');
Route::get('delete-medicament/{id}','MedicamentController@destroy');

// Hospitals

Route::get('create-hospital', 'HospitalController@create');
Route::post('post-hospital','HospitalController@store');
Route::get('all-hospitals','HospitalController@index');
Route::get('edit-hospital/{id}','HospitalController@edit');
Route::post('update-hospital/{id}','HospitalController@update');
Route::get('delete-hospital/{id}','HospitalController@destroy');







