<?php

use App\Controllers\UserController;
use MyFramework\Framework\Routing\Route;

return [
    Route::get('/users/{id:\d+}', [UserController::class,  'show']),
    Route::post('/users/update', [UserController::class,  'update']),
    Route::post('/users/create', [UserController::class,  'create']),
];