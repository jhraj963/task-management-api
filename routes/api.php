<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('organizations', [OrganizationController::class, 'store']);
Route::middleware('auth:api')->group(function () {
    // Route::apiResource('projects', ProjectController::class);
    // Route::apiResource('tasks', TaskController::class);
    // Route::apiResource('organizations', [OrganizationController::class, 'store']);
    // Route::apiResource('users', UserController::class);
});

Route::middleware('auth:api')->group(function () {
    Route::get('organizations', [OrganizationController::class, 'index']);
    Route::post('organizations', [OrganizationController::class, 'store']);
    Route::put('organizations', [OrganizationController::class, 'update']);
    Route::delete('organizations', [OrganizationController::class, 'delete']);
});
