<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MemberController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewPasswordController;
                            
use App\Http\Controllers\Api\V1\ForgotPasswordController;
use App\Http\Controllers\Api\V1\CodeCheckController;
use App\Http\Controllers\Api\V1\ResetPasswordController;







Route::controller(LoginController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group( function () {

    Route::resource('/v1/members',MemberController::class);
    Route::get('/v1/members/search/{search}','App\Http\Controllers\Api\V1\MemberController@search');

    Route::get('/v1/schemedrops','App\Http\Controllers\Api\V1\MemberController@getSedesNetsHomes');


    Route::post('logout', [LoginController::class, 'logout']);
    

});

Route::get('/v1/statictis','App\Http\Controllers\Api\V1\MemberController@statictis');
Route::get('/v1/hb','App\Http\Controllers\Api\V1\MemberController@birthdayBoys');


Route::post('/v1/saveimage','App\Http\Controllers\Api\V1\MemberController@saveImage');




Route::get('/uploads', function () {
    abort(404, __('errors.images-root-restricted'));
});

//rutas de contrase#a olvidada web
Route::post('forgot-password','App\Http\Controllers\Api\NewPasswordController@forgotPassword');
Route::post('reset-password', [NewPasswordController::class, 'reset']);

#Route::post('reset-password', [NewPasswordController::class, 'reset']);

//rutas de contrase#a olvidada app
Route::post('password/email', 'App\Http\Controllers\Api\ForgotPasswordController');
Route::post('password/code/check','App\Http\Controllers\Api\CodeCheckController');
Route::post('password/reset', 'App\Http\Controllers\Api\ResetPasswordController');