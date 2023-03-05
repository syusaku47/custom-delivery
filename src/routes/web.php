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

//Route::resource('/', \App\Http\Controllers\DeliveryController::class)->only([
//    'index',  // 一覧取得
//]);
Route::get('/',function(){
   return file_get_contents(public_path('index.html'));
});