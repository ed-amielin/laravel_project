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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new-project', 'ProjectController@newProject')->name('new-project');
Route::post('/new-project', 'ProjectController@createProject')->name('create-project');

Route::get(
	'/project/{id}', 
	'ProjectController@showProject'
)->name('project');

Route::get(
	'/edit-project/{id}', 
	'ProjectController@editProject'
)->name('edit-project');

Route::post(
	'/edit-project/{id}', 
	'ProjectController@saveProject'
)->name('save-project');

Route::get(
	'/delete-project/{id}', 
	'ProjectController@deleteProject'
)->name('delete-project');

Route::post(
	'/delete-project/{id}', 
	'ProjectController@confirmDeleteProject'
)->name('confirm-delete-project');


Route::get('/project/{id}/new-task', 'TaskController@newTask')->name('new-task');
Route::post('/project/{id}/new-task', 'TaskController@createTask')->name('create-task');

Route::get(
	'/task/{id}', 
	'TaskController@showTask'
)->name('task');

Route::get(
	'/edit-task/{id}', 
	'TaskController@editTask'
)->name('edit-task');

Route::post(
	'/edit-task/{id}', 
	'TaskController@saveTask'
)->name('save-task');

Route::get(
	'/delete-task/{id}', 
	'TaskController@deleteTask'
)->name('delete-task');

Route::post(
	'/delete-task/{id}', 
	'TaskController@confirmDeleteTask'
)->name('confirm-delete-task');

Route::get(
	'/task/{id}/file', 
	'TaskController@downloadFile'
)->name('download-file');