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

@foreach ($plans as $plan)
    <p>{{ $plan }}</p>    
@endforeach


<form action="{{ route('createOnePlan') }}" method="POST">
    @csrf
    
    @foreach ($plans as $plan)
        <input type="hidden" name="plans[]" value="{{ $plan }}">    
    @endforeach
    <input type="submit" value="追加">
</form>
@endsection