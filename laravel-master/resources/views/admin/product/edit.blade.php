@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>编辑产品</span>
                        <button><span><a href="{{ url('admin/product') }}">列表</a></span></button>
                        <button><span><a href="{{ url('admin/product/add') }}">添加</a></span></button>
                        <button><span><a href="{{ url('admin/product/del') }}">删除</a></span></button>
                        <span>{{$product->title}}</span>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('admin/product/postEdit?id=' . $product->id) }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">状态</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="status">
                                        <option @if($product->status == 1) selected @endif value="1">启用</option>
                                        <option @if($product->status == 0) selected @endif value="0">禁用</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">产品分类</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_id">
                                        <option value="0">网站根目录</option>
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">SKU编码</label>
                                <div class="col-md-6">
                                    <input readonly="true" type="text" class="form-control" name="sku" value="{{$product->sku}}">

                                    @if ($errors->has('sku'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">主标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{$product->title}}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">副标题</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sub_title" value="{{$product->sub_title}}">

                                    @if ($errors->has('sub_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">库存数量</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="qty" value="{{$product->qty}}">

                                    @if ($errors->has('qty'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">成本</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cost" value="{{$product->cost}}">

                                    @if ($errors->has('cost'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">价格</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price" value="{{$product->price}}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('length') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">长(包装)</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="length" value="{{$product->length}}">

                                    @if ($errors->has('length'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('length') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('depth') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">宽(包装)</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="depth" value="{{$product->depth}}">

                                    @if ($errors->has('depth'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('depth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">高(包装)</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="height" value="{{$product->height}}">

                                    @if ($errors->has('height'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">重量(包装:克/g)</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="weight" value="{{$product->weight}}">

                                    @if ($errors->has('weight'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
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
                                <label class="col-md-4 control-label">产品简介</label>
                                <div class="col-md-6">
                                    <textarea class="form-control short_description" name="short_description">{{$product->short_description}}</textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">产品描述</label>
                                <div class="col-md-6">
                                    <textarea style="min-height: 200px;" class="form-control description" name="description">{{$product->description}}</textarea>
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
                                        <i class="fa fa-btn fa-save-in"></i>保存产品
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
