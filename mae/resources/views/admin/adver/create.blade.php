@extends('admin.public.ifram')


<!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="class='alert alert-success" role="lert">
                    {{ session('success') }}
                </div>
            @endif


            @if (session('error'))
                <div class="class='alert alert-danger" role="lert">
                    {{ session('error') }}
                </div>
            @endif
<!-- 显示错误消息 结束 -->



<link rel="stylesheet" type="text/css" href="/d/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/d/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/fonts/icomoon/style.css" media="screen">


<link rel="stylesheet" type="text/css" href="/d/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/page_page.css" media="screen">


<article class="page-container " style="float:left;width:80%;position: relative; top:50px">

	<!-- 显示错误消息 开始 -->
	            @if (session('success'))
	                <div class="class='alert alert-success" role="lert">
	                    {{ session('success') }}
	                </div>
	            @endif


	            @if (session('error'))
	                <div class="class='alert alert-danger" role="lert">
	                    {{ session('error') }}
	                </div>
	            @endif
	<!-- 显示错误消息 结束 -->


	<form action="/admin/adver" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		  {{ csrf_field() }}

		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>客户信息：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="amsg" name="amsg" value="{{ old('amsg') }}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="atitle" name="atitle" value="{{ old('atitle') }}">
			</div>
		</div>

		
		<div class="row cl"  >
			<label class="form-label col-xs-4 col-sm-3" for="file" style="float:left;width:34%;">图片：<img src="" id="show" width="100"  style=""></label>
			<p hidden><input type="file"  hidden  name= "apic" onchange="changepic(this)" id="file" value="{{ old('apic') }}"></p>	
		</div>
		

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="aurl" name="aurl"  value="{{ old('aurl') }}">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">投放、下刊：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="astatus"  value="{{ old('astatus') }">
					<option value="0">投放</option>
					<option value="1">下刊</option>
				</select>
				</span> </div>
		</div>
	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>


<script>

    function changepic(imgFile) {
    	 
        var reads= new FileReader();
        f=document.getElementById('file').files[0];
        reads.readAsDataURL(f);
        reads.onload=function (e) {
            document.getElementById('show').src=this.result;
     	
        };
  
    }


</script>
