@extends('home.index.content')
@section('content')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
@if (session('qxcg'))
    <script type="text/javascript">
        layer.msg(' 已取消收藏');
    </script>
@endif
@if (session('qxerror'))
    <script type="text/javascript">
        layer.msg(' 取消收藏失败');
    </script>
@endif

@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
            <div class="left_m">
            	<div class="left_m_t t_bg2">个人中心</div>
                <ul>
                	<li><a href="#">用户信息</a></li>
                    <li><a href="/home/collect " class="now">我的收藏</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="#">我的订单</a></li>
                    <li><a href="/home/address">收货地址</a></li>
                </ul>
            </div>
        </div>
		<div class="m_right" style="width: 979px;">
            <p></p>
            <div class="mem_tit">
            	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现4件</span>我的收藏
            </div>
            <div class="fresh_mid" style="width: 979px">
	           	<ul>
	                <li onmouseenter="test(this)" onmouseleave="test2(this)">
	                    <div class="name"><a href="#">新鲜美味  进口美食</a>&nbsp;
	                    	<a href="/home/collect/delete/2" class="dj" style="background: #aaa" hidden >
	                    		&nbsp;取消收藏&nbsp;</a>
	                    </div>
	                    <div class="price">
	                        <font>￥<span>198.00</span></font> &nbsp; 26R
	                    </div>
	                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
	                </li>
	            </ul>

        	</div>
        	<div class="pages" style="margin-right: 30%; margin-top: 200px">
            	<a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
            </div>
		</div>
    </div>
</div>
<script type="text/javascript">
	function test(){
		$('a[class=dj]').removeAttr('hidden');
	}
	function test2(){
		$('a[class=dj]').attr('hidden','true');
	}
</script>
@endsection