<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Therapist\TherapistController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\CustomMiddleware;
use Illuminate\Support\Facades\Route;

// Routes excluded from CustomMiddleware and AdminAuthentication
Route::post('/new-user', [UserController::class, 'create']);

Route::middleware([AdminAuthentication::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'getAdmin']);

    Route::get('/therapist', [TherapistController::class, 'index']);

    Route::post('/therapist', [TherapistController::class, 'create']);

    Route::delete('/therapist/{id}', [TherapistController::class, 'delete']);

    Route::put('/therapist', [TherapistController::class, 'update']);

    Route::post('/blog', [BlogController::class, 'create']);

    Route::get('/blog', [BlogController::class, 'index']);

    Route::put('/blog', [BlogController::class, 'update']);

    Route::delete('/blog/{id}', [BlogController::class, 'delete']);

});

// Other routes that should use CustomMiddleware
Route::middleware([CustomMiddleware::class])->group(function () {
    // Place routes that should use CustomMiddleware here
    // Add more routes as needed
});
