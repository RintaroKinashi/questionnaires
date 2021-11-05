{{-- 左記のテンプレートを本画面は使用するという宣言 --}}
@extends('layouts.app')
{{-- 上記テンプレートのyieldの部分に下記の内容を埋め込むという宣言 --}}
@section('content')

<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="md4">新規投稿</h1>
            {{-- エラーメッセージの表示 --}}
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @if(empty($errors->first('image')))
                        <li>画像ファイルがあれば、再度選択してください。</li>
                    @endif
                </ul>
            </div>
            @endif
            {{-- 正常終了メッセージの表示 --}}
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            {{-- method="post" : 内容が送信されるという宣言 --}}
            {{-- route('post.store')：postコントローラーのstoreメソッドを使うという宣言 --}}
            {{-- ※二重波かっこ：エスケープ処理、有効な文を別の文字列に置き換え。phpのhtmlspecialcharsと一緒の処理 --}}
            {{-- enctype：一回のHTTP通信で複数種類のデータ形式を扱えるようになる --}}
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                {{-- @csrf：シーサーフ対策。form処理をする場合は必須となる --}}
                @csrf
                <div class="form-group">
                    <label for="title">件名</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="タイトル">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10" placeholder="ここに入力してください。">{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">画像（1MBまで）</label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">送信する </button>
            </form>
        </div>
    </div>
</div>
@endsection
