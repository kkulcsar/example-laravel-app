<?php

use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'must-verify-email']], function () {
    Route::get('/blog-posts', [BlogPostController::class, 'index']);
    Route::post('/blog-posts', [BlogPostController::class, 'store']);
});
