<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::get('/products/index',[ProductController::class,'index']);
Route::get('/products/create',[ProductController::class,'create']);
Route::post('/products/store',[ProductController::class,'store']);
Route::get('/products/{id}/edit',[ProductController::class,'edit']);
Route::post('/products/update/{id}',[ProductController::class,'update']);
Route::get('/products/{id}/delete',[ProductController::class,'delete']);


Route::get('/categories/index',[CategoryController::class,'index']);
Route::get('/categories/create',[CategoryController::class,'create']);
Route::post('/categories/store',[CategoryController::class,'store']);
Route::get('/categories/{id}/edit',[CategoryController::class,'edit']);
Route::post('/categories/update/{id}',[CategoryController::class,'update']);
Route::get('/categories/{id}/delete',[CategoryController::class,'delete']);
