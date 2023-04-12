<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\BaiVietController;
use App\Http\Controllers\Api\v1\DanhMucController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// use App\Http\Controllers\Api\v2\CustomerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [HomeController::class, 'index']);
// Route::post('add_customer', [CustomerController::class, 'store']);
Route::prefix('v1')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['index','show','store','update','destroy']);
    Route::resource('category', CategoryPostController::class);
    Route::resource('post', PostController::class);
    Route::resource('danh-muc', DanhMucController::class);
    Route::resource('bai-viet', BaiVietController::class)->only(['index','show','store','update','destroy']);
});
Route::prefix('v2')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['show']);
});