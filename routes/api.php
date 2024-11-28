<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/home', function (){
    return "Welcome to the Electricity Api";
});

Route::post('/register',[AuthController::class, 'registerUser']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/providers',[ProviderController::class,'getProviders']);
Route::post('/payments',[TransactionController::class,'payment']);
