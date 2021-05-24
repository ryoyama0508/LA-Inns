@extends( 'common.layout' )

@section( 'header' )
<div>
    <form action="{{ route('back_to_inn_from_plan') }}" method="POST" id="my_form">
        @csrf
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}" id="{{ $plan->name }}form">
        @endforeach
        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">新規作成画面に戻る</a>
    </form>
</div>
<div>
    <h1>プラン一覧</h1>
</div>
@endsection

@section( 'tbody' )

<div id="plan_cards">
@foreach ($plans as $plan)
    <div id="{{ $plan->name }}card">
    <p>プラン名:{{ $plan->name }}</p>
    <p>内容:{{ $plan->content }}</p>
    <p>値段:{{ $plan->price }}</p>
    <input type="button" onclick="deletePlan( '{{ $plan->name }}' )" value="削除する">
    </div>
@endforeach
</div>

<script>
    function deletePlan(id){
        event.preventDefault();
        if( window.confirm( '本当に削除しますか？' ) ){
            const cards = document.getElementById("plan_cards");
        const child_of_cards = document.getElementById(id+"card");
        cards.removeChild(child_of_cards);

        const my_form = document.getElementById("my_form");
        const child_of_my_form = document.getElementById(id+"form");
        my_form.removeChild(child_of_my_form);
        }
    }
</script>

<form action="{{ route('createOnePlan') }}" method="POST">
    @csrf
    
    @foreach ($plans as $plan)
        <input type="hidden" name="plans[]" value="{{ $plan }}">    
    @endforeach
    <input type="submit" value="追加">
</form>
@endsection