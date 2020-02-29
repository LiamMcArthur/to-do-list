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

Route::prefix('to-do-list')->group(function() {
    Route::post('/store', 'ToDoListController@store');
    Route::get('/get-posts', 'ToDoListController@index');
    Route::get('/get-checked', 'ToDoListController@getCheckedItems');
    Route::post('/update-checked', 'ToDoListController@updateCheckedItems');
    Route::delete('/post/{id}', 'ToDoListController@delete');
});
