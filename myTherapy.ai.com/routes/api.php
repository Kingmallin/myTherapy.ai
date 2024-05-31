<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Therapist\TherapistController;
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

Route::get('/admin', [AdminController::class, 'getAdmin'])
    ->withoutMiddleware([CustomMiddleware::class]);

Route::get('/therapist', [TherapistController::class, 'index'])
    ->withoutMiddleware([CustomMiddleware::class]);

Route::post('/therapist', [TherapistController::class, 'create'])
    ->withoutMiddleware([CustomMiddleware::class]);

Route::delete('/therapist/{id}', [TherapistController::class, 'delete'])
    ->withoutMiddleware([CustomMiddleware::class]);
    
Route::put('/therapist', [TherapistController::class, 'update'])
    ->withoutMiddleware([CustomMiddleware::class]);
