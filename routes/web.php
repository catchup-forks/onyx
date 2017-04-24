<?php

Route::get('/', function () {
	return view('login', ['title' => trans('login.title')]);
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){
        return view('admin.dashboard', ['title' => 'Dashboard']);
    });
    Route::group(['prefix' => 'category'], function(){
        Route::get('list', 'Admin\CategoryController@getList');
        Route::post('list', 'Admin\CategoryController@postList');
        Route::get('add', 'Admin\CategoryController@getAdd');
        Route::post('add', 'Admin\CategoryController@postAdd');
    });
});