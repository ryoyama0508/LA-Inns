@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">管理者ホーム</h1>
<hr>
@endsection

@section( 'tbody' )
<p uk-margin>
    <button type="button" class="uk-button uk-button-default uk-button-large" onclick="windows.location='{{ route( 'user_search' ) }}'">会員管理</button>
    <button type="button" onclick="window.location='{{ route("user_search") }}'">Button</button>
    <button class="uk-button uk-button-default uk-button-large">宿管理</button>
</p>
@endsection
