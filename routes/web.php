<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/projects', 'projectsController@index');
Route::get('/projects/create', 'projectsController@create')->middleware("auth");
Route::post('/projects/store', 'projectsController@store')->middleware("auth");
Route::get('/project/{project}','projectsController@show');
Route::post('/project/{project}/comment','commentsController@store')->middleware('auth');


