@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>プラン追加

    </span></h1>
    <div class="title_link"><a id="back_home" class="button" href="{{ route( 'plans.index' ) }}">新規作成画面に戻る</a>
</div>
<div>
    <h1>プラン追加</h1>
</div>
@endsection

@section( 'tbody' )
<form action="{{ route('append') }}" method="POST">
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
    
    <button type="submit">追加する</button>
</form>
@endsection