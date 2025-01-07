<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthApiController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tasks', [TasksController::class, 'index']);
    Route::post('/tasks', [TasksController::class, 'store']);
    Route::post('/tasks/{id}', [TasksController::class, 'update']);
});