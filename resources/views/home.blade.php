@extends( 'common.layout' )

@section( 'header' )
<div></div>
<div class="uk-text-center"><h1>管理者ホーム</h1></div>
<div></div>
@endsection
<hr>

@section( 'tbody' )
<a class="uk-button uk-button-default uk-button-large" type="button" href="{{ route( 'users.index' ) }}">会員検索</a>
<a class="uk-button uk-button-default uk-button-large" type="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
@endsection
