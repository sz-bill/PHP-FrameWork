<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/lib/html5shiv.js"></script>
    <script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{SKIN_ADMIN}}h-ui/v1/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="{{SKIN_ADMIN}}h-ui/v1/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="{{SKIN_ADMIN}}h-ui/v1/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="{{SKIN_ADMIN}}h-ui/v1/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{SKIN_ADMIN}}h-ui/v1/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>图片列表</title>
    <!-- for index-->
    <link rel="stylesheet" href="{{SKIN_ADMIN}}h-ui/v1/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">

    <!-- for add-->
    <link href="{{SKIN_ADMIN}}h-ui/v1/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body class="pos-r">
@yield('content')

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{SKIN_ADMIN}}h-ui/v1/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->


@yield('afterContent')

</body>
</html>