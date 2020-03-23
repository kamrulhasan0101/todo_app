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
Route::resources([
    'category' => 'CategoryController',
    'task'=>'TaskController'
]);

Route::get('/category/task/{task}', 'CategoryController@category_task')->name('category.task');
Route::put('task-done/{task}', 'TaskController@task_done')->name('task.done');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

