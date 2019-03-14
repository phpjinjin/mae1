@extends('admin.public.ifram')


<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页 <span class="c-gray en">&gt;</span> 栏目管理 <span class="c-gray en">&gt;</span> 栏目列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a></nav>

	<div class="text-c">
		<form action="/admin/column" method="get">
			<input type="text" name="search" id="" placeholder="栏目标题" style="width:250px" class="input-text">
			<button type="submit" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜标题</button>
		</form>
		
	</div>
	<div class="page-container">
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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','picture-add.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加图片</a></span> <span class="r">共有数据：<strong>{{ $tiao }}</strong> 条</span> </div>
	<div class="mt-20">
		<form action="/admin/column" method="get">
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
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="分类: 升序排列" width="100">栏目标题</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 836px;" aria-label="图片名称: 升序排列">跳转地址</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Tags: 升序排列" width="150">栏目位置</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($column as $k=>$v)
			<tr class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1">{{ $v->id }}</td>
					<td>{{ $v->title }}</td>
					<td class="text-l"><a class="maincolor" href="javascript:;" onclick="picture_edit('图库编辑','picture-show.html','10001')">{{ $v->url }}</a></td>
					<td class="td-status">
						<span class="label label-success radius">
							@if($v->sort == 1)
							栏目一
							@elseif($v->sort == 2)
							栏目二
							@elseif($v->sort == 3)
							栏目三
							@else
							栏目四
							@endif
						</span>
					</td>
					<td class="td-manage">
					<form action="/admin/column/{{ $v->id }}" method="post">
						<a style="text-decoration:none" class="ml-5" onclick="edit({{$v->id}})" title="修改"><i class="Hui-iconfont"></i></a>
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" style="background:none;border:none;" class="ml-5" onclick="active_del(this,'10001')" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
					</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div style="float:right;">{{ $column->appends($request)->links() }}</div>
	</div>
</div>

<script type="text/javascript">
	function edit(id){
		layer.open({
			  type: 2,
			  title: '修改栏目',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['580px', '50%'],
			  content: '/admin/column/'+id+'/edit',
			});
		}
	var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
	parent.layer.close(index); //再执行关闭
	if(index)
	{
		window.parent.location.reload();
	}
</script>