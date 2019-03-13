@extends('admin.public.ifram')
	<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
    <script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
    <script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
    @if (session('success'))
        <script type="text/javascript">
            layer.msg(' 操作成功',{icon:1});
        </script>
    @endif


    @if (session('error'))
        <script type="text/javascript">
            layer.msg(' 操作失败',{icon:2});
        </script>
    @endif
    <div class="page-container" style="float:left;width:100%;">
        <form action="/admin/link" method="get">
        
            <input type="text" name="search" value="{{ $request['search'] or '' }}" placeholder=" 请输入广告标题" style="width:250px;margin-left:40%" class="input-text" >
            <button type="submit" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜索 </button>
        </form>
    </div>

    <div class="cl pd-5 bg-1 bk-gray mt-20"> 
        <span class="l"> 
    </span>
     <span class="r">共有数据:
        <strong>{{ $count }}</strong> 条
     </span> 
    </div>
    
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
                <tr class="text-c">
                    <th width="100">链接名称</th>
                    <th width="100">链接图片</th>
                    <th width="50">链接地址</th>
                    <th width="200">操作</th>
                </tr>
            </thead>
            <tbody>
                  @foreach($data as $k=>$v)
                  <tr class="text-c">
                    <td>{{$v->lname}}</td>
                    <td>
                      <a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">
                        <img width="130" class="img-thumbnail" src="{{ asset( 'uploads/link/'.$v->limg) }}"></a>
                    </td>
                    <td class="text-l">{{ $v->lurl }}</td>
                    <td class="td-manage">
                    <form action="/admin/link/{{ $v->lid }}" method="post">
                        <!-- 修改操作 -->
                        {{ csrf_field() }}
                        <a style="text-decoration:none" class="ml-5" onclick="picture_edit('图库编辑','picture-add.html','10001')" href="/admin/link/{{ $v->lid }}/edit" title="修改">
                            <i class="Hui-iconfont"></i>
                        </a>
                        <!-- 删除操作 -->
                            
                        {{ method_field('DELETE') }}
                        <button type="submit" style="background:none;border:none;" class="ml-5">
                            <a href="/admin/link/{{ $v->lid }}" style="text-decoration:none" class="ml-5">
                                <i class="Hui-iconfont" title="删除"></i>
                            </a>
                        </button>
                    </form>
                    </td>
                  </tr>
                </tbody>
                @endforeach
                
        </table>
        
    </div>
    <div style="float:right;top:1px;">{{ $data->appends($request)->links() }}</div>

