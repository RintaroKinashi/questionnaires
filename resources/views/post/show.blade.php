@extends('layouts.app')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{-- assetはPublicフォルダにアクセスするための関数 --}}
        <img src="{{asset('storage/avatar/'.($post->user->avatar??'user_default.jpg'))}}"
                        class="rounded-circle" style="width:40px;height:40px;">
        <div class="text-muted small mr-3">
            {{$post->user->name??'削除されたユーザ'}}
        </div>
        <h4>{{$post->title}}</h4>
        @can('update', $post)
        <span class="ml-auto">
            <a href="{{route('post.edit', $post)}}"><button class="btn btn-primary">編集</button></a>
        </span>
        @endcan
        @can('delete', $post)
        <span class="ml-2">
            <form method="post" action="{{route('post.destroy', $post)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
            </form>
        </span>
        @endcan
    </div>
    <div class="card-body">
        <p class="card-text">
            {{$post->body}}
        </p>
        @if ($post->image)
            <div>
                (画像ファイル：{{$post->image}})
            </div>
            {{-- 画像はpublicフォルダにあるため、asset関数を使用する。 --}}
            <img src="{{asset('storage/images/'.$post->image)}}"
            class="img-fluid mx-auto d-block" style="height:300px;">
        @endif
    </div>
    <div class="card-footer">
        <span class="mr-2 float-right">
            投稿日時 {{$post->created_at->format('Y/m/d H:i:s')}}
        </span>
    </div>
</div>

{{-- コメントの表示 --}}
<hr>
@if ($post->comments)
    @foreach ($post->comments as $comment)
    <div class="card mb-4">
        <div class="card-header">
            <img src="{{asset('storage/avatar/'.($comment->user->avatar??'user_default.jpg'))}}" class="rounded-circle" style="width:40px;height:40px;">
            {{-- コメントに結びついたユーザ名を取り出す --}}
            <div class="text-muted small mr-3">
                {{$comment->user->name??'削除されたユーザ'}}
            </div>
        </div>
        <div class="card-body">
            {{$comment->body}}
        </div>
        <div class="card-footer">
            <span class="mr-2 float-right">
                投稿日時 {{$comment->created_at->diffForHumans()}}
            </span>
        </div>
    </div>
    @endforeach
@endif

{{-- バリデーションエラー表示 --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{{-- コメント機能 --}}
<div class="card mb-4">
    <form method="post" action="{{route('comment.store')}}">
        @csrf
        <input type="hidden" name='post_id' value="{{$post->id}}">
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="5"
            placeholder="コメントを入力する">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
        <button class="btn btn-success float-right mb-3 mr-3">コメントする</button>
        </div>
    </form>
</div>

@endsection
