<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dataset/{dataset}', 'DatasetController@show');

Route::get('/containers/create', 'ContainerController@create');