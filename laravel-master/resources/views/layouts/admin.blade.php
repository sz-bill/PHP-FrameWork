<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css -->
    <link href="{{SKIN_CSS_ADMIN}}font-awesome.min.css" rel='stylesheet' type='text/css'>


    <!-- Styles -->
    <link href="{{SKIN_CSS_ADMIN}}bootstrap.min.css" rel="stylesheet">
    <link href="{{SKIN_CSS_ADMIN}}c.css" rel="stylesheet">
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<!-- JavaScripts -->
    <script src="{{SKIN_JS_ADMIN}}/jquery.min.js"></script>
    <script src="{{SKIN_JS_ADMIN}}bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="/skin/ckeditor/ckeditor.js"></script>
    <script src="/skin/ckeditor/config.js"></script>

</head>
<body id="app-layout">
@yield('content')
</body>
</html>
