@extends('admin.public.ifram')
<style type="text/css">
	#lang{
		width:50px;
		overflow: hidden;
	    text-overflow: ellipsis;
	    white-space:nowrap;
	    text-align:center;
	}

</style>
	<div class="page-container">
	<!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="btn btn-primary btn-lg btn-block">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="btn btn-default btn-lg btn-block">
                    {{ session('error') }}
                </div>
            @endif
<!-- 显示错误消息 结束 -->
<div class="mt-20">
	<form action="/admin/goodval" method="get" style="width:100%;">
		<div id="DataTables_Table_0_wrapper" style="width:100%;" class="dataTables_wrapper no-footer" ><div class="dataTables_length" id="DataTables_Table_0_length"><label>显示
			<select name="count" aria-controls="DataTables_Table_0" class="select">
				<option value="5" @if(isset($request['count']) && $request['count'] ==5) selected @endif>5</option>
				<option value="10" @if(isset($request['count']) && $request['count'] ==10) selected @endif>10</option>
				<option value="15" @if(isset($request['count']) && $request['count'] ==15) selected @endif>15</option>
			</select> 条</label></div>
			<div id="DataTables_Table_0_filter" class="dataTables_filter">
			<label>从当前数据中检索:
				<input type="text" name="search" class="input-text" aria-controls="DataTables_Table_0">
				<input type="submit" class="btn btn-success" value="搜索">
			</label>
		</div>
	</form>
		<table class="table table-border table-bordered table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 25px;" aria-label="" width="25"><input type="checkbox" name="" value=""></th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">属性ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">商品名称</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">商品花材</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">包装</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">花语</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($goodval_data as $k=>$v)
			<tr id="tr{{ $v->vid }}" class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1">{{ $v->vid }}</td>
					<td class="sorting_1">{{ $v->gid }}</td>
					
					<td class="sorting_1">{{ $v->wood }}</td>
					<td class="sorting_1">{{ $v->pack }}</td>
					<td class="sorting_1" style="width:60px;"><div id="lang" title="{{ $v->lang }}">{{ $v->lang }}</div></td>
					<td class="f-14 product-brand-manage">
						
						<form action="/admin/goodval/{{ $v->vid }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="hidden" name="vid" value="{{ $v->vid }}">
							<a style="text-decoration:none" href="javascript:;" onclick="shows({{ $v->vid }})" title="查看详情"><i class="Hui-iconfont">&#xe69c;</i></a>
							<a style="text-decoration:none" href="javascript:;" onclick="edit({{ $v->vid }})" title="编辑"><i class="Hui-iconfont"></i></a>
							<!-- <a style="text-decoration:none" href="javascript:;" onclick="dele({{ $v->vid }})" title="删除"><i class="Hui-iconfont"></i></a> -->
							<!-- <button type="submit" style="background:none;border:none;" class="ml-5" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp; -->
						</form>

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		
		
		</div>
		<div style="float:right;">{{ $goodval_data->appends($request)->links() }}</div>
	</div>
</div>

<script type="text/javascript">
		function shows(id){
		layer.open({
			  type: 2,
			  title: '详细信息',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['580px', '50%'],
			  content: '/admin/goodval/'+id,
			});
		}
		
		function edit(id){
		layer.open({
			  type: 2,
			  title: '修改属性',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['580px', '50%'],
			  content: '/admin/goodval/'+id+'/edit',
			});
		}
		

		var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		parent.layer.close(index); //再执行关闭
		if(index)
		{
			window.parent.location.reload();
		}
</script>