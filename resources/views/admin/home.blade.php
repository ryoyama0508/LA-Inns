@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">管理者ホーム</h1>
<hr>
@endsection

@section( 'tbody' )
<p uk-margin>
    <button class="uk-button uk-button-default uk-button-large">会員管理</button>
    <button class="uk-button uk-button-default uk-button-large">
        <a href="{{ route('admin.inns.index', $post) }}">宿管理 </a>
    </button>
</p>
@endsection
