@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>广告图片管理</span>
                        <button><span><a href="{{ url('admin/bannerManager') }}">列表</a></span></button>
                        <button><span><a href="{{ url('admin/bannerManager/add') }}">添加</a></span></button>
                        <button><span><a href="{{ url('admin/bannerManager/del') }}">删除</a></span></button>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('admin/bannerManager/add') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('page_code') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">页面位置</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="page_code">
                                        @foreach($page_code as $code => $label)
                                        <option value="{{$code}}">{{$label}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('page_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('page_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('is_more') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">是否多图</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="is_more">
                                        <option value="0">否</option>
                                        <option value="1">是</option>
                                    </select>

                                    @if ($errors->has('is_more'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('is_more') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">分组类型</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type">
                                        @foreach($type as $code => $label)
                                            <option value="{{$code}}">{{$label}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">图片标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="<?php echo '主标题-' . time();?>">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">图片副标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sub_title" value="<?php echo '图片副标题-'.date("Y-m-d H:i:s");?>">

                                    @if ($errors->has('sub_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('page_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">图片链接</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="page_url" value="{{ url('admin/product/add') . '/url/' . time() }}">

                                    @if ($errors->has('page_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('page_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">图片文件</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="image" >

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save-in"></i>保存图片
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
