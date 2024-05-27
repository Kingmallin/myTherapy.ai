<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\CustomMiddleware;
use Illuminate\Support\Facades\Route;

// Routes excluded from CustomMiddleware
Route::post('/new-user', [UserController::class, 'create'])
    ->withoutMiddleware([
        CustomMiddleware::class,
        AdminAuthentication::class
    ]);

Route::get('admin', [AdminController::class, 'getAdmin'])
    ->middleware([AdminAuthentication::class])
    ->withoutMiddleware([CustomMiddleware::class]);

/**
 * use middleware
 */
Route::group(['middleware' => ['api']], function () {
    Route::post('/api/test', [UserController::class, 'test']);
})->withoutMiddleware([
    AdminAuthentication::class,
]);
