@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'inns.index' ) }}">宿検索に戻る</a>
</div>
<div>
    <h1>宿新規登録</h1>
</div>
<div></div>
@endsection
<hr>

@section( 'tbody' )
<div>  
    <div>
        <form action="{{ route( 'inns.store' ) }}" method="POST">
            @csrf
            <div>
                <label>宿名　<input class="uk-input" type="text" name="name"></label>
            </div>
            <div>
                <label>住所　<input class="uk-input" type="text" name="address"></label>
            </div>
            <div>
                <label>部屋数　<input class="uk-input" type="text" name="rooms"></label>
            </div>
            <div>
                <label>チェックイン時間　<input class="uk-input" type="text" name="checkin"></label>
            </div>
            <div>
                <label>チェックアウト時間　<input class="uk-input" type="text" name="checkout"></label>
            </div>
            <div>
                プラン<a class="button" href="{{ route( 'plans.index' ) }}">プラン追加</a>
            </div>
            <div>
                画像<input id="image" type="file" name="pic_path">
            </div>
            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection