@extends( 'common.layout' )

@section( 'header' )
<h1 class="uk-heading">宿検索</h1>
<hr>
@endsection

@section( 'tbody' )
<form class="uk-search uk-search-default" id="inn_search">
    <a href= "{{ route("inn_search")}}" uk-search-icon type="submit" method="get"></a>
    <input class="uk-search-input" type="search" placeholder="Search" name="search">
</form>
@foreach ($inns as $inn)
    <p>This is inn {{ $inn->name }}</p>
@endforeach
@endsection
