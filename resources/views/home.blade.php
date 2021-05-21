@extends( 'common.layout' )

@section( 'header' )
    <div>
        <h2 id="home">ホーム</h2>
    </div>
@endsection
<hr>

@section( 'tbody' )
<div>
    <a class="button" href="{{ route( 'users.index' ) }}">会員検索</a>
    <a class="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
    </div>
@endsection
