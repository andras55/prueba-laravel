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

Route::get('/{id?}', 'CrudController@consulta');

Route::post('/alta', 'CrudController@alta');

Route::post('/editar/{id}', 'CrudController@editar');

Route::post('/eliminar/{id}', 'CrudController@eliminar');