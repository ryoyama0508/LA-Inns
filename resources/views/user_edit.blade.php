@extends( 'common.layout' )

@section( 'header' )
<a class="uk-button uk-button-default" type="button" href="{{ route( 'users.index' ) }}">戻る</a>
<h1 class="uk-heading">会員情報変更</h1>
<hr>
@endsection

@section( 'tbody' )
<div>
    {{-- user_icon --}}
</div>
<div>
    <form action="{{ route( 'users.update', $user->id ) }}" method="POST">
        @csrf
        @method( 'put' )
        <p>
            <label for="name">名前</label>
            <input class="uk-input uk-form-width-medium" type="text" name="name" value="{{ $user->name }}">
        </p>
        
        <p>
            <label for="email">メールアドレス</label>
            <input class="uk-input uk-form-width-medium" type="text" name="email" value="{{ $user->email }}">
        </p>
        
        <p>
            <label for="name">パスワード</label>
            <input class="uk-input uk-form-width-medium" type="text" name="passwd" value="{{ $user->passwd }}">
        </p>
        <button type="submit" class="uk-button uk-button-default">変更する</button>
    </form>
</div>

@endsection