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
    </div>
</form>

<div class="inn_card_container">
@if( isset( $inns ) )
    @foreach ($inns as $inn)
        <div class="inn_card">
            <div id="inn_name"><p>This is inn {{ $inn->name }}</p></div>
            <div class="inn_card_left"> icon </div>
            <div class="inn_card_right">
                <div class="inn_card_font">
                    <p>
                        住所 東京都 〇〇区123-5678 {{ $inn->address }}
                    </p>
                    <p>
                        部屋数 100部屋 {{ $inn->rooms }}
                    </p>
                    <p>
                        チェックイン時間  ○○：○○ - ○○：○○ {{ $inn->checkin }}
                    </p>
                    <p>
                        チェックイン時間  ○○：○○ - ○○：○○ {{ $inn->checkout }}
                    </p>
                    

                        <div class="btns">
                            <a class="btn_inns_search" href="{{ route( 'inns.edit', $inn ) }}">情報を変更する</a>
                            <a class="btn_inns_search" href="" onclick="deleteInn({{ $inn->id }})">削除する</a>
                        </div>
                </div>

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
</div>
@endif
@endsection
