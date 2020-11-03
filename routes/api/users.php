<?php

/*Route::group(['middleware' => 'jwt', 'prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
});*/

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
});
