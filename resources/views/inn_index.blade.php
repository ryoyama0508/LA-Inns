@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">宿検索</h1>
<hr>
@endsection

@section( 'tbody' )
<form class="uk-search uk-search-default" action="{{ route( 'inn_search' ) }}" method="GET">
    <input class="uk-search-input" type="search" name="name" placeholder="名前">
    <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
</form>
@foreach ($inns as $inn)
    <p>This is inn {{ $inn->name }}</p>
@endforeach
@endsection
