@extends( 'common.layout' )

@section( 'header' )
<div>
    <a href="{{ route( 'inns.index' ) }}">宿検索に戻る</a>
</div>
<div>
    <h1>宿新規登録</h1>
</div>
<div></div>
@endsection
<hr>

@section( 'tbody' )
<div>  
    <div>
        <form action="{{ route( 'inns.store' ) }}" method="POST">
            @csrf
            <div>
                <label>宿名　<input class="uk-input" type="text" name="name" value="{{ old('name') }}"></label>
            </div>
            <div>
                <label>住所　<input class="uk-input" type="text" name="address" value="{{ old('address') }}"></label>
            </div>
            <div>
                <label>部屋数　<input class="uk-input" type="text" name="rooms" value="{{ old('rooms') }}"></label>
            </div>
            <div>
                <label>チェックイン時間　<input class="uk-input" type="text" name="checkin" value="{{ old('checkin') }}"></label>
            </div>
            <div>
                <label>チェックアウト時間　<input class="uk-input" type="text" name="checkout" value="{{ old('checkout') }}"></label>
            </div>
            <div>
                プラン
                @if (isset($plans))
                    @foreach ($plans as $plan)
                    <?php $assocArrayPlan = json_decode($plan, true); ?>
                    <p>プラン名：<?php echo $assocArrayPlan['name'];?></p>
                    <p>内容：<?php echo $assocArrayPlan['content'];?></p>
                    <p>値段：<?php echo $assocArrayPlan['price'];?></p>
                    <input type="hidden" name="plans[]" value="{{ $plan }}">

                    <a class="button" href="{{ route( 'plans.index' ) }}">プラン追加</a>
                    @endforeach
                @endif
            </div>
            <div>
                画像<input id="image" type="file" name="pic_path" value="{{ old('pic_path') }}">
            </div>
            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection