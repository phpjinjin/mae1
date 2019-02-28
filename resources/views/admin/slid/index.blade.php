@extends('admin.public.ifram')

<!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="class='alert alert-success" role="lert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="class='alert alert-danger" role="lert">
                    {{ session('error') }}
                </div>
            @endif
<!-- 显示错误消息 结束 -->
<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页 <span class="c-gray en">&gt;</span> 轮播图管理管理 <span class="c-gray en">&gt;</span> 轮播列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a></nav>


<div class="page-container">
	<div class="text-c">
		<form action="/admin/slid" method="get">
			<input type="text" name="search" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
			<button type="submit" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜图片</button>
		</form>
		
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','picture-add.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加图片</a></span> <span class="r">共有数据：<strong>{{ $tiao }}</strong> 条</span> </div>
	<div class="mt-20">
		<form action="/admin/slid" method="get">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="DataTables_Table_0_length"><label>显示 
			<select name="count" aria-controls="DataTables_Table_0" class="select">
				<option value="5" @if(isset($request['count']) && $request['count'] ==5) selected @endif>5</option>
				<option value="10" @if(isset($request['count']) && $request['count'] ==10) selected @endif>10</option>
				<option value="15" @if(isset($request['count']) && $request['count'] ==15) selected @endif>15</option>
			</select> 条</label>
			</div>
			<div id="DataTables_Table_0_filter" class="dataTables_filter"><label>从当前数据中检索:<input type="text" name="search" class="input-text " aria-controls="DataTables_Table_0"></label>&nbsp;<input type="submit" class="btn btn-success" value="搜索"></div>
		</form>
		<table class="table table-border table-bordered table-bg table-hover table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row">
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 40px;" aria-label="" width="40">
					<input name="" type="checkbox" value=""></th><th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">ID</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="分类: 升序排列" width="100">图片标题</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 210px;" aria-label="封面: 升序排列" width="100">图片</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 836px;" aria-label="图片名称: 升序排列">跳转地址</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Tags: 升序排列" width="150">排序</th>
					
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 60px;" aria-label="发布状态: 升序排列" width="60">发布状态</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($slid as $k=>$v)
			<tr class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1">{{ $v->sid }}</td>
					<td>{{ $v->stitle }}</td>
					<td><a href="javascript:;" onclick="picture_edit('图库编辑','picture-show.html','10001')"><img class="picture-thumb" src="{{ asset('uploads/slid/'.$v->simg) }}" width="210"></a></td>
					<td class="text-l"><a class="maincolor" href="javascript:;" onclick="picture_edit('图库编辑','picture-show.html','10001')">{{ $v->surl }}</a></td>
					<td class="text-c">{{ $v->sort }}</td>
					
					<td class="td-status"><span class="label label-success radius">{{$v->nid==1 ? '已发布' : '未发布'}}</span></td>
					<td class="td-manage">
					<form action="/admin/slid/{{ $v->sid }}" method="post">
						<a style="text-decoration:none" onclick="picture_stop(this,'10001')" href="/admin/slid/{{ $v->sid }}" title="@if($v->nid == 1) 下架 @else 上架 @endif"><i class="Hui-iconfont">@if($v->nid == 1) &#xe6de; @else &#xe6dc; @endif</i></a>
						<a style="text-decoration:none" class="ml-5" onclick="picture_edit('图库编辑','picture-add.html','10001')" href="/admin/slid/{{$v->sid}}/edit" title="编辑"><i class="Hui-iconfont"></i></a>
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" style="background:none;border:none;" class="ml-5" onclick="active_del(this,'10001')" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
					</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div style="float:right;">{{ $slid->appends($request)->links() }}</div>
	</div>
</div>