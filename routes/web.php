<?php

Route::get('/', function () {
	return view('login', ['title' => trans('login.title')]);
});
