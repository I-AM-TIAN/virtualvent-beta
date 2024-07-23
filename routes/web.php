<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CorporativesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect('/mitienda');
});

Route::get('api/categories', [CategoryController::class, 'index']);

Route::get('api/tiendas', [CorporativesController::class, 'index']);

Route::get('api/store/{url}', [CorporativesController::class, 'show'])->name('store.show');

Route::get('api/store/{url}/products', [CorporativesController::class, 'getProducts'])->name('store.show');

