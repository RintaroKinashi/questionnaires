<div class="list-group">
    <a href="{{route('home')}}"
    {{-- 現在のURLがhomeであれば。という条件分岐。三項演算子。 --}}
    class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home pr-2"></i><span>一覧表示</span>
    </a>
    <a href="{{route('post.create')}}"
    class="list-group-item {{url()->current()==route('post.create')? 'active' : ''}}">
        <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span>
    </a>
    <a href="{{route('home.mypost')}}"
    class="list-group-item {{url()->current()==route('home.mypost')? 'active' : ''}}">
        <i class="fas fa-user-edit pr-2"></i><span>自分の投稿</span>
    </a>
    <a href="{{route('home.mycomment')}}"
    class="list-group-item {{url()->current()==route('home.mypost')? 'active' : ''}}">
        <i class="fas fa-user-edit pr-2"></i><span>コメントした投稿</span>
    </a>
    <a href="{{route('contact.create')}}"
    class="list-group-item {{url()->current()==route('contact.create')? 'active' : ''}}">
        <i class="fas fa-user-edit pr-2"></i><span>お問い合わせ</span>
    </a>
    <a href="{{route('profile')}}"
    class="list-group-item {{url()->current()==route('profile')? 'active' : ''}}">
        <i class="fas fa-list pr-2"></i><span>アカウント管理</span>
    </a>
</div>
