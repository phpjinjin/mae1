@extends('home.index.content')

@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="/o/js/shade.js"></script>
<script type="text/javascript" src="/o/js/p_tab.js"></script>
<link rel="stylesheet" type="text/css" href="/o/css/ShopShow.css">
<link rel="stylesheet" type="text/css" href="/o/css/MagicZoom.css">
<script type="text/javascript" src="/o/js/MagicZoom.js"></script>
<script type="text/javascript" src="/o/js/num.js">
    	var jq = jQuery.noConflict();
</script>
<script src="/o/js/ShopShow.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="postion">
    	<span class="fl">全部 > {{ $goods->goodstype->gtname }} > {{ $goods->gname }}</span>
    </div>    
    <div class="content" style="border:1px solid #D9D9D9; padding:10px;">
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="{{ asset('uploads/gpic/'.$pic[0]->gpic) }}" title="{{ $goods->gname }}" class="MagicZoom" id="MagicZoom"><img src=" {{ asset('uploads/gpic/'.$pic[0]->gpic) }}" width="390" height="390" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul style="width:720px;margin-left:0px;">
                    	
                    	@for($i=0;$i<$pics;$i++)
                    		<li onclick="showPic({{$i}})" rel="MagicZoom" class="tsSelectImg"><img src="{{ asset('uploads/gpic/'.$pic[$i]->gpic) }}" tsImgS="{{ asset('uploads/gpic/'.$pic[$i]->gpic) }}" width="79" height="79" /></li>
                        @endfor
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/o/images/loading.gif" alt="Loading..." />				
        </div>

        <div class="pro_des">
        	<div class="des_name">
            	<p>{{ $goods->gname }}</p>
                {{ $goods->hot }}位用户查看过此商品
            </div>
            <hr>
            <div class="pro_shp">
                <p>编号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $goods->gid }}</p>
            	<p>类别：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $goods->goodstype->gtname }}</p>
                <p>材料：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $val->wood }}</p>
                <p>包装：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $val->pack }}</p>
                <p>花语：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $val->lang }}</p>
                <p>附送：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;下单填写留言，即免费赠送精美贺卡！</p>
                <b>价格：&nbsp;&nbsp;&nbsp;&nbsp;￥{{ $goods->price }}</b><br />
            </div>
            
            
            
            <div class="des_share">
            	<div class="d_sh">
                	分享
                    <div class="d_sh_bg">
                    	<a href="#"><img src="/o/images/sh_1.gif" /></a>
                        <a href="#"><img src="/o/images/sh_2.gif" /></a>
                        <a href="#"><img src="/o/images/sh_3.gif" /></a>
                        <a href="#"><img src="/o/images/sh_4.gif" /></a>
                        <a href="#"><img src="/o/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a id="shou" onclick="shou({{ $goods->gid }})">收藏</a></div>
            </div>
            <script type="text/javascript">
                function shou(gid){
                    var url = '/home/collect/add/'+gid;
                    $.get(url , function(res){
                        if(res){
                            layer.msg('操作成功',{icon: 1});
                            $('#shou').text(res);
                        }else{
                            layer.msg(res,{icon: 2});
                        }
                    });
                }
            </script>
            <div class="des_join">
            	<div class="j_nums">
            		<input type="text" value="1" name="cnt" id="carts" class="n_ipt">
                    <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1">
                    <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2">
                </div>
                <span class="fl"><a onclick="carts({{ $goods->gid }})"><img src="/o/images/j_car.png" /></a></span>
            </div>            
        </div>
        
    </div>
    <script type="text/javascript">
    	function carts(gid){
    		var cnt = $('#carts').val();
    		var url = '/home/carts/add/'+cnt+'/'+gid;
    		$.get(url , function(res){
				if(res) {
					layer.alert('已加入购物车', {
					  icon: 1,
					  skin: 'layer-ext-moon' 
					})
				} else {
					layer.msg('加入购物车失败',{icon: 1});
				}
			});
    	}
    	
    	
    </script>

    <div class="content mar_20">
    	<div class="l_history">
        	<div class="fav_t">用户还喜欢</div>
        	<ul>
                @for($i=0;$i < 5;$i++)
            	<li>
                    <div class="img"><a href="/home/goods/{{ $good_hot[$i]->gid }}"><img src="{{ asset('/uploads/gpic/'.$good_hot[$i]->goodspic[0]->gpic) }}" width="185" height="162" /></a></div>
                	<div class="name"><a href="/home/goods/{{ $good_hot[$i]->gid }}">{{ $good_hot[$i]->gname }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $good_hot[$i]->price }}</span></font> &nbsp;
                    </div>
                </li>
               @endfor
        	</ul>
        </div>
        <div class="l_list">
            <div class="des_border">
                <div class="des_tit">
                	<ul>
                    	<li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">
                	
                	<table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>商品名称：{{ $goods->gname }}</td>
                      </tr>
                      <tr>
                        <td>商品材料：{{ $val->wood }}</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>商品包装: {{ $val->pack }}</td>
                      </tr>
                      <tr>
                        <td>商品寓意：{{ $val->lang }} </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>                                               
                                            
                        
                </div>
          	</div>  
            
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                	<table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:265px;"><img src="{{ asset('/uploads/gpic/'.$goods->goodspic[0]->gpic) }}" width="400" height="412" /></td>
                        <td style="padding:27px;">
                        	<b>{{ $goods->gname }}</b><br />
                            【商品编号】：{{ $goods->gid}}<br />
                            【商品类别】：{{ $goods->goodstype->gtname }}<br />
                            【商品日期】：{{ $goods->created_at }}<br />
                            【商品包装】：{{ $val->pack }}<br />
                            【商品材料】：{{ $val->wood }}<br />
                            【商品寓意】：{{ $val->lang }}<br />
                        </td>
                      </tr>

                    </table>
                    <div style="background:#D97593;width:100%;height:1.5px;"></div>
                    <p align="center">
                    @foreach($goods->goodspic as $k=>$v)
                    
                    <img style="margin-top:10px;border:1px solid #EAEAEA;" src="{{ asset('/uploads/gpic/'.$v->gpic) }}" width="450" height="425" /><br /><br />
                    @endforeach
					</p>
                    
                </div>
          	</div>  
            
            <div class="des_border" id="p_comment">
            	<div class="des_t">商品评论</div>
                
                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="175" class="jud_per">
                    	<p>80.0%</p>好评度
                    </td>
                    <td width="300">
                    	<table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="90">好评<font color="#999999">（80%）</font></td>
                            <td><img src="/o/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>中评<font color="#999999">（20%）</font></td>
                            <td><img src="/o/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>差评<font color="#999999">（0%）</font></td>
                            <td><img src="/o/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                        </table>
                    </td>
                    <td width="185" class="jud_bg">
                    	购买过雅诗兰黛第六代特润精华露50ml的顾客，在收到商品才可以对该商品发表评论
                    </td>
                    <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="/o/images/btn_jud.gif" /></a></td>
                  </tr>
                </table>
                
                
                				
                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="160"><img src="/o/images/peo1.jpg" width="20" height="20" align="absmiddle" />&nbsp;向死而生</td>
                    <td width="180">
                    	颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                    	产品很好，香味很喜欢，必须给赞。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/o/images/peo2.jpg" width="20" height="20" align="absmiddle" />&nbsp;就是这么想的</td>
                    <td width="180">
                    	颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                    	送朋友，她很喜欢，大爱。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/o/images/peo3.jpg" width="20" height="20" align="absmiddle" />&nbsp;墨镜墨镜</td>
                    <td width="180">
                    	颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                    	大家都说不错<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/o/images/peo4.jpg" width="20" height="20" align="absmiddle" />&nbsp;那*****洋 <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="180">
                    	颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                    	下次还会来买，推荐。<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                </table>

                	
                    
                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
                
          	</div>
            
            
        </div>
    </div>
    
    
    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/o/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/o/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                    	<a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-收藏成功 End-->
    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/o/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/o/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                    	购物车共有1种宝贝（3件） &nbsp; &nbsp; 合计：1120元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-加入购物车 End-->



@endsection