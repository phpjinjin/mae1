@extends('home.index.head')

@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="/o/js/shade.js"></script>
<script type="text/javascript" src="/o/js/p_tab.js"></script>
<script type="text/javascript" src="/o/js/MagicZoom.js"></script>
<script type="text/javascript" src="\o\js/num.js">
    	// var jq = jQuery.noConflict();
</script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection

<div class="content mar_20">
    	<img src="/o/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="250">商品名称</td>
            <td class="car_th" width="250">单价</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="140">返还积分</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          @foreach($carts as $k=>$v)
          <tr>
            <td>
            	<div class="c_s_img"><img src="{{ asset('uploads/gpic/'.$v->cart_good[0]->goodspic[0]->gpic) }}" width="73" height="73" /></div>
                {{ $v->cart_good[0]->gname }}
            </td>
            <td align="center" id="dan{{ $v->cid }}">{{ $v->cart_good[0]->price }}</td>
            <td align="center">颜色：{{ $v->cart_good[0]->color }}</td>
            
            <td align="center">
            	<div class="c_num">
                    <input type="button" value="" onclick="jian({{ $v->cid }})" class="car_btn_1" />
                	<input type="text" value="{{ $v->cnt }}" id="act{{ $v->cid }}" name="" class="car_ipt" />  
                    <input type="button" value="" onclick="jia({{ $v->cid }})" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;" id="price{{$v->cid}}">￥{{ $v->cart_good[0]->price*$v->cnt  }}</td>
            
            <td align="center">26R</td>
            <td align="center"><a onclick="ShowDiv('MyDiv','fade')">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
         @endforeach
         <script type="text/javascript">

            	function jian(cid){
            		var url = '/home/carts/jian/'+cid;
				  	$.get(url , function(res){
						$('#act'+cid).val(res);
						var dan = $('#dan'+cid).text();
						var num = $('#act'+cid).val();
						$('#price'+cid).text("￥"+dan*num);
					});
            	}
         		function jia(cid){
            		var url = '/home/carts/jia/'+cid;
				  	$.get(url , function(res){
						$('#act'+cid).val(res);
						var dan = $('#dan'+cid).text();
						var num = $('#act'+cid).val();
						$('#price'+cid).text("￥"+dan*num);
					});
            	}
            </script>
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥2899</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
            	<a href="#"><img src="/o/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="#"><img src="/o/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/o/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->


@endsection
