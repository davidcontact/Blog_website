<?php

use Illuminate\Support\Facades\Route;
// public
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;

Route::get('/DataPost', [ApiController::class, 'Api']);


// admin
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Artical/{id}', [HomeController::class, 'readMore'])->name('blog');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/Post', [PostController::class, 'index'])->name('Post');
    Route::get('/Post/Create', [PostController::class, 'create'])->name('Post.create');
    Route::post('/Post/Store', [PostController::class, 'store'])->name('Post.store');
    Route::get('/Post/{id}', [PostController::class, 'edit'])->name('Post.edit');
    Route::put('/Post/{id}', [PostController::class, 'update'])->name('Post.update');
    Route::delete('/Post/{id}', [PostController::class, 'delete'])->name('Post.delete');

    Route::get('/Category', [CategoryController::class, 'index'])->name('category');
    Route::get('/Category/Create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/Category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/Category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/Category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/Category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Tag 
    Route::get('/Tag', [TagController::class, 'index'])->name('Tag');
    Route::get('/Tag/Create', [TagController::class, 'create'])->name('Tag.create');
    Route::post('/Tag/Store', [TagController::class, 'store'])->name('Tag.store');
    Route::get('/Tag/{id}', [TagController::class, 'edit'])->name('Tag.edit');
    Route::put('/Tag/{id}', [TagController::class, 'update'])->name('Tag.update');
    Route::delete('/Tag/{id}', [TagController::class, 'delete'])->name('Tag.delete');

});


// Login 
Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/tag', [DemoController::class, 'tag']);
// Route::get('/view', [DemoController::class, 'view']);
// Route::get('/post', [DemoController::class, 'post']);