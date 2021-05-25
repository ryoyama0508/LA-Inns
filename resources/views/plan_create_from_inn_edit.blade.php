@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>プラン追加
    </span></h1>
    <div class="title_link"><a  id="back_home" class="button"  href="{{ route( 'inns.index' ) }}">宿検索画面に戻る</a>

</div>
@endsection

@section( 'tbody' )
<div class="search_result">
    <form action="{{ route('append_from_edit_inn') }}" method="POST">
        @csrf
        <div>
            <div id="search_result_label">
            <label for="name">プラン名
            <input id="search_result_bar" type="text" name="name"></label>
            </div>

            <div id="search_result_label">
            <label for="name">内容
            <input id="search_result_bar" type="text" name="content"></label>
            </div>

            <div id="search_result_label">
            <label for="name">値段
            <input id="search_result_bar" type="text" name="price"></label>
            </div>
        </div>

        @foreach ($plans as $plan)
        <input type="hidden" name="plans[]" value="{{ $plan }}">
        @endforeach
        <input type="hidden" name="inn" value="{{ $inn }}">

        <div class="edit_btn"><button id="edit_btn" type="submit">追加する</button></div>
    </form>
</div>
@endsection