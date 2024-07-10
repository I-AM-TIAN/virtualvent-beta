<?php

use App\Http\Controllers\CorporativesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/tiendas', [CorporativesController::class, 'index']);
