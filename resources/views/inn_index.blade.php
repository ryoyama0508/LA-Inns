@extends( 'common.layout' )

@section( 'header' )
<div class="uk-margin-small-left uk-margin-small-top uk-margin-remove-right uk-text-left">
    <a class="uk-button uk-button-default" href="{{ route( 'admin_home' ) }}">戻る</a>
</div>
<div class="uk-text-center">
    <h1 class="uk-heading">宿検索</h1>
</div>
<div class="uk-margin-small-right uk-margin-small-top uk-margin-remove-left uk-text-right">
    <a class="uk-button uk-button-default" href="{{ route( 'inns.create' ) }}">宿新規登録</a>
</div>
@endsection
<hr>

@section( 'tbody' )
<form class="uk-search uk-search-default" action="{{ route( 'inn_search' ) }}" method="GET">
    <input class="uk-search-input" type="search" name="name" placeholder="名前" value="{{ old('name') }}">
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>
@foreach ($inns as $inn)
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        <p>This is inn {{ $inn->name }}</p>
        <div class="uk-flex">
            <a class="uk-margin-left" href="{{ route( 'inns.edit', $inn ) }}">情報を変更する</a>
            <a class="uk-margin-left" href="" onclick="deleteInn({{ $inn->id }})">削除する</a>
            <form action="{{ route( 'inns.destroy', $inn ) }}" method="POST" id="delete-form{{ $inn->id }}">
                @csrf
                @method( 'delete' )
            </form>
        </div>
    </div>
@endforeach

<script type="text/javascript">
    function deleteInn(id){
        event.preventDefault();
        if( window.confirm( '本当に削除しますか？' ) ){
            document.getElementById( "delete-form"+String(id) ).submit();
        }
    }
</script>

@endsection
