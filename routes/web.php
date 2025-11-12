<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WriterController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/writers', [WriterController::class, 'index'])->name('writers.index');
Route::get('/writers/{user}', [WriterController::class, 'show'])->name('writers.show');

Route::view('/about', 'about')->name('about');
