<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;
use App\Models\Currency;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');

Route::get('currency', function() {
	return Currency::first();
	// return response($currency);
});

Route::get('posts-generate', [PostController::class, 'index_generate'])->name('indexgenerate');
Route::post('posts-generate', [PostController::class, 'store_generate'])->name('storegenerate');
