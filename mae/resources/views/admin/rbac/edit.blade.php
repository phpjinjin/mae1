@extends('admin.public.ifram')
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;
		</span> 权限管理 
		<span class="c-gray en">&gt;
		</span> 权限列表 
		<span class="c-gray en">&gt;
		</span> 权限节点 
	</nav>
<form action="/admin/rbac/roles/{{ $role->rid }}" method="post" class="form form-horizontal" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PUT')}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			角色名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="auname" disabled value="{{$role->rname}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			权限节点：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			@foreach($nodes as $k=> $v)
			<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }}
			@endforeach
		</div>
	</div>
	<div style="width: 200px; float: right; margin-right: 40%;margin-top: 10px">
		<input class="btn btn-warning " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</div>
</form>

