<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', HomePage::class)->name('home');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('category.posts');
Route::get('/archive/{year}/{month}', [PostController::class, 'byMonth'])->name('posts.byMonth');
Route::get('/author/{author:slug}', [PostController::class, 'byAuthor'])->name('posts.byAuthor');
