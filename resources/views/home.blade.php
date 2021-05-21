@extends( 'common.layout' )

@section( 'header' )
    <div >
        <a href="" id="backhome">戻る</a>
    </div>
    <div>
        <h2 id="home">ホーム</h2>
    </div>
@endsection
<hr>

@section( 'tbody' )
<div>
    <a id="user_serch" type="button" href="{{ route( 'users.index' ) }}">会員検索</a>
    <a id=innmg type="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
</div>
@endsection
