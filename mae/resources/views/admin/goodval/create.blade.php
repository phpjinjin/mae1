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
<article class="page-container">
	<form action="/admin/goodval" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">所属分类：</label>
			<div class="formControls col-xs-8 col-sm-5"> <span class="select-box">
				<select class="select" size="1" name="tid">
					
					@foreach($cate_data as $k=>$v)
					<option value="{{$v->tid}}" @if($v->tid==$id) selected @endif>{{ $v->gtname }}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>属性名称：</label>
			<div class="formControls col-xs-8 col-sm-5">
				<input type="text" class="input-text" value="" placeholder="例如: 尺寸 | 内存" id="gvname" name="gvname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>属性值：</label>
			<div class="formControls col-xs-8 col-sm-5">
				<input type="text" class="input-text" value="" placeholder="多属性以英文逗号隔开" id="name" name="value">
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<input class="btn btn-info radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

