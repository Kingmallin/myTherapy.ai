<?php

use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\CustomMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;

// Route for handling login
Route::post('/login', [AdminController::class, 'login'])
    ->withoutMiddleware([
        AdminAuthentication::class,
        CustomMiddleware::class
    ]);

Route::any('/broadcasting/authentication', function (Request $request) {
    return response()->json(['auth' => true]);
})
->withoutMiddleware('web');

// Default route for all other requests
Route::any('/{any}', function () {
    return view('layouts.app');
})->where('any', '^(?!api).*$')
  ->middleware([AdminAuthentication::class])
  ->withoutMiddleware([CustomMiddleware::class]);
