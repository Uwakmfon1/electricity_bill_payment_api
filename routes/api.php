<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/home', function (){
    return "Welcome to the Electricity Api";
});

Route::post('/register-user',[AuthController::class, 'register']);

