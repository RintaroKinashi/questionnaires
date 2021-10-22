<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// get：ページを表示する
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post：データを保存する
Route::post('/post/comment/store', 'CommentController@store')->name('comment.store');

// リソースコントローラーの宣言
Route::resource('/post', 'postController');
