@extends('common.layout')

@section('header')
<a class="uk-button uk-button-default" type="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a>
<h1 class="uk-heading">会員検索</h1>
<hr>
@endsection

@section('tbody')
<form class="uk-search uk-search-default" action="{{ route( 'user_search' ) }}" method="GET">
    @csrf
    <input class="uk-search-input" type="search" name="name" placeholder="名前" value="{{ old('name') }}">
    {{-- <a href="" class="uk-search-icon-flip" uk-search-icon></a> --}}
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>

<div>
    @if( isset( $users ) )
    @foreach ( $users as $user )
        <div class="uk-margin uk-animation-slide-bottom-small">
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->email }}</p>
            <div class="uk-flex">
                <a class="uk-margin-left" href="{{ route( 'users.edit', $user->id ) }}">情報を変更する</a>
                <a class="uk-margin-left" href="" onclick="deleteUser()">削除する</a>
                <form action="{{ route( 'users.destroy', $user->id ) }}" method="POST" id="delete-form">
                    @csrf
                    @method( 'delete' )
                </form>
                <script type="text/javascript">
                    function deleteUser(){
                        event.preventDefault();
                        if( window.confirm( '本当に削除しますか？' ) ){
                            document.getElementById( 'delete-form' ).submit();
                        }
                    }
                </script>
            </div>
        </div>
    @endforeach
    @endif    
</div>

@endsection