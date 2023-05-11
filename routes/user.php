<?php


use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

// Вынесли код с user в отдельный файл user.php и зарегистрировали его в RouteServiceProvider.php


// Route::redirect('/user', '/user/posts', '302')->name('user')->middleware(['auth', 'active']);
Route::redirect('/user', '/user/posts', '302')->name('user')->middleware(['active']);

Route::prefix('user')->as('user.')->middleware(['active'])->group(function(){
    // Route::redirect('/', '/user/posts', '302')->name('user'); // выносим из группы - иначе неверное имя user.user

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
