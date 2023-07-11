<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Customer Authentication APIs
// Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1\Auth', 'as' => 'api.'], function () {
//     Route::post('login', 'LoginController@login')->name('login');

//     Route::group(['middleware' => ['auth:api']], function () {
//         Route::post('logout', 'LoginController@logout')->name('logout');
//     });
// });

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1', 'middleware' => ['auth:website']],  function () {
    //Orders
    Route::post('orders', 'OrdersApiController@store');
});

// Route::group([
//     'prefix' => 'v1', 'as' => 'api.',
//     'namespace' => 'Api\V1\Admin',
//     'middleware' => ['auth:api']
// ], function () {


// });
