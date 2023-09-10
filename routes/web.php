<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\HomeController;

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
    return view('home.index');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'user']);

Auth::routes();

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/edit/{category}', 'edit');
        Route::put('/category/{category}', 'update');
        Route::post('/category/delete', 'delete');
    });
    Route::controller(App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products','store');
        Route::get('/products/{id}/edit', 'edit');
        Route::put('/products/{id}/edit', 'update');
        Route::get('/product-image/{image_id}/delete', 'deleteImage');
        Route::delete('/products/{id}', 'deleteProduct');
    });

    Route::get('brands', App\Http\Livewire\Admin\Brands\index::class);

});




