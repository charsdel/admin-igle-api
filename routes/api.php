<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MemberController;



Route::resource('/v1/members',MemberController::class);
Route::get('/v1/members/search/{search}','App\Http\Controllers\Api\V1\MemberController@search');
//Route::put('/v1/members/{id}','App\Http\Controllers\Api\V1\MemberController@update');

