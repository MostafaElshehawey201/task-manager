<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('Auth')->middleware('Lang')->group(function(){
        Route::post('register' ,[AuthController::class , 'register']);
        Route::post('login' , [AuthController::class , 'login']);
        Route::post('RequestOtp' , [AuthController::class, 'RequestOtp']);
    });
});
