@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'inns.create' ) }}">新規作成画面に戻る</a>
</div>
<div>
    <h1>プラン一覧</h1>
</div>
@endsection

@section( 'tbody' )
<a class="button" href="">追加</a>
@endsection