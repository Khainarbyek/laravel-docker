<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name("product");
    Route::post('/calculate', 'calculate')->name("calculate");
});