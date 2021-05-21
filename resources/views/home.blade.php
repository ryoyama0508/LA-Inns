@extends( 'common.layout' )

@section( 'header' )
    <div >
        <a href="">戻る</a>
    </div>
    <div>
        <h2>ホーム</h2>
    </div>
@endsection
<hr>

@section( 'tbody' )
<div>
    <a  type="button" href="{{ route( 'users.index' ) }}">会員検索</a>
    <a  type="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
    </div>
@endsection
