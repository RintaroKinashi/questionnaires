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

Auth::routes();

// get：ページを表示する
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypost', 'HomeController@mypost')->name('home.mypost');
Route::get('/mycomment', 'HomeController@mycomment')->name('home.mycomment');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');

// post：データを保存する
Route::post('/post/comment/store', 'CommentController@store')->name('comment.store');
Route::post('/contact/store', 'ContactController@store')->name('contact.store');

// リソースコントローラーの宣言
Route::resource('/post', 'postController');
