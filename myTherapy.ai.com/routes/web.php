<?php

use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\CustomMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// Route for handling login
Route::post('/login', [AdminController::class, 'login'])
    ->withoutMiddleware([
        AdminAuthentication::class,
        CustomMiddleware::class
    ]);

// Default route for all other requests
Route::any('/{any}', function () {
    return view('layouts.app');
})->where('any', '^(?!api).*$')
  ->middleware([AdminAuthentication::class])
  ->withoutMiddleware([CustomMiddleware::class]);
