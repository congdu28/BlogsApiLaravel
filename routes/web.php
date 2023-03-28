<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@getLogin']);
// Route::post('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@postLogin']);
// Route::get('/logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\Auth\LoginController@getLogout']);

Route::middleware(['auth'])->group(function () {
    // tất cả đường link muốn bảo vệ chỉ cần viết vào đây
  
   
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/bai-viet/{id}', [BaiVietController::class, 'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');
