<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController
};


Route::get('/', function () { return view('welcome');});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); 
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); 
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show'); 
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); 
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');