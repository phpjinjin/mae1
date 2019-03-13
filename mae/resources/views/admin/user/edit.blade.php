@extends('admin.public.ifram')


<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="/admin/user/{{ $users->aid }}" method="post">
	{{method_field('PUT')}}
	{{csrf_field()}}
	
	<!-- 显示错误信息 -->
		@if (count($errors) > 0)
		    <div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号：</label>
		<div class="formControls col-xs-8 col-sm-7">
			<input type="text" class="input-text" value="{{$users['account']}}" placeholder="请输入您的账号" id="adminName" name="account" readonly="true">
		</div>
	</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
		<div class="formControls col-xs-8 col-sm-7">
			<input type="text" class="input-text" value="{{ $users['auname'] }}" placeholder="" id="adminName" name="auname">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-7 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" id="sex-1" @if($users['sex'] == 0) selected else '' @endif checked value="0">
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2"  @if($users['sex'] == 1) selected else '' @endif name="sex" value="1">
				<label for="sex-2">女</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2"   @if($users['sex'] == 0) selected else '' @endif name="sex" value="2">
				<label for="sex-3">保密</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系电话：</label>
		<div class="formControls col-xs-8 col-sm-7">
			<input type="text" class="input-text" value="{{ $users['phone'] }}" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-7">
			<input type="text" class="input-text" placeholder="@" name="email" id="email" value="{{ $users['email'] }}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-7"> <span class="select-box" style="width:150px;">
			<select class="select" name="power" size="1">
				<option value="0" @if($users['power'] == 0) selected else '' @endif>超级管理员</option>
				<option value="1" @if($users['power'] == 1) selected else '' @endif>总编</option>
				<option value="2" @if($users['power'] == 2) selected else '' @endif>栏目主辑</option>
				<option value="3" @if($users['power'] == 2) selected else '' @endif>栏目编辑</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/d/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/d/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/d/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/d/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/d/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/d/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/d/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">

</script> 

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

