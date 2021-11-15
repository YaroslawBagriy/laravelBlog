<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('register', [RegisterController::class, 'create']);

Route::post('register', [RegisterController::class, 'store']);