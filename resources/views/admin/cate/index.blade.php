@extends('admin.public.ifram')

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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>{{ $tiao }}</strong> 条</span> </div>
<div class="mt-20">
	<form action="/admin/cate" method="get">
		<div id="DataTables_Table_0_wrapper" style="width:100%;" class="dataTables_wrapper no-footer" ><div class="dataTables_length" id="DataTables_Table_0_length"><label>显示
			<select name="count" aria-controls="DataTables_Table_0" class="select">
				<option value="5" @if(isset($request['count']) && $request['count'] ==5) selected @endif>5</option>
				<option value="10" @if(isset($request['count']) && $request['count'] ==10) selected @endif>10</option>
				<option value="15" @if(isset($request['count']) && $request['count'] ==15) selected @endif>15</option>
			</select> 条</label></div>
			<div id="DataTables_Table_0_filter" class="dataTables_filter">
			<label>从当前数据中检索:

				<input type="text" name="search" value="{{ $request['search'] or '' }}" class="input-text" aria-controls="DataTables_Table_0">
				<input type="submit" class="btn btn-success" value="搜索">
			</label>
		</div>
	</form>
		<table class="table table-border table-bordered table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 25px;" aria-label="" width="25"><input type="checkbox" name="" value=""></th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">分类名称</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">所属分类ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">分类路径</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">分类状态</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>

				</tr>
			</thead>
			<tbody>
			@foreach($cate_data as $k=>$v)
			<tr class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1">{{ $v->ggid }}</td>
					<td class="sorting_1">{{ $v->gtname }}</td>
					<td class="sorting_1">{{ $v->pid }}</td>
					<td class="sorting_1">{{ $v->path }}</td>
					<td class="sorting_1">
					{{ $v->status ? '激活' : '未激活' }}
					</td>
					<td class="f-14 product-brand-manage">
						<form action="/admin/cate/{{ $v->ggid }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<a style="text-decoration:none" onclick="product_brand_edit('修改分类','codeing.html','1')" href="javascript:;" title="编辑"><i class="Hui-iconfont"></i></a> 
							<button type="submit" style="background:none;border:none;" class="ml-5" onclick="active_del(this,'10001')" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
							<a style="text-decoration:none" onclick="product_brand_edit('添加子分类','codeing.html','1')" href="/admin/cate/create/{{ $v->ggid }}" title="添加子分类"><i class="Hui-iconfont">&#xe61f;</i></a> 
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
		<div style="float:right;">{{ $cate_data->appends($request)->links() }}</div>
	</div>
</div>

