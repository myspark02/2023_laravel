<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/test', function(){
    return "오늘 수업은 여기서 마치겠습니다!!!!";
}); // 클로저 

Route::get('/user/{id?}', function (string $id='100') {
    return 'User '.$id; 
});

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) { 
        return '게시글 '.$postId.'번 글의 댓글'.$commentId.'번을 인출했습니다.'; 
});