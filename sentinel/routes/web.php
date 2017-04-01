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
Route::post('/logout', 'loginController@logout');

Route::group(['middleware' => 'visitor'], function() {
    Route::get('/login', 'loginController@login');
    Route::post('/login', 'loginController@auth');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', 'AdminController@index');

    Route::get('/admin/user', 'registrationController@getUserInfo');
    Route::get('/admin/register', 'registrationController@register');
    Route::post('/admin/register', 'registrationController@store');
    Route::get('/admin/user/{id}/edit', 'registrationController@edit');
    Route::put('/admin/user/{id}', 'registrationController@update');
    Route::delete('/admin/user/{id}', 'registrationController@destroy');

    Route::resource('/admin/kegiatan', 'EventController');
    Route::put('/admin/kegiatan/{userid}/{eventid}/{imagename}', 'EventController@delImage');

    Route::resource('/admin/kerjasama', 'kerjasamaController');

    Route::get('/admin/statistik', 'AdminController@statistik');
    Route::get('/admin/statistik/datapie', 'AdminController@showPie');
    Route::get('/admin/statistik/dataline', 'AdminController@showLine');

    Route::get('/admin/log', 'activityLogController@index');
    Route::delete('/admin/log', 'activityLogController@clear');
});

Route::group(['middleware' => 'user'], function() {
    Route::get('/', 'UserController@index');

    Route::get('/profil', 'UserController@profile');
    Route::put('/profil/{id}', 'UserController@update');

    Route::resource('/kegiatan', 'EventController');
    Route::put('/kegiatan/{userid}/{eventid}/{imagename}', 'EventController@delImage');

    Route::resource('/kerjasama', 'kerjasamaController');
});
