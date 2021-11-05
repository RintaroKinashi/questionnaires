{{-- 左記のテンプレートを本画面は使用するという宣言 --}}
@extends('layouts.app')
{{-- 上記テンプレートのyieldの部分に下記の内容を埋め込むという宣言 --}}
@section('content')

<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="md4">アンケート</h1>
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
            <form method="post" action="{{route('anser.store')}}">
                {{-- @csrf：シーサーフ対策。form処理をする場合は必須となる --}}
                @csrf
                @foreach ($r_questionnaires as $r_questionnaire)
                <div class="col-md-6 mb-4">
                    <p>Q:{{$r_questionnaire->question_title}}</p>
                    <div class="form-check">
                        <input type="radio" required name={{$r_questionnaire->id}} class="form-check-input" id="{{$r_questionnaire->id}}1" value=1>
                        <label for="{{$r_questionnaire->id}}1" class="form-check-label">{{$r_questionnaire->q1}}</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name={{$r_questionnaire->id}} class="form-check-input" id="{{$r_questionnaire->id}}2" value=2>
                        <label for="{{$r_questionnaire->id}}2" class="form-check-label">{{$r_questionnaire->q2}}</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name={{$r_questionnaire->id}} class="form-check-input" id="{{$r_questionnaire->id}}3" value=3>
                        <label for="{{$r_questionnaire->id}}3" class="form-check-label">{{$r_questionnaire->q3}}</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name={{$r_questionnaire->id}} class="form-check-input" id="{{$r_questionnaire->id}}4" value=4>
                        <label for="{{$r_questionnaire->id}}4" class="form-check-label">{{$r_questionnaire->q4}}</label>
                    </div>


{{-- 記述をforでまとめてみたけど複雑になったソース --}}
                    {{-- @for ($queston_number=1;$queston_number<5;$queston_number++)
                        <div class="form-check form-check-inline">
                            @php
                                $output_queston_number = "q".$queston_number
                            @endphp
                            <input type="radio" name={{$r_questionnaire->questionnaire_id}} class="form-check-input" id={{$r_questionnaire->questionnaire_id.$queston_number}} value={{$queston_number}} required>
                            <label for={{$r_questionnaire->questionnaire_id.$queston_number}} class="form-check-label">{{$r_questionnaire->$output_queston_number}}</label>
                        </div>
                    @endfor --}}
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">送信する </button>
            </form>
        </div>
    </div>
</div>
@endsection
