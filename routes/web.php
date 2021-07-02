<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('create', 'NodeController@create')->name('node.create');
    Route::get('test_bfs', 'NodeController@test_bfs')->name('node.test_bfs');
    Route::post('get_shortest_path', 'NodeController@get_shortest_path')->name('node.get_shortest_path');
});