{{-- 左記のテンプレートを本画面は使用するという宣言 --}}
@extends('layouts.app')
{{-- 上記テンプレートのyieldの部分に下記の内容を埋め込むという宣言 --}}
@section('content')

<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="md4">投稿編集</h1>
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
            <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                {{-- @csrf：シーサーフ対策。form処理をする場合は必須となる --}}
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">件名</label>
                    {{-- old('name属性の値') --}}
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title', $post->title)}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{old('body',$post->body)}}</textarea>
                </div>

                <div class="form-group">
                    @if ($post->image)
                        {{-- 画像はpublicフォルダにあるため、asset関数を使用する。 --}}
                        <img src="{{asset('storage/images/'.$post->image)}}"
                        class="img-fluid mx-auto d-block" style="height:300px;">
                    @endif
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
