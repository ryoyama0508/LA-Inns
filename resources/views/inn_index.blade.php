@extends( 'common.layout' )

@section( 'header' )
<a class="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a>
<h1>宿検索</h1>
<a class="button" href="{{ route( 'inns.create' ) }}">宿新規作成</a>
@endsection
<hr>

@section( 'tbody' )
<form action="{{ route( 'inn_search' ) }}" method="GET">
    <input  type="search" name="name" placeholder="名前" value="{{ old('name') }}">
    <button type="submit"></button>
</form>
@foreach ($inns as $inn)
    <div>
        <p>This is inn {{ $inn->name }}</p>
        <div class="uk-flex">
            <a href="{{ route( 'inns.edit', $inn ) }}">情報を変更する</a>
            <a href="" onclick="deleteInn({{ $inn->id }})">削除する</a>
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
