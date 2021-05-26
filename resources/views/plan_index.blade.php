@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>プラン一覧
    </span></h1>

    <form action="{{ route('back_to_inn_from_plan') }}" method="POST" id="my_form">
        @csrf
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}" id="{{ $plan->name }}form">
        @endforeach
        <div class="create_plan"><button id="back_home" class="button" type="submit">プランを確定</a></div>
    </form>
</div>
@endsection

@section( 'tbody' )

<div class="user_card_container">
    @foreach ($plans as $plan)
    <div id="plan_cards">
        <div id="{{ $plan->name }}card">
        <p>プラン名:{{ $plan->name }}</p>
        <p>内容:{{ $plan->content }}</p>
        <p>値段:{{ $plan->price }}</p>
        <input type="button" onclick="deletePlan( '{{ $plan->name }}' )" value="削除する">
        </div>
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

    <form action="{{ route('create_plan') }}" method="POST">
        @csrf
        
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}">    
        @endforeach
        <div class="inn_edit_btn1"><input id="inn_edit_btn1" type="submit" value="プラン新規作成"></div>
    </form>
</div>
@endsection