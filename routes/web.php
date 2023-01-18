<?php

use App\Http\Controllers\ProductController;
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
    return view('layout/Home/main');
});

// Route Product
Route::get('/product', [ProductController::class, 'index'])->name('list_product');

Route::get('/create', [ProductController::class, 'create'])->name('create_product');

Route::post('/store', [ProductController::class, 'store'])->name('store_product');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('show_product');

Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit_product');

Route::patch('/update/{product}', [ProductController::class, 'update'])->name('update_product');

Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('delete_product');


// End Route Product

//login