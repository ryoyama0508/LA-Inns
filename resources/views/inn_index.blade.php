@extends( 'common.layout' )

@section( 'header' )

<div class="title_bar">
    <h1  id="home" class="title"><span>宿検索</span></h1>

    <div class="title_link"><a id="back_home" class="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a></div>
    <div class="title_link"><a  id="create_inns_button" href="{{ route( 'inns.create' ) }}">宿新規作成</a></div>
<div>
 

@endsection
<hr>
@section( 'tbody' )

<form  action="{{ route( 'inn_search' ) }}" method="GET">
    <div class="search_area">
        <input id="search_bar" type="search" name="name" placeholder="名前" value="{{ old('name') }}">
        <button id="search_button"type="submit">検索</button>
    <div>
</form>

@foreach ($inns as $inn)
    <div>
        <p>This is inn {{ $inn->name }}</p>
        <div class=>
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
