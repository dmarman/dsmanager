<?php

Route::get('/container/descriptions', 'ContainerDescriptionController@descriptions');

Route::get('/containers', 'ContainerController@all');

Route::get('/container/{container}', 'ContainerController@container');

Route::get('/dataset/{dataset}', 'DatasetController@dataset');

Route::get('/datasets', 'DatasetController@all');