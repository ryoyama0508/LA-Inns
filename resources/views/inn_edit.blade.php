@extends( 'common.layout' )

@section( 'header' )
<a class="uk-button uk-button-default" type="button" href="{{ route( 'inns.index' ) }}">戻る</a>
<h1 class="uk-heading">宿情報変更</h1>
<hr>
@endsection

@section( 'tbody' )
<div>
    {{-- user_icon --}}
</div>
<div>
    <form action="{{ route( 'inns.update', $inn ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method( 'put' )
        <p>
            <img src="{{ asset('storage/' .$inn->pic_path) }}" alt="inn picture">
        </p>

        <p>
            画像を変更する<input id="image" type="file" name="image" value="{{ old('image') }}">
        </p>
        
        <p>
            <label for="name">名前</label>
            <input class="uk-input uk-form-width-medium" type="text" name="name" value="{{ $inn->name }}">
        </p>
        
        <p>
            <label for="email">住所</label>
            <input class="uk-input uk-form-width-medium" type="text" name="address" value="{{ $inn->address }}">
        </p>
        
        <p>
            <label for="name">部屋数</label>
            <input type="number" step="1" pattern="\d+" name="rooms" value="{{ $inn->rooms }}">
        </p>
        

        <p>
            <label for="name">チェックイン</label>
            <input type="text" name="checkin_date">
        </p>
        
        <p>
            <label for="name">チェックアウト</label>
            <input type="text" name="checkout_date">
        </p>
       

        <p>
            <label for="name">プラン</label>
            <div id="plan_cards">
                @foreach ($plans as $plan)
                    <div id="{{ $plan->id }}card">
                    <p>プラン名:{{ $plan->name }}</p>
                    <p>内容:{{ $plan->content }}</p>
                    <p>値段:{{ $plan->price }}</p>
                    <input type="button" onclick="deletePlan( {{ $plan->id }} )" value="削除する">
                    </div>

                    <input type="hidden" id="{{ $plan->id }}input" name="plans[]" value="{{ $plan }}">
                @endforeach
            </div>
        </p>

        <button type="submit" class="uk-button uk-button-default">変更する</button>
    </form>

    <form action="{{ route( 'create_plan_from_edit_inn' ) }}" method="POST" id="plan_create_form">
        @csrf
        <input type="hidden" name="inn" value="{{ $inn }}">
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}">
        @endforeach
            
        <button type="submit" class="uk-button uk-button-default">プランを追加する</button>
    </form>
</div>

<script>
    function deletePlan(plan_id){
        event.preventDefault();
        if( window.confirm( '本当に削除しますか？' ) ){
            const cards = document.getElementById("plan_cards");
            let child_of_cards = document.getElementById(plan_id+"card");
            cards.removeChild(child_of_cards);

            child_of_cards_input = document.getElementById(plan_id+"input");
            cards.removeChild(child_of_cards_input);
        }
    }
</script>

@endsection