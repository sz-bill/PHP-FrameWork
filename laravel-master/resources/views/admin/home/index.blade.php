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
                        <table width="100%" border="0">
                            <thead>
                            <tr>
                                <td class="text-center">编号</td>
                                <td class="text-center">栏目类型</td>
                                <td class="text-left">相关块内容</td>
                                <td class="text-left">排序</td>
                                <td class="text-center">状态</td>
                                <td class="text-center">创建时间</td>
                                <td class="text-center">更新时间</td>
                                <td class="text-center">操作</td>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td class="text-center">编号</td>
                                <td class="text-center">栏目类型</td>
                                <td class="text-left">相关块内容</td>
                                <td class="text-left">排序</td>
                                <td class="text-center">状态</td>
                                <td class="text-center">创建时间</td>
                                <td class="text-center">更新时间</td>
                                <td class="text-center">操作</td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($collection as $key => $item)
                            <tr data-name="product-name" data-id="{{$item->id}}" class="@if($key%2 == 0) even @endif">
                                <td class="text-center">{{$item->id}}</td>
                                <td class="text-center">{{$item->type}}</td>
                                <td class="text-center">{{$item->blocks_id}}</td>
                                <td class="text-center">{{$item->sort}}</td>
                                <td class="text-center">{{$item->status}}</td>
                                <td class="text-center">{{$item->created_at}}</td>
                                <td class="text-center">{{$item->updated_at}}</td>
                                <td class="text-center">
                                    <button data-name="rowUpdate" data-id="{{$item->id}}"><span>编辑</span></button>
                                    <button data-name="rowDelete" data-id="{{$item->id}}"><span>删除</span></button>
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

<script type="text/javascript">
    var product = {
        click:function(o){
            var dn = $(o).attr('data-name');
            var id = $(o).attr('data-id');

            if(dn == 'rowUpdate'){
                product.edit(id)
            }

            if(dn == 'rowDelete'){
                product.delete(id)
            }

        },
        edit:function(id){
            var url = '{{ url('admin/bannerManager/edit?id=') }}' + id;
            window.location.href = url;
        },
        delete:function(id){
            if(confirm("你确定要删除此记录吗？")){
                var url = '{{ url('admin/bannerManager/delete?id=') }}' + id;
                window.location.href = url;
            }
        }
    };
    jQuery(document).ready(function() {
        $("button").click(function(){
            product.click(this);
        });
    });
</script>

@endsection
