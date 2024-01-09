<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome', ['users'=>[]]);
});

Route::get('/test', [UserController::class, 'test']);  

// Route::resource('/photos', PhotoController::class);
Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

// 중첩 리소스로 정의.  nested resource, 상세내용은 공식문서 참고 
// Route::resource('/posts.comments', CommentController::class)->except(['create', 'show', 'index', 'edit']);
Route::resource('/posts.comments', CommentController::class)->only(['store', 'update', 'destroy']);


