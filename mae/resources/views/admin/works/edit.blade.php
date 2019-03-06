@extends('admin.public.ifram')


<article class="page-container " style="float:left;width:80%;position: relative; top:50px">

	<form action="/admin/works/{{ $works->woid }}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  {{ method_field('PUT') }}
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章标题:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="wtitle" value="{{ $works->wtitle }}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章作者:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="wuname" value="{{ $works->wuname }}">
			</div>
		</div>

		
		<div class="row cl"  >
			<label class="form-label col-xs-4 col-sm-3" for="file" style="float:left;width:34%;">图片:<img src="{{ asset('uploads/works/'.$works->wpic) }}"   id="show" width="100"  ></label>
			<p hidden><input type="file"  hidden  name= "wpic" onchange="changepic(this)" id="file" value="{{ $works->wpic }}"></p>				 	
		</div>
		

	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章内容</label>
			<div class="formControls col-xs-8 col-sm-9">
				 <!-- 加载编辑器的容器 -->
			    <script id="container" name="wcontent" type="text/plain" value="{{ $works->wcontent }}">
			    	{!! $works->wcontent !!}
			    </script>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">投放、下刊：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="wstatus" >
					
					<option value="1"  @if($works->wstatus == 1) selected @else '' @endif >投放</option>
				
					<option value="2" @if($works->wstatus == 2) selected @else '' @endif >下刊</option>
					
				</select>
				</span> </div>
		</div>
	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
	<!-- 配置文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>

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
