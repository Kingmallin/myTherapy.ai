<?php

use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\CustomMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*')
    ->middleware([AdminAuthentication::class])
    ->withoutMiddleware([CustomMiddleware::class]);

Route::post('/login', [AdminController::class, 'login'])
    ->withoutMiddleware([
        AdminAuthentication::class,
        CustomMiddleware::class
    ]);

// Handle fallback route (unmatched routes)
Route::fallback(function () {
    return view('welcome');
});
