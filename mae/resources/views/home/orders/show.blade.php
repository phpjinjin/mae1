	<link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
   <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
  <script src="/dizhi/js/distpicker.data.js"></script>
    <script src="/dizhi/js/distpicker.js"></script>
    <script src="/dizhi/js/main.js"></script>
    <script src="/jquery.js"></script>
@foreach($orders as $k=>$v)
<form action="/home/orders/up/{{ $v->addid }}" method="post">
	  {{ csrf_field() }}
	<div  data-toggle="distpicker" style="text-align:center"  >*所在地区
		
  <select class="addres1"   data-province="{{ $province }}"></select>
  <select class="addres2" data-city="{{ $city }}"></select>
  <select class="addres3" data-district="{{ $district }}">></select>
  <input type="text" name="region"  value="" hidden class="region">
</div>
	</div>&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center" >*收货人<input type="text" name="aname" value="{{ $v->aname }}"></div>&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center" >*详细地址<input type="text" name="addres" value="{{ $v->addres }}"></div>&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center" >*手机号码<input type="text" name="phone" value="{{ $v->phone }}"></div>&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center" >*邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编<input type="text" name="code" value="{{ $v->code }}"></div>	&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center" class="tijiao"><input type="submit" value="保存收货信息"></div>
</form>
<script type="text/javascript">
	$('.tijiao').click(function(){
		   var a = $(".addres1").val();
                var b = $(".addres2").val();
                var c = $(".addres3").val()
          
		$('.region').val(a+'.'+b+'.'+c);
		      
		
	});


</script>
@endforeach
