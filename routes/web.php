<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])
    ->name('home');
Route::get('/projects', [ProjectController::class, 'grid'])
    ->name('grid');
Route::get('/project/{id}', [ProjectController::class, 'show'])
    ->name('project.show');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('/admin/projects', ProjectController::class)
        ->names('admin.projects');
});
