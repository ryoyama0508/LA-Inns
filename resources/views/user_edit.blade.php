@extends( 'common.layout' )

@section( 'header' )
<a type="button" href="{{ route( 'users.index' ) }}">戻る</a>
<h1>会員情報変更</h1>
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
            <input type="text" name="name" value="{{ $user->name }}">
        </p>
        
        <p>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" value="{{ $user->email }}">
        </p>
        
        <p>
            <label for="name">パスワード</label>
            <input  type="text" name="passwd" value="{{ $user->passwd }}">
        </p>
        <button type="submit">変更する</button>
    </form>
</div>

@endsection