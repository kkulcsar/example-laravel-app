<?php

use App\Http\Controllers\Api\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/blog-posts', [BlogPostController::class, 'index']);

Route::post('/blog-posts', [BlogPostController::class, 'store']);
