@extends('common.layout')

@section('header')
<a  type="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a>
<h1 >会員検索</h1>
<hr>
@endsection

@section('tbody')
<form  action="{{ route( 'user_search' ) }}" method="GET">
    @csrf
    <input  type="search" name="name" placeholder="名前" value="{{ old('name') }}">
    <button type="submit"></button>
</form>

<div class="user_card">
    @if( isset( $users ) )
    @foreach ( $users as $user )
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