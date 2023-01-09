<?php
	session_start();

	require "lib.php";
	require "web.php";

	if(!src\Core\DB::fetch("SELECT * FROM user",[])){
		src\Core\DB::exec("INSERT INTO user SET id='specialist1', pw='1234', name='전문가1', specialist='1'",[]);
		src\Core\DB::exec("INSERT INTO user SET id='specialist2', pw='1234', name='전문가2', specialist='1'",[]);
		src\Core\DB::exec("INSERT INTO user SET id='specialist3', pw='1234', name='전문가3', specialist='1'",[]);
		src\Core\DB::exec("INSERT INTO user SET id='specialist4', pw='1234', name='전문가4', specialist='1'",[]);
	}

	src\Core\Route::init();