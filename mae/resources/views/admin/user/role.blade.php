@extends('admin.public.ifram')
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;
		</span> 权限管理 
		<span class="c-gray en">&gt;
		</span> 权限列表 
		<span class="c-gray en">&gt;
		</span> 角色 
	</nav>
<form action="/admin/user/updaterole/{{ $user->aid }}" method="post" class="form form-horizontal" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			管理员名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="auname" disabled value="{{$user->auname}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			角色名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			@foreach($role as $k=> $v)
			<input type="radio" name="power" @if( $userid->roleid == $v->rid ) checked @endif value="{{ $v->rid }}">{{ $v->rname }}
			@endforeach
		</div>
	</div>
	<div style="width: 200px; float: right; margin-right: 40%;margin-top: 10px">
		<input class="btn btn-warning " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</div>
</form>

