<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/inicio', 'VerifyTypeController');

Route::group(['middleware' => ['permissions']], function () {

    Route::group(['middleware' => ['type:client'], 'prefix' => 'client'], function () {
        require __DIR__ . '/client/web.php';
    });

    Route::group(['middleware' => ['type:admin'], 'prefix' => 'admin'], function () {
        require __DIR__ . '/admin/web.php';
    });

    Route::group(['middleware' => ['type:provider'], 'prefix' => 'provider'], function () {
        require __DIR__ . '/provider/web.php';
    });

});