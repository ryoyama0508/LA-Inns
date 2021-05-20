@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">管理者ホーム</h1>
<hr>
@endsection

@section( 'tbody' )
<p uk-margin>
    <button class="uk-button uk-button-default uk-button-large" type="button" onclick="window.location='{{ route( "user_index" ) }}'">会員検索</button>
    <button class="uk-button uk-button-default uk-button-large">宿管理</button>
</p>
@endsection
