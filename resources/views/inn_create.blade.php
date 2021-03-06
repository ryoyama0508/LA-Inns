@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>宿新規登録</span>
        <div class="title_link_left"><a id="back_home" class="button" type="button" href="{{ route( 'inns.index' ) }}">宿検索に戻る</a></div>
    </h1>
</div>

<div></div>
@endsection
<hr>

@section( 'tbody' )
<div class="search_result">
    <form action="{{ route( 'inns.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="search_result_label">
                <label>宿名　<input id="search_result_bar" type="text" name="name" value="{{ old('name') }}"></label>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div id="search_result_label">
                <label>住所　<input id="search_result_bar" type="text" name="address" value="{{ old('address') }}"></label>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div id="search_result_label">
                <label>部屋数　<input id="search_result_bar" type="text" name="rooms" value="{{ old('rooms') }}"></label>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('rooms') }}</p>
                @endif
            </div>
            <div id="search_result_label">
                <label>チェックイン時間　<input id="search_result_bar" type="text" name="checkin" value="{{ old('checkin') }}"></label>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('checkin') }}</p>
                @endif
            </div>
            <div id="search_result_label">
                <label>チェックアウト時間　<input id="search_result_bar" type="text" name="checkout" value="{{ old('checkout') }}"></label>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('checkout') }}</p>
                @endif
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
                    @endforeach
                @endif
                <div class="inn_edit_btn"><a id="inn_edit_btn" href="{{ route( 'plans.index' ) }}">プラン追加</a></div>
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('plans') }}</p>
                @endif
            </div>
            <div>
                画像<input id="image" type="file" name="image" value="{{ old('image') }}">
                @if(isset($errors))
                    <p style="color: red;">{{ $errors->first('image') }}</p>
                @endif
            </div>
            <div class="inn_edit_btn"><button id="inn_edit_btn" type="submit">登録</button></div>
    </form>

</div>
@endsection