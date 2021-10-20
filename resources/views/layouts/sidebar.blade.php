<div class="list-group">
    <a href="{{route('home')}}"
    {{-- 現在のURLがhomeであれば。という条件分岐。三項演算子。 --}}
    class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home"></i><span>一覧表示</span>
    </a>
    <a href="{{route('post.create')}}"
    class="list-group-item {{url()->current()==route('post.create')? 'active' : ''}}">
        <i class="fas fa-pen-nib"></i><span>新規投稿</span>
    </a>
</div>
