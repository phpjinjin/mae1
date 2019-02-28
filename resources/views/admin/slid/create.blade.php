@extends('admin.public.ifram')

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

<div class="page-container">
	<form class="form form-horizontal"  action="/admin/slid" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="stitle">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>跳转地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="surl">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" placeholder="" id="" name="sort">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="nid" class="select">
					<option value="1">激活</option>
					<option value="2">不激活</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-2" for="file">
				选择图片:<img src="" title="点击图片进行上传" id="show" style="width: 150px;margin-left:285px;">
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list" style="display: none;">
						<input class="input-file" type="file" name="simg" onchange="changepic(this)" id="file" value="{{ old('simg') }}">
					</div>
				</div>
			</div>
		</div>
		

		<div class="row cl" style="margin-top: 20px;">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="submit" class="btn btn-success btn-uploadstar radius ml-10" value="开始上传"></button>
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
