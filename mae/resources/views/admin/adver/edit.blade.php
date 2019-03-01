@extends('admin.public.ifram')


<article class="page-container " style="float:left;width:80%;position: relative; top:50px">

	<form action="/admin/adver/{{ $adver->advid }}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  {{ method_field('PUT') }}
		<div class="row cl">

			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>客户信息：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="amsg" value="{{ $adver->amsg }}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="atitle" value="{{ $adver->atitle }}">
			</div>
		</div>

		
		<div class="row cl"  >
			<label class="form-label col-xs-4 col-sm-3" for="file" style="float:left;width:34%;">图片:<img src="{{ asset('uploads/adver/'.$adver->apic) }}"   id="show" width="100"  ></label>
			<p hidden><input type="file"  hidden  name= "apic" onchange="changepic(this)" id="file" value="{{ $adver->apic }}"></p>				 	
		</div>
		

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  value=" {{ $adver->aurl }} "  name="aurl"  >
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">投放、下刊：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="astatus" >
					
					<option value="0"  @if($adver->astatus == 0) selected @else '' @endif >投放</option>
				
					<option value="1" @if($adver->astatus == 1) selected @else '' @endif >下刊</option>
					
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
