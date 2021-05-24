@extends( 'common.layout' )

@section( 'header' )
<div>
    <form action="{{ route('back_to_inn_from_plan') }}" method="POST" id="my_form">
        @csrf
        
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}">    
        @endforeach
        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">新規作成画面に戻る</a>
    </form>
</div>
<div>
    <h1>プラン一覧</h1>
</div>
@endsection

@section( 'tbody' )

@foreach ($plans as $plan)
    <p>プラン名:{{ $plan->contents }}</p>
    <p>プラン名:{{ $plan->price }}</p>  
@endforeach


<form action="{{ route('createOnePlan') }}" method="POST">
    @csrf
    
    @foreach ($plans as $plan)
        <input type="hidden" name="plans[]" value="{{ $plan }}">    
    @endforeach
    <input type="submit" value="追加">
</form>
@endsection