<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\setupController;
use App\Http\Controllers\productController;

Route::get('/', function () {
    return view('main.index');
});




Route::get('/category',[setupController::class,'category'])->name('setup.category');
Route::post('/category',[setupController::class,'categoryCreate'])->name('setup.category.create');
Route::get('/category/editCategory/{category_id}',[setupController::class,'editCategory'])->name('setup.category.editCategory');
Route::put('/category/update/{category_id}',[setupController::class,'categoryUpdate'])->name('setup.category.update');
Route::delete('/category/{category_id}',[setupController::class,'categoryDelete'])->name('setup.category.delete');


Route::get('/product',[productController::class,'product'])->name('setup.product');
Route::post('/product',[productController::class,'create'])->name('setup.product.create');
Route::delete('/product/delete/{product_id}',[productController::class,'destroy'])->name('setup.product.delete');
Route::get('/product/edit/{product_id}',[productController::class,'edit'])->name('setup.product.edit');
Route::put('/product/update/{product_id}',[productController::class,'update'])->name('setup.product.update');

