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
