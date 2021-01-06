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

Route::get('/','DatVeMBController@index');

Auth::routes();
Route::get('profile', 'HomeController@index')->name('profile');
Route::post('profileUpdate', 'HomeController@update')->name('profile.update');


// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('hangbay','HangBayController');
Route::resource('datvemb','DatVeMBController');
Route::post('datvemb-update-modal','DatVeMBController@updateModal')->name('datvemb.updateModal');
//export
Route::get('datvemb-view-export','DatVeMBController@getExport')->name('datvemb.getExport');
Route::get('datvemb-export','DatVeMBController@postExport')->name('datvemb.postExport');