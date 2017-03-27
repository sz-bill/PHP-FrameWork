@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>分类目录</span>
                        <button><span><a href="{{ url('admin/category') }}">列表</a></span></button>
                        <button><span><a href="{{ url('admin/category/add') }}">添加</a></span></button>
                        <button><span><a href="{{ url('admin/category/del') }}">删除</a></span></button>
                    </div>

                    <div class="panel-body">
                        <table width="100%" border="0">
                            <thead>
                            <tr>
                                <td class="text-center">编码</td>
                                <td class="text-center">标题</td>
                                <td class="text-center">副标题</td>
                                <td class="text-center">状态</td>
                                <td class="text-center">上级目录</td>
                                <td class="text-center">创建时间</td>
                                <td class="text-center">更新时间</td>
                                <td class="text-center">操作</td>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td class="text-center">编码</td>
                                <td class="text-center">标题</td>
                                <td class="text-center">副标题</td>
                                <td class="text-center">状态</td>
                                <td class="text-center">上级目录</td>
                                <td class="text-center">创建时间</td>
                                <td class="text-center">更新时间</td>
                                <td class="text-center">操作</td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($collection as $key => $item)
                            <tr class="@if($key%2 == 0) even @endif">
                                <td class="text-center">{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->subTitle}}</td>
                                <td class="text-center">{{$item->status}}</td>
                                <td class="text-center">{{$item->level}}</td>
                                <td class="text-center">{{$item->created_at}}</td>
                                <td class="text-center">{{$item->updated_at}}</td>
                                <td class="text-center">
                                    <button><span>编辑</span></button>
                                    <button><span>删除</span></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
