<?php

use App\Controllers\HomeController;
use App\Controllers\NewsController;
use App\Controllers\UserController;
use MyFramework\Framework\Routing\Route;

return [
    Route::get('/', [HomeController::class,  'index']),

    Route::get('/users', [UserController::class,  'index']),
    Route::get('/users/{id}', [UserController::class,  'show']),
    Route::post('/users/create', [UserController::class,  'create']),
    Route::put('/users/{id}/update', [UserController::class,  'update']),
    Route::delete('/users/{id}/delete', [UserController::class,  'delete']),

    Route::get('/news', [NewsController::class,  'index']),

];