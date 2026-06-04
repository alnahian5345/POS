<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\setupController;
use App\Http\Controllers\productController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\supplierController;

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

Route::get('/customer',[CustomersController::class,'index'])->name('setup.customer');
Route::post('/customer',[CustomersController::class,'create'])->name('setup.customer.create');
Route::delete('/customer/destroy/{customer_id}',[CustomersController::class,'destroy'])->name('setup.customer.destroy');
Route::get('/customer/edit/{customer_id}',[CustomersController::class,'edit'])->name('setup.customer.edit');
Route::put('/customer/update/{customer_id}',[CustomersController::class,'update'])->name('setup.customer.update');


Route::get('/supplier',[supplierController::class,'index'])->name('setup.supplier');
Route::delete('/supplier/delete/{supplier_id}',[supplierController::class,'destroy'])->name('setup.supplier.delete');
Route::post('/supplier',[supplierController::class,'create'])->name('setup.supplier.create');

Route::get('/purchase',[purchaseController::class,'index'])->name('purchase.purchase');




