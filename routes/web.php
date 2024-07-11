<?php

use App\Http\Controllers\CorporativesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect('/mitienda');
});

Route::get('api/tiendas', [CorporativesController::class, 'index']);
