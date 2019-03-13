@extends('home.index.content')
@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<script type="text/javascript" src="./jquery.js"></script>

<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/homes/images/img2.jpg" />        
    </div>
 
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"></span>商品列表
            </div>
              
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              @foreach($users  as $k=>$v)
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
                
              </tr>
            
            
              <tr>
                @foreach ($v->cart_good as $kk => $vv)
                <td style="border:1px solid #D8D8CB">
     
                    <div class="c_s_img"  ><img src="{{ asset('/uploads/gpic/'.$vv->goodspic[0]->gpic) }}" width="73" height="73" /></div>
                        {{$vv->gname}}

                    
                </td>
                <td align="center" style="border:1px solid #D8D8CB">颜色：灰色</td>
                <td align="center" style="border:1px solid #D8D8CB">{{ $v->cnt }}</td>
                <td align="center" style="color:#ff4e00;border:1px solid #D8D8CB">￥{{ $v->cnt*$vv->price }}</td>
                @endforeach
              </tr>
             @endforeach

              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：￥{{$v->prices}}  
                </td>
              </tr>
            </table>
            
            <div class="two_t">
            	<span class="fr"></span>收货人信息
            </div>
              <div class="two_t">
                  <span class="fr"></span>  请选择地址
                </div>     
            @foreach($addres as $a=>$b)
              

             <ul class="pay" >
              

            
               <div style="text-align:center;font-size:15px;float:left;margin-bottom: 20px" class="xuanze" id="{{ $b->addid }}" default>
                <span>{{ $b->aname }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span >{{  str_replace('.','',$b->region) }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>{{ $b->addres }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>{{ $b->phone }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                  @if($b->status == 1)
               <span style="text-align:center;font-size:15px;display:inline;background-color:#999;color:#fff">默认地址</span>
               @else
              
               @endif
               <span style="text-align:center;font-size:15px;display:inline;"   id="hh">选择</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <span style="text-align:center;font-size:15px;display:inline;float:right; " onclick="shows({{ $b->addid }});" >编辑</span>
            
              
             </div>
            
          </ul>
         
            @endforeach
            <div class="two_t">
            	支付方式
            </div>
            <ul class="pay">
               
                <li class="checked">余额支付<div class="ch_img"></div></li>
                <li>银行亏款/转账<div class="ch_img"></div></li>
                <li>货到付款<div class="ch_img"></div></li>
                <li>支付宝<div class="ch_img"></div></li>
            </ul>
             
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
            
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{$v->prices}}  </span></b>
                </td>
              </tr>
             <form action="/home/orders/create" method="post">
                {{ csrf_field() }}
                <div class="addres"> <input type="text" value="" name="addid" class="address" hidden></div> 
              <div style="font-size:21px;margin-left:33px"> 卖家留言：</div>
                <textarea rows="10"  cols="150" style="margin-left:33px" name="text">
                 

               </textarea>
              <tr height="100">
                <td align="right"  >
                  <div class="tijiao"><input type="submit"  style="float:right;width:17%;height:60px;font-size:16px;background-color: #FF6F31;color:white" value="提交订单"  ></div>  
                 </td>
              </tr>
           </form>
            </table>
 
            
        	
        </div>
    </div>
<script type="text/javascript">
function shows(id){
    layer.open({
        type: 2,
        title: '编辑收货地址',
        shadeClose: true,
        shade: 0.6,
        area: ['500px', '60%'],
        content: '/home/orders/shows/'+id,
      });
    }
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index); //再执行关闭
    if(index)
    {
      window.parent.location.reload();
    }

$(".xuanze").click(function(){

    $(".xuanze").css('background-color','white');
     $(this).css('background-color','pink');
      var tt= $(this).attr("id");
   $(".address").val(tt);
      
});

</script>

@endsection
