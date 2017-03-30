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
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>





                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('admin') }}">
                    网站LOGO图片
                </a>
                <a class="navbar-brand" href="{{ url('admin/ManageHome') }}">首页内容管理</a>
                <a class="navbar-brand" href="{{ url('admin/category') }}">分类管理</a>
                <a class="navbar-brand" href="{{ url('admin/product') }}">产品管理</a>
                <a class="navbar-brand" href="{{ url('admin/bannerManager') }}">广告图管理</a>


            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/admin') }}">后台首页</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('admin')->user())
                        <li><a href="{{ url('admin/login') }}">后台登录</a></li>
                        <li><a href="{{ url('admin/register') }}">注册后台帐号</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出系统管理</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


</body>
</html>
