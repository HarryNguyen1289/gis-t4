<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ClientController@index')->name('client.index');
Route::get('/path', 'ClientController@viewPath')->name('client.path');

Route::prefix('floor')->group(function(){
    Route::get('/', 'FloorController@index')->name('floor.index');

    Route::get('create', 'FloorController@create')->name('floor.create');
    Route::post('store', 'FloorController@store')->name('floor.store');

    Route::get('edit/{id}', 'FloorController@edit')->name('floor.edit');
    Route::post('{id}', 'FloorController@update')->name('floor.update');

    Route::get('delete/{id}', 'FloorController@delete')->name('floor.delete');
});

Route::prefix('room')->group(function(){
    Route::get('/', 'RoomController@index')->name('room.index');

    Route::get('create', 'RoomController@create')->name('room.create');
    Route::post('store', 'RoomController@store')->name('room.store');

    Route::get('edit/{id}', 'RoomController@edit')->name('room.edit');
    Route::post('{id}', 'RoomController@update')->name('room.update');

    Route::get('delete/{id}', 'RoomController@delete')->name('room.delete');
});

Route::prefix('stair')->group(function(){
    Route::get('/', 'StairController@index')->name('stair.index');

    Route::get('create', 'StairController@create')->name('stair.create');
    Route::post('store', 'StairController@store')->name('stair.store');

    Route::get('edit/{id}', 'StairController@edit')->name('stair.edit');
    Route::post('{id}', 'StairController@update')->name('stair.update');

    Route::get('delete/{id}', 'StairController@delete')->name('stair.delete');
});

Route::prefix('node')->group(function(){
    Route::get('/', 'NodeController@index')->name('node.index');

    Route::get('create', 'NodeController@create')->name('node.create');
    Route::post('store', 'NodeController@store')->name('node.store');

    Route::get('edit/{id}', 'NodeController@edit')->name('node.edit');
    Route::post('{id}', 'NodeController@update')->name('node.update');

    Route::get('delete/{id}', 'NodeController@delete')->name('node.delete');

    Route::get('hardcode_node_list', 'NodeController@hardcode_node_list')->name('node.hardcode_node_list');
    Route::get('test_bfs', 'NodeController@test_bfs')->name('node.test_bfs');
    Route::post('get_shortest_path', 'NodeController@get_shortest_path')->name('node.get_shortest_path');
});

Route::prefix('line')->group(function(){
    Route::get('/', 'LineController@index')->name('line.index');

    Route::get('create', 'LineController@create')->name('line.create');
    Route::post('store', 'LineController@store')->name('line.store');

    Route::get('edit/{id}', 'LineController@edit')->name('line.edit');
    Route::post('{id}', 'LineController@update')->name('line.update');

    Route::get('delete/{id}', 'LineController@delete')->name('line.delete');
});
