@extends('admin.public.ifram')


<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a></nav>

	<div class="text-c">
		<form action="/admin/goods" method="get">
			<input type="text" name="search" id="" placeholder=" 商品名称" style="width:250px" class="input-text">
			<button type="submit" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜商品</button>
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
		<form action="/admin/goods" method="get">
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
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="分类: 升序排列" width="100">商品名称</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="分类: 升序排列" width="100">所属类别</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 210px;" aria-label="封面: 升序排列" width="100">商品价格</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 836px;" aria-label="图片名称: 升序排列">商品图片</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Tags: 升序排列" width="150">商品颜色</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Tags: 升序排列" width="150">库存数量</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Tags: 升序排列" width="150">销量</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="操作" width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($goods as $k=>$v)
			<tr id="tr{{ $v->gid }}" class="text-c odd" role="row">
					<td><input name="" type="checkbox" value=""></td>
					<td class="sorting_1">{{ $v->gid }}</td>
					<td style="width:20px">{{ $v->gname }}</td>
					<td>{{ $v->goodstype->gtname }}</td>
					<td>{{ $v->price }} ¥</td>
					<td><a href="javascript:;" onclick="picture_edit('图库编辑','picture-show.html','10001')"><img class="img-thumbnail" src="{{ asset('uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="77" height="77"></a></td>
					<td class="text-c">{{ $v->color }}</td>
					<td class="text-c">{{ $v->stock }}</td>
					<td class="text-c">{{ $v->salecnt }}</td>
					<td class="td-manage">
					<form action="/admin/goods/{{ $v->gid }}" method="post">
						<a style="text-decoration:none" href="javascript:;" onclick="shows({{ $v->gid }})" title="查看详情"><i class="Hui-iconfont">&#xe69c;</i></a>
						<a style="text-decoration:none" class="ml-5" onclick="picture_edit('图库编辑','picture-add.html','10001')" href="/admin/goods/{{$v->gid}}/edit" title="修改"><i class="Hui-iconfont"></i></a>
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<a style="text-decoration:none" href="javascript:;" onclick="dele({{ $v->gid }})" title="删除"><i class="Hui-iconfont"></i></a>

					</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div style="float:right;">{{ $goods->appends($request)->links() }}</div>
		
	</div>
</div>




<script type="text/javascript">
		function shows(id){
		layer.open({
			  type: 2,
			  title: '商品详情',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['680px', '60%'],
			  content: '/admin/goods/'+id,
			});
		}
		var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		parent.layer.close(index); //再执行关闭
		if(index)
		{
			window.parent.location.reload();
		}

		function dele(id){
			layer.confirm('确认删除吗？', {
			  btn: ['确认','取消'] //按钮
			},function(){
				var url = '/admin/goods/dele/'+id;
			  	$.get(url , function(res){
					if(res) {
						layer.msg('删除成功',{icon: 1});
						$('#tr'+id).remove();
					} else {
						layer.msg('删除失败',{icon: 1});
					}
				});
			});

		}
			
</script>