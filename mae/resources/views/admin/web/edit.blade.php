@extends('admin.public.ifram')
	<!-- 显示错误信息 -->
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
	<h2 align="center" style="color: #aaa;">修改网站信息</h2>
		<form action="/admin/web/update" method="post" class="form form-horizontal" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					网站名称：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input class="input-text" type="" name="web_name" value="{{$webs[0]->web_name}}">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					网站描述：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input class="input-text" type="" name="describe" value="{{$webs[0]->describe}}">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					网站备案号：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input class="input-text" type="" name="filing" value="{{$webs[0]->filing}}">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					联系方式：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input class="input-text" type="" name="telephone" value="{{$webs[0]->telephone}}">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					版权信息：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input class="input-text" type="" name="cright" value="{{$webs[0]->cright}}">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">
					网站状态：
				</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="radio" @if($webs[0]->status == 2) checked @endif value="2" name="status" onchange="changestatus(this)" >网站维护
					<input type="radio" @if($webs[0]->status == 1) checked @endif value="1" name="status" onchange="changestatus(this)">开启网站
				</div>
				<input type="hidden" name="wid" value="{{$webs[0]->wid}}">
			</div>

			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-4" for="file">
					网站logo：<img src="{{ asset('/uploads/web/'.$webs[0]->logo) }}" id="show" width="100"  onclick="pic()">
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<div class="uploader-thum-container">
						<div id="fileList" class="uploader-list" style="display: none;">
							<input class="input-file" type="file" name="logo" onchange="changepic(this)" id="file" value="{{$webs[0]->logo}}">
						</div>
					</div>
				</div>
			</div>
			<div style="width: 200px; float: right; margin-right: 45%;margin-top: 10px">
				<input class="btn btn-primary " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="test()">
			</div>
		</form>
	<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
	<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
	<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
	<script type="text/javascript">
		 function changepic() {
	        var reads= new FileReader();
	        f=document.getElementById('file').files[0];
	        reads.readAsDataURL(f);
	        reads.onload=function (e) {
	            document.getElementById('show').src=this.result;
	        };
    	}

    	function changestatus(){
    		alert('这关系到整个网站的运营，请慎重决定');
    	}
	</script>
	

	
