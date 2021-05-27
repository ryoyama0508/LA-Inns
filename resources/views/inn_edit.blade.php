@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>宿情報変更

    </span></h1>
    <div class="title_link"><a id="back_home" class="button" type="button" href="{{ route( 'inns.index' ) }}">戻る</a></div>
</div>

<hr>
@endsection

@section( 'tbody' )
<div>
    {{-- user_icon --}}
</div>

<div class="search_result">
    <form action="{{ route( 'inns.update', $inn ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method( 'put' )
        <p id="search_result_label">
            <img  id="inn_img_edit" src="data:image/png;base64,{{ $inn->pic_path }}" alt="inn picture">
        </p>

        <p>
            画像を変更する<input  type="file" name="image" value="{{ old('image') }}">
        </p>
        
        <p>
            <label for="name">名前</label>
            <input id="search_result_bar" type="text" name="name" value="{{ $inn->name }}">
            @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('name') }}</p>
            @endif
        </p>
        
        <p id="search_result_label">
            <label for="address">住所</label>
            <input id="search_result_bar" type="text" name="address" value="{{ $inn->address }}">
        </p>
        
        <p id="search_result_label">
            <label for="rooms">部屋数</label>
            <input id="search_result_bar" type="number" step="1" pattern="\d+" name="rooms" value="{{ $inn->rooms }}">
            @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('rooms') }}</p>
            @endif
        </p>
        

        <p id="search_result_label">
            <label for="checkin">チェックイン</label>
            <input id="search_result_bar" type="number" name="checkin" value="{{ $inn->checkin }}">
            @if(isset($errors))
                <p style="color: red;">{{ $errors->first('checkin') }}</p>
            @endif
        </p>
        
        <p id="search_result_label">
            <label for="checkout">チェックアウト</label>
            <input id="search_result_bar" type="number" name="checkout" value="{{ $inn->checkout }}">
            @if(isset($errors))
                <p style="color: red;">{{ $errors->first('checkout') }}</p>
            @endif
        </p>
       

        <p id="search_result_label">
            <label for="name">プラン</label>
            {{-- <div id="plan_cards"> --}}
                @foreach ($plans as $plan)
                <div id="plan_cards">
                    <div id="{{ $plan->id }}card">
                    <p>プラン名:{{ $plan->name }}</p>
                    <p>内容:{{ $plan->content }}</p>
                    <p>値段:{{ $plan->price }}</p>
                    <input type="button" onclick="deletePlan( {{ $plan->id }} )" value="削除する">
                    </div>

                    <input type="hidden" id="{{ $plan->id }}input" name="plans[]" value="{{ $plan }}">
                </div>
                @endforeach
            {{-- </div> --}}
        </p>
        <div class="inn_edit_btns">
            <div class="inn_edit_btn"><button type="submit" id="inn_edit_btn">変更する</button></div>
        </div>
    </form>

    <form action="{{ route( 'create_plan_from_edit_inn' ) }}" method="POST" id="plan_create_form">
        @csrf
        <input type="hidden" name="inn" value="{{ $inn }}">
        @foreach ($plans as $plan)
            <input type="hidden" name="plans[]" value="{{ $plan }}">
        @endforeach
            
        <div class="inn_edit_btn"><button type="submit" id="inn_edit_btn">プランを追加する</button></div>
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