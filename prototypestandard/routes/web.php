<?php

use App\Http\Controllers\PromotionController;
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

Route::controller(PromotionController::class)->group(function(){
Route::get('/','index');
Route::get('/insert','create');
Route::post('/promotion','store');
Route::get('edit/{id}','edit');
Route::post('update/{id}','update');
Route::get('delete/{id}','destroy');

// Route::get('edit/{id}',[PromotionController::class,'edit']);
// Route::post('update/{id}',[PromotionController::class,'update']);
// Route::get('delete/{id}',[PromotionController::class,'destroy']);
});

