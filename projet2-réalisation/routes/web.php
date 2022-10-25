<?php

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StudentController;
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

Route::resource('gestion',PromotionController::class);

route::get('/search',[PromotionController::class,'search']);

Route::resource('gestionstud',StudentController::class);

 Route::get('gestionstud/create/{id}',[StudentController::class,'create'])->name('gestion.insert');
Route::get('gestion/editstudent/{id}',[StudentController::class,'edit'])->name('gestion.editstudent');

route::get('/searchstudent',[StudentController::class,'search1']);

//Route::get('gestionstud/destroy/{id}',[StudentController::class,'destroy']);
//  Route::put('gestion/editstudent/{id}',[StudentController::class,'update'])->name('gestionstud.update');
//Route::get('/create/{id}','create')->name('create');
