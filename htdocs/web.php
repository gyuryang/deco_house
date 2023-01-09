<?php
	use src\Core\Route;

	Route::reg([
		["get","/@MainController@main"],
	]);
	if(ss()){
		Route::reg([
			['get','/user/logout@UserController@logout'],
			['get','/house/house@HouseController@house'],
			['post','/house/write@HouseController@write'],
		]);
	}else{
		Route::reg([
			['post','/user/login@UserController@login'],
			['post','/user/join@UserController@join'],
		]);
	}