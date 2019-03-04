@extends('admin.public.ifram')



<div class="page-container">
	<form class="form form-horizontal"  action="/admin/goods/{{ $goods->gid }}" method="post" enctype="multipart/form-data">
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
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $goods->gname }}" placeholder="" id="" name="gname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box">
					<select class="select" size="1" name="tid">
					<option value="0" selected="">请选择</option>
					@foreach($cate as $k=>$v)
					<option value="{{$v->tid}}" {{ $v->pid == 0 ? 'disabled' : '' }} {{ $v->tid == $goods->tid ? 'selected' : '' }}>{{ $v->gtname }}</option>
					@endforeach
				</select>
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $goods->price }}" placeholder="¥" id="" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">库存：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $goods->stock }}" placeholder="" id="" name="stock">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">材料：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $goods->goodsval->wood }}" placeholder="" id="" name="wood">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">包装：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $goods->goodsval->pack }}" placeholder="" id="" name="pack">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>颜色：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="color" class="select">
					<option value="1">红</option>
					<option value="2">橙</option>
					<option value="2">黄</option>
					<option value="2">绿</option>
					<option value="2">青</option>
					<option value="2">靛</option>
					<option value="2">紫</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">花语：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="lang" cols="" rows="" class="textarea" placeholder="说点什么...最少输入10个字符" onkeyup="$.Huitextarealength(this,100)">{{ $goods->goodsval->lang }}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2" for="file">
				选中删除:
				
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list">
							@foreach ($pic as $k=>$v)
					    <img src="{{ asset('uploads/gpic/'.$v->gpic) }}" alt="..." class="img-thumbnail" width="77" height="77">
					      <input type="checkbox" name="picid[]" value="{{ $v->id }}">
					    @endforeach
					</div>
				</div>
			</div>
		</div>



		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2" for="file">
				添加图片:<img src="/d/images/default.jpg" title="点击图片进行上传" id="show" style="width: 150px;margin-left:285px;">
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list" style="display: none;">
						<input class="input-file" type="file" multiple name="pic[]" onchange="changepic(this)" id="file" value="{{ old('simg') }}">
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
