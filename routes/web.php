<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
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
})->middleware('guest'); // ログイン済みユーザがmiddleware('guest') を付与したルート設定にアクセスするとログイン後のページ(\home)にリダイレクトされる。
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypost', 'HomeController@mypost')->name('home.mypost');
Route::get('/mycomment', 'HomeController@mycomment')->name('home.mycomment');
// URLに侵入したIDが管理者の場合のみ、閲覧可能とする記述
Route::middleware(['can:admin'])->group(function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::delete('/profile/delete/{user}', 'ProfileController@delete')->name('profile.delete');
});

// post：データを保存する
Route::post('/post/comment/store', 'CommentController@store')->name('comment.store');

// お問い合わせフォーム
Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');

// プロフィール編集画面
Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');

// リソースコントローラーの宣言
Route::resource('/post', 'postController');
