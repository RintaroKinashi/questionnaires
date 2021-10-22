@extends('layouts.app')
@section('content')

@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
{{-- mb：下側のマージン？意味無いように見える --}}
<div class="">
    <p>home</p>
    {{-- $user：ログイン中のユーザ情報を引っ張って来ている --}}
    <p>{{$user->name}}さん、こんにちは！</p>
    {{-- <p>あなたのメアド：{{$user->email}}</p> --}}
    <p>あなたが登録した日：{{$user->created_at->format('Y/m/d')}}</p>
</div>
{{-- @php
    dd($user);
    dd($posts);
@endphp --}}

{{-- コントローラーに持って来させた$posts（配列群）を一つずつの配列として処理する --}}
@foreach ($posts as $post)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-1">
                            {{-- リレーションを設定したためできること --}}
                            <div class="text-muted small">{{$post->user->name}}</div>
                            {{-- {{route('ルート名',パラメータ)}} でルートにパラメータを渡せる --}}
                            <a href="{{route('post.show', $post)}}">{{ $post->title }}</a>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日：{{$post->created_at->diffForHumans()}}</div>
                            {{-- diffForHumans()：今の時間から逆算した時間を表示する --}}
                            <div>{{ $post->created_at }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{$post->body}}</p>
                    @if ($post->image)
                        {{-- asset関数：publicフォルダにアクセスするための関数。引数にパスを渡す。 --}}
                        <img src="{{asset('storage/images/'.$post->image)}}"
                        class="img-fluid mx-auto d-block border" style="height:200px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
