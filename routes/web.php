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

Route::get('/', 'SearchController@index');
Route::post('savesearch', 'SearchController@store');
Route::get('previous_searches', 'SearchController@previous_searches');
Route::post('search_definition', 'SearchController@search_definition'); 
   	