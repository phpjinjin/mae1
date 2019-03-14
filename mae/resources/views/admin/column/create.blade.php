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
	<form class="form form-horizontal"  action="/admin/column" method="post">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>栏目标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="title">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>跳转地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="url" class="input-text" value="" placeholder="" id="" name="url">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<label class="radio-inline">
				  <input type="radio" name="sort" id="inlineRadio1" value="1"> 栏目一
				</label>
				<label class="radio-inline">
				  <input type="radio" name="sort" id="inlineRadio2" value="2"> 栏目二
				</label>
				<label class="radio-inline">
				  <input type="radio" name="sort" id="inlineRadio3" value="3"> 栏目三
				</label>
				<label class="radio-inline">
				  <input type="radio" name="sort" id="inlineRadio3" value="4"> 栏目四
				</label>
			</div>
		</div>
		<div class="row cl" style="margin-top: 20px;">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="submit" class="btn btn-success btn-uploadstar radius ml-10" value="添加"></button>
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
