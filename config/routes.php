<?php

use App\Controllers\FormController;
use App\Controllers\IndexController;
use App\Controllers\TableController;
use App\Kernel\Router\Route;

return [
    Route::get('/', [IndexController::class, 'index']),
    Route::post('/form/store', [FormController::class, 'store']),

    Route::get('/table', [TableController::class, 'index']),
    Route::post('/table/store', [TableController::class, 'store']),

];