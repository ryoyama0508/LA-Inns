@extends( 'common.layout' )

@section( 'header' )
<div class="uk-margin-small-left uk-margin-small-top uk-margin-remove-right uk-text-left">
    <a class="uk-button uk-button-default" href="{{  }}">戻る</a>
</div>
<div>
    <h1 class="uk-heading">宿検索</h1>
</div>
<div>

</div>
@endsection
<hr>

@section( 'tbody' )
<form class="uk-search uk-search-default" id="inn_search">
    <a href= "{{ route("inn_search")}}" uk-search-icon type="submit" method="get"></a>
    <input class="uk-search-input" type="search" placeholder="Search" name="search">
</form>
@foreach ($inns as $inn)
    <p>This is inn {{ $inn->name }}</p>
@endforeach
@endsection
