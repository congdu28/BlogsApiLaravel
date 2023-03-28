<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\HomeController;

// use App\Http\Controllers\Api\v2\CustomerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [HomeController::class, 'index']);
// Route::post('add_customer', [CustomerController::class, 'store']);
Route::prefix('v1')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['index','show','store','update','destroy']);
    Route::resource('category', CategoryPostController::class);
});
Route::prefix('v2')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['show']);
});