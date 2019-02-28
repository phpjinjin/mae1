@extends('admin.public.ifram')

	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" placeholder="分类名称" value="" class="input-text" style="width:120px">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly style="width:200px">
			
			<input type="file" multiple name="file-2" class="input-file">
			</span> <span class="select-box" style="width:150px">
			<select class="select" name="brandclass" size="1">
				<option value="1" selected>国内品牌</option>
				<option value="0">国外品牌</option>
			</select>
			</span>
				<button type="button" class="btn btn-success" id="" name="" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
		</form>
	</div>
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
	<form action="/admin/cate" method="get">
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
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">商品Id</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">类别Id</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-sort="descending" aria-label="ID: 升序排列" width="70">属性值</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			
			<tr class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1"></td>
					<td class="sorting_1"></td>
					
					<td class="sorting_1"></td>
					<td class="sorting_1"></td>
					<td class="f-14 product-brand-manage">
						<form action="" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<a style="text-decoration:none" onclick="product_brand_edit('修改分类','codeing.html','1')" href="javascript:;" title="编辑"><i class="Hui-iconfont"></i></a> 
							<button type="submit" style="background:none;border:none;" class="ml-5" onclick="active_del(this,'10001')" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
						</form>
					</td>
				</tr>
			
			</tbody>
		</table>

		
		<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
			<a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">上一页</a>
			<span>
				
			</span>
				<a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">下一页</a>
		</div>
		</div>
	</div>
</div>
