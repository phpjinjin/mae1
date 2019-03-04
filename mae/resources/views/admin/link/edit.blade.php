@extends('admin.public.ifram')

<h1 align="center" style="color: #aaa">修改友情链接</h1>
<form action="/admin/link/{{ $data[0]->lid }}" method="post" class="form form-horizontal" enctype="multipart/form-data">
	{{csrf_field()}}
	{{ method_field('PUT') }}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			链接名称：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="lname" value="{{$data[0]->lname or '' }}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			链接地址：
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<input class="input-text" type="text" name="lurl" value="{{$data[0]->lurl or '' }}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			链接图标：
		</label>
		<label class="form-label col-xs-1" for="file">
			 &nbsp; &nbsp;<img src="{{ asset('uploads/link/'.$data[0]->limg) or ''  }}" id="show" width="100"  onclick="pic()">
		</label>
		<div class="formControls col-xs-6 col-sm-6">
			<div class="uploader-thum-container">
				<div id="fileList" class="uploader-list" style="display: none;">
					<input class="input-file" type="file" name="limg" value="" onchange="changepic(this)" id="file">
				</div>
			</div>
		</div>
	</div>
	<div style="width: 200px; float: right; margin-right: 40%;margin-top: 10px">
		<input class="btn btn-warning " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</div>
</form>
<script type="text/javascript">
	function changepic() {
	        var reads= new FileReader();
	        f=document.getElementById('file').files[0];
	        reads.readAsDataURL(f);
	        reads.onload=function (e) {
	            document.getElementById('show').src=this.result;
	        };
    	}
</script>