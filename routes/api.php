<?php

Route::get('/container/descriptions', 'ContainerDescriptionController@descriptions');

Route::get('/containers', 'ContainerController@index');

Route::get('/container/{container}', 'ContainerController@container');

Route::get('/dataset/{dataset}', 'DatasetController@dataset');

Route::get('/datasets', 'DatasetController@index');