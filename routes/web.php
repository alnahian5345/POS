<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\supplierController;

Route::get('/', function () {
    return view('main.index');
})->name('dashboard');


Route::get('/category',[categoryController::class,'category'])->name('setup.category');
Route::post('/category',[categoryController::class,'categoryCreate'])->name('setup.category.create');
Route::get('/category/editCategory/{category_id}',[categoryController::class,'editCategory'])->name('setup.category.editCategory');
Route::put('/category/update/{category_id}',[categoryController::class,'categoryUpdate'])->name('setup.category.update');
Route::delete('/category/{category_id}',[categoryController::class,'categoryDelete'])->name('setup.category.delete');


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
Route::get('/purchase/supplier-list',[purchaseController::class,'getSupllier'])->name('purchase.purchase.supplier-list');




