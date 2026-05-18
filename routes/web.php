<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\setupController;


Route::get('/', function () {
    return view('main.index');
});


Route::get('/product',[setupController::class,'product'])->name('setup.product');

Route::get('/category',[setupController::class,'category'])->name('setup.category');
Route::post('/category',[setupController::class,'categoryCreate'])->name('setup.category.create');
Route::put('/category/{category_id}',[setupController::class,'categoryUpdate'])->name('setup.category.update');
Route::delete('/category/{category_id}',[setupController::class,'categoryDelete'])->name('setup.category.delete');
