@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>分类目录</span>
                        <button><span><a href="{{ url('admin/category') }}">列表</a></span></button>
                        <button><span><a href="{{ url('admin/catalog/add') }}">添加</a></span></button>
                        <button><span><a href="{{ url('admin/catalog/del') }}">删除</a></span></button>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('admin/category/add') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">状态</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="status">
                                        <option value="1">启用</option>
                                        <option value="0">禁用</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('visibility') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">是否可见</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="visibility">
                                        <option value="1">可见</option>
                                        <option value="0">隐藏</option>
                                    </select>

                                    @if ($errors->has('visibility'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">根目录</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="level">
                                        <option value="0">网站根目录</option>
                                    </select>

                                    @if ($errors->has('level'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">分类名称</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">分类副标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sub_title" value="">

                                    @if ($errors->has('sub_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">图片广告</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="image" >

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">分类简介</label>
                                <div class="col-md-6">
                                    <textarea class="form-control short_description" name="short_description">分类简介</textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">分类描述</label>
                                <div class="col-md-6">
                                    <textarea class="form-control description" name="description">分类描述</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save-in"></i>保存分类
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
