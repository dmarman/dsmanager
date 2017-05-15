<?php

Route::get('/containers', 'ContainerController@index');

Route::get('/container/{container}', 'DatasetController@dataset');

Route::get('/dataset/{dataset}', 'DatasetController@dataset');

Route::get('/datasets', 'DatasetController@index');