@extends('admin.public.ifram')
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;
	</span> 权限管理 
	<span class="c-gray en">&gt;
	</span> 添加权限节点
</nav>
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
	</div>
@endif
<form action="/admin/rbac/roles/insert" method="post" class="form form-horizontal" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			节点描述：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="ndesc" value="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			控制器名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="cname" value="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			方法名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="aname" value="">
		</div>
	</div>
	<div style="width: 200px; float: right; margin-right: 40%;margin-top: 10px">
		<input class="btn btn-warning " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</div>
</form>