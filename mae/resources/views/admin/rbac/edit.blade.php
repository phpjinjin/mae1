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
			<b>管理员管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'管理员')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>权限管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'权限')>0 || substr_count($v->ndesc,'角色')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>用户管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'用户')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>文章管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'文章')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>类别管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'类别')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>属性管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'属性')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>商品管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'商品')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>广告管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'广告')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>订单管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'订单')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>轮播图管理: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'轮播图')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>栏目管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'栏目')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>友情链接管理: &nbsp;&nbsp;&nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'友情')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
			<b>网站管理: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</b>
			@foreach($nodes as $k=> $v)
				@if(substr_count($v->ndesc,'网站')>0)
					<input type="checkbox" name="nids[]" @if(in_array($v->nid,$nid)) checked @endif value="{{ $v->nid }}"> {{ $v->ndesc }} &nbsp;&nbsp;
				@endif
			@endforeach
			<br>
		</div>
	</div>
	<div style="width: 200px; float: right; margin-right: 40%;margin-top: 10px">
		<input class="btn btn-warning " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</div>
</form>

