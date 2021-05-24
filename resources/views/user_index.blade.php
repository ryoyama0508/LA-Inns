@extends('common.layout')

@section('header')
<div class="title_bar">
    <h1 id="home" class="title"><span>会員検索
    
    </span></h1>
    <div class="title_link"><a id="back_home" type="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a></div>
</div>



@endsection
<hr>
@section('tbody')
<form  action="{{ route( 'user_search' ) }}" method="GET">
    @csrf
    <div class="search_area">
        <input id="search_bar" type="search" name="name" placeholder="名前" value="{{ old('name') }}">
        <button id="search_button" type="submit">検索</button>
    </div>
</form>

<div class="user_card_container">
    @if( isset( $users ) )
    @foreach ( $users as $user )
    <div class="user_card">
        <div class="user_card_left"> icon </div>
        <div class="user_card_right">
            <div class="user_card_user">username {{ $user->name }}</div>
            <div>email {{ $user->email }}</div>

            <div class="btns">
                <a href="{{ route( 'users.edit', $user->id ) }}" class="btn">情報を変更する</a>
                <a href="" onclick="deleteUser({{ $user->id }})" class="btn">削除する</a>
                <form action="{{ route( 'users.destroy', $user->id ) }}" method="POST" id="delete-form{{ $user->id }}">
                    @csrf
                    @method( 'delete' )
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <script type="text/javascript">
        function deleteUser(id){
            event.preventDefault();
            if( window.confirm( '本当に削除しますか？' ) ){
                document.getElementById( "delete-form"+String(id) ).submit();
            }
        }
    </script>
    @endif    
</div>

@endsection