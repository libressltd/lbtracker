<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'lbtracker'], function () {
	Route::resource("request", "libressltd\lbtracker\controllers\LBT_requestController");
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'lbtracker/ajax'], function () {
	Route::resource("request", "libressltd\lbtracker\controllers\Ajax\LBT_requestController");
});
