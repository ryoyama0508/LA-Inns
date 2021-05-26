@extends( 'common.layout' )

@section( 'header' )
<div class="title_bar">
    <h1 id="home" class="title"><span>プラン追加

    </span></h1>
    <div class="title_link"><a id="back_home" class="button" href="{{ route( 'plans.index' ) }}">新規作成画面に戻る</a>
</div>

@endsection

@section( 'tbody' )
<div class="search_result">
    <form action="{{ route('append') }}" id="my_form" onsubmit="return validateForm()" method="POST">
        @csrf
        <div>
            <div id="search_result_label">
            <label for="name">プラン名
            <input id="search_result_bar" type="text" name="name"></label>
            </div>

            <div id="search_result_label">
            <label for="name">内容
            <input id="search_result_bar" type="text" name="content"></label>
            </div>

            <div id="search_result_label">
            <label for="name">値段
            <input id="search_result_bar" type="text" name="price"></label>
            </div>
        </div>

        @foreach ($plans as $plan)
        <input type="hidden" name="plans[]" value="{{ $plan }}">    
        @endforeach
        
        <div class="inn_edit_btn"><button id="inn_edit_btn"  type="submit">追加</button></div>
    </form>

    <script>
        function validateForm() {
            var name = document.forms["my_form"]["name"].value;
            
            if (name == "") {
                alert("プラン名を入力してください");
                return false;
            }

            var content = document.forms["my_form"]["content"].value;
            if (content == "") {
                alert("内容を入力してください");
                return false;
            }

            var price = document.forms["my_form"]["price"].value;
            if (price == "") {
                alert("値段を入力してください");
                return false;
            }else{
                if (!Number.isInteger(price)){
                alert("価格は整数で入力してください");
                return false;
                }
            }
        }
    </script>
</div>
@endsection