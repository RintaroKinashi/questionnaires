<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // postsテーブルのデータを全て取ってくる
        $posts = Post::orderBy('created_at', 'desc')->get();
        // ログイン中のユーザ情報を代入
        $user = auth()->user();
        // compact()：変数名と値から配列を作成する。
        return view('home', compact('posts', 'user'));
    }
}
