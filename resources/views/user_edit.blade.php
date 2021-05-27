@extends( 'common.layout' )

@section('header')
<div class="title_bar">
    <h1 id="home" class="title"><span>会員情報変更
    
    </span></h1>
    <div class="title_link"><a id="back_home" type="button" href="{{ route( 'users.index' ) }}">戻る</a></div>
</div>



@endsection
<hr>

@section( 'tbody' )
<div>
    {{-- user_icon --}}
</div>
<div class="search_result">
    <form action="{{ route( 'users.update', $user->id ) }}" method="POST">
        @csrf
        @method( 'put' )
        <p id="search_result_label">
            <label for="name">名前</label>
            <input id="search_result_bar" type="text" name="name" value="{{ $user->name }}">
            @if(isset($errors))
                <p style="color: red;">{{ $errors->first('name') }}</p>
            @endif
        </p>
        
        <p id="search_result_label">
            <label for="email">メールアドレス</label>
            <input id="search_result_bar" type="text" name="email" value="{{ $user->email }}">
            @if(isset($errors))
                <p style="color: red;">{{ $errors->first('email') }}</p>
            @endif
        </p>
        
        <div class="edit_btn"><button id="edit_btn" type="submit">変更する</button></div>
    </form>
</div>

@endsection