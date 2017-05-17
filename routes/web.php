<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ContainerController@index');

Route::post('/files/upload', 'FileController@upload');
Route::get('/files/{file}/download', 'FileController@download');
Route::delete('/files/{file}', 'FileController@destroy');

Route::get('/containers/create', 'ContainerController@create');
Route::post('/containers/store', 'ContainerController@store');
Route::get('/containers/{container}', 'ContainerController@show');
Route::get('/containers', 'ContainerController@index');

Route::get('/datasets/create', 'DatasetController@create');
Route::post('/datasets', 'DatasetController@store');
Route::get('/datasets/{dataset}/edit', 'DatasetController@edit');
Route::get('/datasets/{dataset}', 'DatasetController@show');

Route::post('/checks', 'CheckController@store');

Route::get('/dsm/{file}', 'DsmController@show');

Route::get('/test', 'DsmController@test');