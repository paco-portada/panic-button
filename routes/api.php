<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('trucks', 'Api\TruckController@index');

Route::get('login', 'Api\AuthController@login');
