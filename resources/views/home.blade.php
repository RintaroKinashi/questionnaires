@extends('layouts.app')
@section('content')

@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="ml-2 mb-3">
    home
</div>

<center>{{$user->name}}さん、こんにちは！</center>
@foreach ($posts as $post)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3">
                            {{-- {{route('ルート名',パラメータ)}} でルートにパラメータを渡せる --}}
                            <a href="{{route('post.show', $post)}}">{{ $post->title }}</a>
                            {{-- リレーションを設定したためできること --}}
                            <div class="text-muted small">{{$post->user->name}}</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            {{-- diffForHumans()：今の時間から逆算した時間を表示する --}}
                            <div><strong>{{$post->created_at->diffForHumans()}}</strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{$post->body}}</p>
                    @if ($post->image)
                        {{-- 画像はpublicフォルダにあるため、asset関数を使用する。 --}}
                        <img src="{{asset('storage/images/'.$post->image)}}"
                        class="img-fluid mx-auto d-block" style="height:300px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
