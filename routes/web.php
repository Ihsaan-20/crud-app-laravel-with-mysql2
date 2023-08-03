<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[productController::class,'index']);
Route::get('/products/add',[productController::class,'add']);
Route::post('/products/store',[productController::class,'store']);
Route::get('/products/{id}/edit',[productController::class,'edit']);
Route::put('/products/{id}/update',[productController::class,'update']);
Route::delete('/products/{id}/destory',[productController::class,'destory']);
Route::get('/products/{id}/view',[productController::class,'view']);

