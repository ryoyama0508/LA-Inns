@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">宿検索</h1>
<hr>
@endsection

@section( 'tbody' )
<form class="uk-search uk-search-default" id="inn_search">
    <span class="uk-search-icon-flip" uk-search-icon></span>
    <input class="uk-search-input" type="search" placeholder="Search">
</form>
@endsection
