<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/daftar', 'LoginController@daftar');
    Route::post('/check_username', 'LoginController@checkUsername');
    Route::post('/check_username_id', 'LoginController@checkUsernameId');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@getUser'); 
    Route::post('/edit_foto', 'UserController@editFoto');
    Route::post('/edit_profile', 'UserController@editProfile');
    Route::post('/edit_quran', 'UserController@editQuran');
});

Route::group(['prefix' => 'doa'], function () {
    Route::get('/', 'DoaController@getAll');
    Route::get('/{id}', 'DoaController@getDetail');
    Route::get('/jml/{jml}', 'DoaController@getSomeDoa');
});

Route::group(['prefix' => 'ibadah'], function () {
    Route::get('/', 'IbadahController@getAll');
    Route::get('/dikerjakan/{id}/{tanggal}', 'IbadahController@dikerjakan');
    Route::post('/status_ibadah', 'IbadahController@statusIbadah');
});

Route::group(['prefix' => 'saran'], function () {
    Route::post('/tambah', 'SaranController@addSaran');
});