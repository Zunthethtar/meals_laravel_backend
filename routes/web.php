<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UI\ProductController as UIProductController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/UI/products', [UIProductController::class, 'index']);  
Route::get('cart', [UIProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [UIProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [UIProductController::class, 'remove'])->name('remove.from.cart');
Route::post('check-out',[UIProductController::class, 'checkout'])->name('check');


Route::get('/', function () {
    return view('admin.layouts.master');
});
Route::group(['middleware' => 'auth'], function () {

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    });
Route::redirect('/','admin/dashboard');
Route::get('/products/index',[ProductController::class,'index']);
Route::get('/products/create',[ProductController::class,'create']);
Route::post('/products/store',[ProductController::class,'store']);
Route::get('/products/{id}/edit',[ProductController::class,'edit']);
Route::post('/products/update/{id}',[ProductController::class,'update']);
Route::get('/products/{id}/delete',[ProductController::class,'delete']);

Route::get('/orders/index',[OrderController::class,'index']);
Route::get('/orders/create',[OrderController::class,'create']);
Route::post('/orders/store',[OrderController::class,'store']);
Route::get('/orders/{id}/edit',[OrderController::class,'edit']);
Route::post('/orders/update/{id}',[OrderController::class,'update']);
Route::get('/orders/{id}/delete',[OrderController::class,'delete']);

Route::get('/categories/index',[CategoryController::class,'index']);
Route::get('/categories/create',[CategoryController::class,'create']);
Route::post('/categories/store',[CategoryController::class,'store']);
Route::get('/categories/{id}/edit',[CategoryController::class,'edit']);
Route::post('/categories/update/{id}',[CategoryController::class,'update']);
Route::get('/categories/{id}/delete',[CategoryController::class,'delete']);
});
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
