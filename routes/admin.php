<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

// Вынесли код с admin в отдельный файл user.php и зарегистрировали его в RouteServiceProvider.php
Route::redirect('/admin', '/admin/posts', '302')->middleware(['auth', 'active', 'admin'])->name('admin');

Route::prefix('admin')->as('admin.')->middleware(['admin'])->group(function(){
    // Route::redirect('/', '/admin/posts', '302')->name('admin');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

    //Route::resource('posts', PostController::class)->only(['index', 'show']);

    Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
});
