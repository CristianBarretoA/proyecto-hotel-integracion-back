<?php

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
    Route::post('/store', 'UserController@store');
});
