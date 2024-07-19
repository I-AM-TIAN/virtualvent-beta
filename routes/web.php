<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CorporativesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect('/mitienda');
});

Route::get('api/categories', [CategoryController::class, 'index']);

Route::get('api/tiendas', [CorporativesController::class, 'index']);

Route::get('api/store/{url}', [CorporativesController::class, 'show'])->name('store.show');