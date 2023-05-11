<?php


use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogMiddleware;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
//use App\Http\Controllers\User\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\Posts\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
// 1- сокращенная запись - без метода get
// Route::view('/', 'welcome', [
//     "name"=>"Ivan"
//     ]); // сокращенное написание

Route::view('/', 'home.index', ["name"=>"Ivan"])->name('home'); // 1- короткая запись получения view страницы - в папке home -file index

// ->name('posts');

// Можно использовать имя Route для получения пути к URL
// > route('posts')
// = "http://localhost/posts"


Route::redirect('/home', '/', '302')->name('home.redirect'); // 2- использование redirect (третий параметр - код ответа default)

//Route::get('/test', TestController::class)->name('test')->middleware(LogMiddleware::class); // 1-й вар Middleware
//Route::get('/test', TestController::class)->name('test')->middleware('log'); // 3-й вар Middleware в kernel.php
// Route::get('/test', TestController::class)->name('test'); // 4-й вар Middleware в kernel.php - в protected $middleware
// Route::get('/test', TestController::class)->name('test')->middleware('token:NEW DATA, foo'); // можно передавать в middleware значения

Route::get('/test', TestController::class)->name('test');

// тестирование валидации
Route::get('/validation', [ValidationController::class, 'index'])->name('validation.index');
Route::post('/validation', [ValidationController::class, 'store'])->name('validation.store');

//CRUD
// применение группового Alias middleware 'guest' для входа на страницы ниже только для незалогиненных пользователей

Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->withoutMiddleware('guest'); // EXCEPTION;
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
// Подтверждение пароля после получения e-mail

//Route::get('/login/{user}/confirmatin', [LoginController::class, 'confirmation'])->name('login.confirmation');
//Route::post('/login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');

Route::get('/blog',[BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}',[BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post}/like',[BlogController::class, 'like'])->name('blog.like');

// Вынесли код с user в отдельный файл user.php и зарегистрировали его в RouteServiceProvider.php

//Route::prefix('user')->as('user.')->group(function(){
//    Route::get('/posts', [PostController::class, 'index'])->name('posts');
//    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
//    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
//    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
//
//    //Route::resource('posts', PostController::class)->only(['index', 'show']);
//
//    Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
//});



//
//Route::resource('posts/{post}/comments', CommentController::class)->only(['index', 'show', 'edit']);

Route::resource('posts/{post}/comments', CommentController::class)->except(['destroy', 'show']); // или Route::resurses([posts => ..., photos => ...])

Route::get('/about', function () {
    return view('about');
});

// 3 - ПОСЛЕДНИЙ - ЕСЛИ НЕ СРАБОТАЛ НИ ОДИН МАРШРУТ
//Route::fallback(function(){
//    return "NO SITE";
//});
