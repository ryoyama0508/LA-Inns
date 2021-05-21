@extends( 'common.layout' )

@section( 'header' )
<div>
    <a class="uk-button uk-button-default" type="button" href="{{ route( 'inns.index' ) }}">宿検索に戻る</a>
</div>
<div>
    <h1>宿新規登録</h1>
</div>
<div></div>
@endsection
<hr>

@section( 'tbody' )
<div class="uk-flex">
    <div class="uk-container uk-margin-remove-right">
        <span></span>
    </div>  
    <div class="uk-container uk-margin-remove-left">
        <form action="{{ route( 'inn_create_confirm' ) }}" method="POST">
            @csrf
            <div class="uk-margin-top">
                <label>宿名　<input class="uk-input" type="text" name="name"></label>
            </div>
            <div class="uk-margin-top">
                <label>住所　<input class="uk-input" type="text" name="address"></label>
            </div>
            <div class="uk-margin-top">
                <label>部屋数　<input class="uk-input" type="text" name="rooms"></label>
            </div>
            <div class="uk-margin-top">
                <label>チェックイン時間　<input class="uk-input" type="text" name="checkin"></label>
            </div>
            <div class="uk-margin-top">
                <label>チェックアウト時間　<input class="uk-input" type="text" name="checkout"></label>
            </div>
            <div class="uk-margin-top">
                プラン
                <a class="uk-button uk-button-default" type="buttton">プラン追加</a>
            </div>
            <button class="uk-button uk-button-default uk-margin-top" type="submit">登録</button>
        </form>
    </div>
</div>
@endsection