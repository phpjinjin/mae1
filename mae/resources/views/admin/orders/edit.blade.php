@extends('admin.public.ifram')
<article class="page-container " style="float:left;width:80%;position: relative; top:50px">



	<form action="/admin/orders/{{ $data->oid }}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  {{ method_field('PUT') }}
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单号</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" disabled  placeholder="" id="amsg" name="oid"value="{{ $data->oid }}">
			</div>
		</div>

		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>总金额</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" disabled placeholder="" id="amsg" name="sum"value="{{ $data->sum }}">
			</div>
		</div>

		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>下单时间</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" disabled id="amsg" name="created_at"value="{{ $data->created_at }}">
			</div>
		</div>
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>收货人</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="amsg" name="uname"value="{{ $data->uname }}">
			</div>
		</div>
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>收货地址</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="amsg" name="addres"value="{{ $data->addres }}">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系方式</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="atitle" name="phone" value="{{ $data->phone }}">
			</div>
		</div>
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>买家备注</label>
			<div class="formControls col-xs-8 col-sm-9">
			<textarea rows="8" cols="60" name="message">
			{{ $data->message }}
			</textarea>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>

</article>

