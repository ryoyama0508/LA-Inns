@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'inns.index' ) }}">宿検索画面に戻る</a>
</div>
<div>
    <h1>プラン追加</h1>
</div>
@endsection

@section( 'tbody' )
<form action="{{ route('append_from_edit_inn') }}" method="POST">
    @csrf
    <div>
        <div>
        <label for="name">プラン名
        <input type="text" name="name"></label>
        </div>

        <div>
        <label for="name">内容
        <input type="text" name="content"></label>
        </div>

        <div>
        <label for="name">値段
        <input type="text" name="price"></label>
        </div>
    </div>

    @foreach ($plans as $plan)
    <input type="hidden" name="plans[]" value="{{ $plan }}">
    @endforeach
    <input type="hidden" name="inn" value="{{ $inn }}">

    <button type="submit">追加する</button>
</form>
@endsection