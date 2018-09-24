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

Route::get('/', 'Controller@index');

Route::resource('users', 'UserController');
Route::resource('proyectos', 'ProyectoController');
Route::resource('tareas', 'TareaController');
Route::resource('asignaciones', 'AsignacionController');
Auth::routes();

Route::get("/cambiar/estado/tarea/{id_tarea}", "TareaController@cambiarEstado");
Route::get("/borrar/tarea/{id}", "TareaController@destroy");
Route::get("/borrar/proyecto/{id}", "ProyectoController@destroy");

//Route::post("/incluir/proyecto", "ProyectoController@store");