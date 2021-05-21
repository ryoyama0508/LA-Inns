@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'plans.index' ) }}">新規作成画面に戻る</a>
</div>
<div>
    <h1>プラン追加</h1>
</div>
@endsection

@section( 'tbody' )
<form action="{{ route('append') }}" method="POST">
    @csrf
    <p>
        <label for="name">名前</label>
        <input type="text" name="name">
    </p>

    @foreach ($plans as $plan)
    <input type="hidden" name="plans[]" value="{{ $plan }}">    
    @endforeach
    
    <button type="submit">追加する</button>
</form>
@endsection