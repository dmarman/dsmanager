<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ContainerController@index');

Route::get('/containers/create', 'ContainerController@create');

Route::post('/containers/store', 'ContainerController@store');

Route::get('/containers/{container}', 'ContainerController@show');

Route::get('/containers', 'ContainerController@index');

Route::get('/datasets/create', 'DatasetController@create');

Route::post('/datasets/store', 'DatasetController@store');

Route::get('/datasets/{dataset}', 'DatasetController@show');

Route::get('/datasets', 'DatasetController@index');