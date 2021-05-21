<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config( 'app.name' ) }}</title>
    
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

</head>
<body>
    <div class="uk-margin uk-child-width-expand@s" uk-grid> 
        @yield( 'header' )
    </div>

    <div class="uk-margin">
        @yield( 'tbody' ) 
    </div> 
</body>

</html>