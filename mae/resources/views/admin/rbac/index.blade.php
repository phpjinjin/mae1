@extends('admin.public.ifram')
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;
		</span> 权限管理 
		<span class="c-gray en">&gt;
		</span> 权限列表 
	</nav>
<div id="tab" style="margin-left: 140px;margin-top: 10px;margin-bottom: 10px">
	<button class="btn btn-info">角色列表</button>
	<button class="btn btn-warning">权限节点列表</button>
</div>
<div class="tab">
	<form action="#" method="get">
		<table class="table table-hover table-bordered" style="width: 80%" align="center">
			<thead>
				<tr>
					<th>角色ID</th>
					<th>角色名称</th>
				</tr>
			</thead>
			<tbody>
				@foreach($role_data as $k=>$v)
				<tr>
					<td>{{ $v->rid }}</td>
					<td>{{ $v->rname }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</form>
</div>

<div class="tab">
	<form action="#" method="get">
		<table class="table table-hover table-bordered" style="width: 80%" align="center">
			<thead>
				<tr>
					<th>节点ID</th>
					<th>节点描述</th>
					<th>控制器名称</th>
					<th>方法名称</th>
				</tr>
			</thead>
			<tbody>
				@foreach($node_data as $k=>$v)
				<tr>
					<td>{{ $v->nid }}</td>
					<td>{{ $v->ndesc }}</td>
					<td>{{ $v->cname }}</td>
					<td>{{ $v->aname }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
	$('.tab').hide();
	$('.tab:first').show();
	$('#tab button:first').click(function(){
		$('.tab:first').show('slow');
		$('.tab:last').hide('slow');
	})
	$('#tab button:last').click(function(){
		$('.tab:first').hide('slow');
		$('.tab:last').show('slow');
	})
</script>