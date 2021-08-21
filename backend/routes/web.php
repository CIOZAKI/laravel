<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 省略/Users/zaki/programming/laravel/backend/app/Http/Controllers/ContensControoller.php
Route::get('contents','\App\Http\Controllers\ContensController@index');
// マルチ認証
// ログイン
Route::get('multi_login', [\App\Http\Controllers\MultiAuthController::class, 'showLoginForm']);
Route::post('multi_login', [\App\Http\Controllers\MultiAuthController::class, 'login']);


// ログアウト
Route::get('multi_login/logout', [\App\Http\Controllers\MultiAuthController::class, 'logout']);

// ログイン後のページ
Route::prefix('comedians')->middleware('auth:comedians')->group(function(){

 Route::get('dashboard', function(){ return '芸人でログイン完了'; });

});
Route::prefix('musicians')->middleware('auth:musicians')->group(function(){

 Route::get('dashboard', function(){ return 'ミュージシャンでログイン完了'; });

});
Route::prefix('athletes')->middleware('auth:athletes')->group(function(){

 Route::get('dashboard', function(){ return 'アスリートでログイン完了'; });

});
