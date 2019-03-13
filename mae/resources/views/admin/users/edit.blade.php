@extends('admin.public.ifram')



<div class="page-container">
	<form class="form form-horizontal"  action="/admin/users/{{ $users->uid }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
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
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>账号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $users->account }}" placeholder="{{ $users->account }}" id="" name="account" readonly="true">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户昵称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $users->pname }}" placeholder="" id="" name="pname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">真实姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $users->uname }}" placeholder="" id="" name="uname">							
			</div>
		</div>

		<div class="row cl">
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>性别：</label>
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
			<label class="form-label col-xs-4 col-sm-2">联系电话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $userd->phone }}" placeholder="" id="" name="wood">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $userd->email }}" placeholder="" id="" name="pack">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2" for="file">
				修改头像:<img src="{{ asset('/uploads/users/'.$userd->face) }}" title="点击图片进行上传" id="show" style="width: 150px;margin-left:285px;">
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list" style="display: none;">
						<input class="input-file" type="file" multiple name="pic" onchange="changepic(this)" id="file" value="">
					</div>
				</div>
			</div>
		</div>
		<div class="row cl" style="margin-top: 20px;">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="submit" class="btn btn-success btn-uploadstar radius ml-10" value="开始修改"></button>
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
