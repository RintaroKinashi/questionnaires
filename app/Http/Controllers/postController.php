<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // データを一覧表示
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規作成用フォームの表示
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 新規作成を保存
    public function store(Request $request)
    {
        $inputs = $request->validate([
            // required|max:255：入力されているかどうか。255文字までか。
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'image' => 'image|max:1024'
        ]);
        $post = new Post();
        // $post->title：インスタンス内のtitleを指す
        // $request->title：フォームから投稿されたデータ
        $post->title = $request->title;
        $post->body = $request->body;
        // 認証済みのユーザIDを入れる
        $post->user_id = auth()->user()->id;
        if (request('image')) {
            // 元々のファイル名を取得・$nameに代入する
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            // $nameの名前で画僧ファイルを指定の場所に保存
            request()->file('image')->move('storage/images', $name);
            // DBに画像ファイル名を渡す
            $post->image = $name;
        }
        $post->save();
        return back()->with('message', '投稿しました!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    // 作成データを個別表示
    public function show(Post $post)
    {
        //
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     * editとupdateの動きの違いとは？
     */
    // 作成データ編集用フォームの表示
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 編集したデータを保存
    public function update(Request $request, Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'image' => 'image|max:1024'
        ]);

        if (request('image')) {
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $post->image = $name;
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->save();
        return back()->with('message', '投稿を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // データを削除する。
    public function destroy(Post $post)
    {
        //投稿に結びつくコメントを削除する
        $post->comments()->delete();
        //投稿を削除する
        $post->delete();
        return redirect()->route('home')->with('message', '投稿を削除しました');
    }
}
