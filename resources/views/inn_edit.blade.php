@extends( 'common.layout' )

@section( 'header' )
<a class="uk-button uk-button-default" type="button" href="{{ route( 'inns.index' ) }}">戻る</a>
<h1 class="uk-heading">宿情報変更</h1>
<hr>
@endsection

@section( 'tbody' )
<div>
    {{-- user_icon --}}
</div>
<div>
    <form action="{{ route( 'inns.update', $inn ) }}" method="POST">
        @csrf
        @method( 'put' )
        <p>
            <label for="name">名前</label>
            <input class="uk-input uk-form-width-medium" type="text" name="name" value="{{ $inn->name }}">
        </p>
        
        <p>
            <label for="email">住所</label>
            <input class="uk-input uk-form-width-medium" type="text" name="address" value="{{ $inn->address }}">
        </p>
        
        <p>
            <label for="name">部屋数</label>
            <input type="number" step="1" pattern="\d+" name="rooms" value="{{ $inn->rooms }}">
        </p>
        

        <p>
            <label for="name">チェックイン</label>
            <input type="text" name="checkin_date">
        </p>
        
        <p>
            <label for="name">チェックアウト</label>
            <input type="text" name="checkout_date">
        </p>
       
        <button type="submit" class="uk-button uk-button-default">変更する</button>
    </form>
</div>

@endsection