@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">管理者ホーム</h1>
<hr>
@endsection

@section( 'tbody' )
    <a class="uk-button uk-button-default uk-button-large" type="button" href="{{ route( 'users.index' ) }}">会員検索</a>
    <a class="uk-button uk-button-default uk-button-large" type="button" href="{{ route( 'inns.index' ) }}">宿管理</a>
@endsection
