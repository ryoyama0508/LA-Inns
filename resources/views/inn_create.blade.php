@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'inns.index' ) }}">戻る</a>
</div>
<div>
    <h1>宿新規作成</h1>
</div>
@endsection


@section( 'tbody' )
<form action="{{ route( 'inns.store' ) }}">
    <p>
        <label>宿名<input type="text" name="name"></label>
    </p>
    <p>
        <label>住所<input type="text" name="address"></label>
    </p>
    <p>
        <label>部屋数<input type="text" name="rooms"></label>
    </p>
    <p>
        <label>チェックイン時間<input type="text" name="checkin"></label>
    </p>
    <p>
        <label>チェックアウト時間<input type="text" name="checkout"></label>
    </p>
    <button type="submit">登録する</button> 
</form>
@endsection