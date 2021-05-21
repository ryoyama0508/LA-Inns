@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">宿検索</h1>
<hr>
@endsection

@section( 'tbody' )
<form class="uk-search uk-search-default" action="{{ route( 'inn_search' ) }}" method="GET">
    <input class="uk-search-input" type="search" name="name" placeholder="名前">
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>
@foreach ($inns as $inn)
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        <p>This is inn {{ $inn->name }}</p>
        <div class="uk-flex">
            <a class="uk-margin-left" href="{{ route( 'inns.edit', $inn->id ) }}">情報を変更する</a>
            <a class="uk-margin-left" href="" onclick="deleteUser()">削除する</a>
            <form action="{{ route( 'inns.destroy', $inn->id ) }}" method="POST" id="delete-form">
                @csrf
                @method( 'delete' )
            </form>
            <script type="text/javascript">
                function deleteInn(){
                    event.preventDefault();
                    if( window.confirm( '本当に削除しますか？' ) ){
                        document.getElementById( 'delete-form' ).submit();
                    }
                }
            </script>
        </div>
    </div>
    
@endforeach
@endsection
