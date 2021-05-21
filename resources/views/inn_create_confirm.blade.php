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

@section( 'tbody' )
<div class="uk-flex">
    <div class="uk-container uk-margin-remove-right">
        <span></span>
    </div>  
    <div class="uk-container uk-margin-remove-left">
        <form action="{{ route( 'inns.store' ) }}" method="POST">
            @csrf
            <div class="uk-margin-top">
                <label>宿名　<input class="uk-input" type="hidden" name="name" value="{{ $inn->name }}">{{ $inn->name }}</label>
            </div>
            <div class="uk-margin-top">
                <label>住所　<input class="uk-input" type="hidden" name="address" value="{{ $inn->address }}">{{ $inn->address }}</label>
            </div>
            <div class="uk-margin-top">
                <label>部屋数　<input class="uk-input" type="hidden" name="rooms" value="{{ $inn->rooms }}">{{ $inn->rooms }}</label>
            </div>
            <div class="uk-margin-top">
                <label>チェックイン時間　<input class="uk-input" type="hidden" name="checkin" value="{{ $inn->checkin }}">{{ $inn->checkin }}</label>
            </div>
            <div class="uk-margin-top">
                <label>チェックアウト時間　<input class="uk-input" type="hidden" name="checkout" value="{{ $inn->checkout }}">{{ $inn->checkout }}</label>
            </div>
            <button class="uk-button uk-button-default uk-margin-top" type="submit">登録</button>
        </form>
    </div>
</div>
@endsection