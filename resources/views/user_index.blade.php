@extends('common.layout')

@section('header')
<a class="uk-button uk-button-default" type="button" href="{{ route( 'admin_home' ) }}">ホームに戻る</a>
<h1 class="uk-heading">会員検索</h1>
<hr>
@endsection

@section('tbody')
<form class="uk-search uk-search-default" action="{{ route( 'user_search' ) }}" method="GET">
    @csrf
    <input class="uk-search-input" type="search" name="name" placeholder="名前">
    {{-- <a href="" class="uk-search-icon-flip" uk-search-icon></a> --}}
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>

@if( isset( $users ) )
@foreach ( $users as $user )
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        <h3 class="uk-card-title">{{ $user->name }}</h3>
        <p>{{ $user->email }}</p>
    </div>
@endforeach
@endif

@endsection