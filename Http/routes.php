<?php

Route::group(['middleware' => ['web', 'lookup:user', 'auth:user'], 'namespace' => 'Modules\YNABIntegration\Http\Controllers'], function()
{
    Route::resource('ynabintegration', 'YNABIntegrationController');
    Route::post('ynabintegration/bulk', 'YNABIntegrationController@bulk');
    Route::get('api/ynabintegration', 'YNABIntegrationController@datatable');
});

Route::group(['middleware' => 'api', 'namespace' => 'Modules\YNABIntegration\Http\ApiControllers', 'prefix' => 'api/v1'], function()
{
    Route::resource('ynabintegration', 'YNABIntegrationApiController');
});
