@extends('home.index.content')
@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="/o/js/shade.js"></script>
<script type="text/javascript" src="/o/js/p_tab.js"></script>
<script type="text/javascript" src="/o/js/MagicZoom.js"></script>
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
          	<td class="car_th" width="40">全选<input type="checkbox" id="quan" onclick="quan(this)"></td>
            <td class="car_th" width="250">商品名称</td>
            <td class="car_th" width="250">单价</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            
            <td class="car_th" width="150">操作</td>
          </tr>
          @foreach($carts as $k=>$v)
          <tr id="tr{{ $v->cid }}">
          	<td><input type="checkbox" class="carnum" name="carts[]" id="carnum{{ $v->cid }}" onclick="cartsum({{ $v->cid }})" value="{{ $v->cid }}"></td>
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
            <td align="center">￥<sapn style="color:#ff4e00;" id="price{{$v->cid}}">{{ $v->cart_good[0]->price*$v->cnt  }}</sapn></td>
            
            
            <td align="center"><a onclick="dele({{ $v->cid }})">删除</a>&nbsp; &nbsp;<a id="shou{{$v->gid}}" onclick="shou({{ $v->gid }})">收藏</a></td>
          </tr>
         @endforeach
         
         <script type="text/javascript">
				var sum = 0;
				var isload = 1;
				var jsload = 1;

				// 全选
				
				function quan(obj){
					var status = $('#quan').prop('checked');
					if(status){
						$('input:checkbox').each(function(){
							var mae = this.id;
						if(this.checked == true){
							return true;
						}
						this.checked = true;
							var id = mae.replace(/[^0-9]/ig,"");
							if(id){
								cartsum(id);
							}
						});
					}else{
						$('input:checkbox').each(function(){
						this.checked = false;
						var mae = this.id;
						var id = mae.replace(/[^0-9]/ig,"");
						if(id){
							cartsum(id);
						}
						});
					}
					
				}


				// 清空
				function fan(){
					$('input:checkbox').each(function(){
						this.checked = !this.checked;
						var mae = this.id;
						var id = mae.replace(/[^0-9]/ig,"");
						console.log(id);
						
					});
				}





            	function jian(cid){
            		if(jsload == 2){
            			return false;
            		}
         			jsload = 2;
            		var url = '/home/carts/jian/'+cid;
				  	$.get(url , function(res){
						$('#act'+cid).val(res);
						var dan = $('#dan'+cid).text();
						var num = $('#act'+cid).val();
						$('#price'+cid).text(dan*num);
						jsload = 1;
					});

					var car = $('#dan'+cid).text();
					if($('#carnum'+cid).is(':checked')){
						if($('#act'+cid).val() == 1){
				  			$('#act'+cid).arrt('disabled');
				  		}
						sum -= parseInt(car);
					}
					$('#pricesum').text(sum);
            	}



         		function jia(cid){
            		if(isload == 2){
            			return false;
            		}
         			isload = 2;
            		var url = '/home/carts/jia/'+cid;
				  	$.get(url , function(res){
						$('#act'+cid).val(res);
						var dan = $('#dan'+cid).text();
						var num = $('#act'+cid).val();
						$('#price'+cid).text(dan*num);
						isload = 1;
					});

				  	var car = $('#dan'+cid).text();
					if($('#carnum'+cid).is(':checked')){
						sum += parseInt(car);
					}

					$('#pricesum').text(sum);
            	}


            	function dele(id){
            		
					layer.confirm('您确定将该商品移除购物车吗？', {
					  btn: ['确认','取消']
					},function(){
						var url = '/home/carts/dele/'+id;
					  	$.get(url , function(res){
							if(res) {
								layer.msg('已删除',{icon: 1});
								if($('#carnum'+id).is(':checked')){
									var pric = $('#pricesum').text();
									sum = pric - $('#price'+id).text();
									$('#pricesum').text(sum);
								}
								$('#tr'+id).remove();
							} else {
								layer.msg('删除失败',{icon: 1});
							}
						});
					});

				}
				
				function cartsum(id){
					var car = $('#price'+id).text();
					if($('#carnum'+id).is(':checked')){
						sum += parseInt(car);
					}else{
						sum -= parseInt(car);
					}
					$('#pricesum').text(sum);
				}

				 function shou(gid){
		            var url = '/home/collect/add/'+gid;
		            $.get(url , function(res){
		                if(res){
		                    layer.msg('操作成功',{icon: 1});
		                    $('#shou'+gid).text(res);
		                }else{
		                    layer.msg(res,{icon: 2});
		                }
		            });
		        }
            </script>
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad"><input type="checkbox" name="clear" checked="checked" onclick="fan()" /></label><label class="r_txt">清空购物车</label>

                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥</b><b style="font-size:22px; color:#ff4e00;" id="pricesum"></b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
            	<a href="/home/index"><img src="/o/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/home/orders"><img src="/o/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
    </div>
	<!--End 第一步：查看购物车 End--> 

@endsection
