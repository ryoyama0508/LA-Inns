@extends( 'common.layout' )

@section( 'header' )
    <div>
        <h1 id="home" class="title"><span>ホーム</span></h1>
    </div>
@endsection
<hr>

@section( 'tbody' )
<div class="content">
    <a id=search_user class="button" href="{{ route( 'users.index' ) }}">会員検索</a>
    <a id="inn-mg"class="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
    </div>
@endsection
