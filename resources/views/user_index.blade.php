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
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>

<div>
    @if( isset( $users ) )
    @foreach ( $users as $user )
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
            <p>username {{ $user->name }}</p>
            <div class="uk-flex">
                <a class="uk-margin-left" href="{{ route( 'users.edit', $user->id ) }}">情報を変更する</a>
                <a class="uk-margin-left" href="" onclick="deleteUser({{ $user->id }})">削除する</a>
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