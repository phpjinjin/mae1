@extends('admin.public.ifram')
<title>用户列表</title>
</head>
<body>
<nav class="breadcrumb">
	
	</span> 用户列表
	<span class="c-gray en">&gt;
	</span> 添加用户
	<span class="c-gray en">&gt;
	</span> 
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i>
	</a>
</nav>


<div class="page-container">
	<form class="form form-horizontal"  action="/admin/users" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
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
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户账号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('account') }}" placeholder="请输入邮箱号或者手机号" id="" name="account">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="" name="password">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>确定密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="" name="repassword">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户昵称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('pname') }}" placeholder="" id="" name="pname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>真实姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('uname') }}" placeholder="" id="" name="uname">
			</div>
		</div>

		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-7 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" checked value="0">
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="1">
					<label for="sex-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="2">
					<label for="sex-3">保密</label>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>手机号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('phone') }}" placeholder="" id="" name="phone">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>邮箱号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('email') }}" placeholder="" id="" name="email">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2" for="file">
				选择图片:<img src="/d/images/default.jpg" title="点击图片进行上传" id="show" style="width: 150px;margin-left:285px;">
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list" style="display: none;">
						<input class="input-file" type="file"  name="pic" onchange="changepic(this)" id="file" value="{{ old('simg') }}">
					</div>
				</div>
			</div>
		</div>
		<div class="row cl" style="margin-top: 20px;">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="submit" class="btn btn-success btn-uploadstar radius ml-10" value="开始上传"></button>
				<input type="reset" class="btn btn-info btn-uploadstar radius ml-10" value="重置"></button>
			</div>
		</div>
	</form>
</div>

<script>
    function changepic() {
        var reads= new FileReader();
        f=document.getElementById('file').files[0];
        reads.readAsDataURL(f);
        reads.onload=function (e) {
            document.getElementById('show').src=this.result;
        };
    }
</script>


<script src="/d/layui-v2.4.5/layui/layui.js"></script>
<script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
