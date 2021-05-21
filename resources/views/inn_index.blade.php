@extends( 'common.layout' )

@section( 'header' )
<h1>宿検索</h1>
<hr>
@endsection

@section( 'tbody' )
<form action="{{ route( 'inn_search' ) }}" method="GET">
    <input class="uk-search-input" type="search" name="name" placeholder="名前" value="{{ old('name') }}">
    <button type="submit"></button>
</form>
@foreach ($inns as $inn)
    <div>
        <p>This is inn {{ $inn->name }}</p>
        <div>
            <a href="{{ route( 'inns.edit', $inn ) }}">情報を変更する</a>
            <a href="" onclick="deleteInn()">削除する</a>
            <form action="{{ route( 'inns.destroy', $inn ) }}" method="POST" id="delete-form{{ $inn->id }}">
                @csrf
                @method( 'delete' )
            </form>
            <script type="text/javascript">
                function deleteInn(){
                    event.preventDefault();
                    if( window.confirm( '本当に削除しますか？' ) ){
                        document.getElementById( "delete-form{{ $inn->id }}" ).submit();
                    }
                }
            </script>
        </div>
    </div>
    
@endforeach
@endsection
