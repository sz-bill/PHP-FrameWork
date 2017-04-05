@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>首页内容管理</span>
                        <button><span><a href="{{ url('admin/ManageHome') }}">列表</a></span></button>
                        <button><span><a href="{{ url('admin/ManageHome/add') }}">添加</a></span></button>
                        <button><span><a href="{{ url('admin/ManageHome/del') }}">删除</a></span></button>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('admin/ManageHome/add') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="page_code" value="{{$page_code}}">

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">是否可用</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="status">
                                        @foreach($status as $val => $lab)
                                        <option value="{{$val}}">{{$lab}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('visibility') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">是否可见</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="visibility">
                                        @foreach($visibility as $val => $lab)
                                            <option value="{{$val}}">{{$lab}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">栏目类型</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type">
                                        @foreach($type as $val => $lab)
                                            <option value="{{$val}}">{{$lab}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">大标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="<?php echo '主标题-' . time();?>">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">副标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sub_title" value="<?php echo '图片副标题-'.date("Y-m-d H:i:s");?>">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">栏目内容1</label>
                                <div class="col-md-6">
                                    <textarea style="min-height: 200px;" class="form-control content" name="content">栏目内容</textarea>
                                </div>
                            </div>
                            <?=$ckeditor['content']?>

                            <div id="content2" class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">栏目内容2</label>
                                <div class="col-md-6">
                                    <textarea style="min-height: 200px;" class="form-control content" name="content2"></textarea>
                                </div>
                            </div>
                            <?=$ckeditor['content2']?>

                            <div id="content3" class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">栏目内容3</label>
                                <div class="col-md-6">
                                    <textarea style="min-height: 200px;" class="form-control content" name="content3"></textarea>
                                </div>
                            </div>
                            <?=$ckeditor['content3']?>

                            <div id="content4" class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">栏目内容4</label>
                                <div class="col-md-6">
                                    <textarea style="min-height: 200px;" class="form-control content" name="content4"></textarea>
                                </div>
                            </div>
                            <?=$ckeditor['content4']?>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save-in"></i>保存图片
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript">
                            var meditor ={
                                hide2:function () { $('#content2').hidden(); $('#cke_content2').hidden(); },
                                hide3:function () { $('#content3').hidden(); $('#cke_content3').hidden();  },
                                hide4:function () { $('#content4').hidden(); $('#cke_content4').hidden();  },
                                init:function () {
                                    meditor.hide2();
                                    meditor.hide3();
                                    meditor.hide4();
                                }
                            };
                            meditor.init();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
