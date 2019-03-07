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
                	<li><a href="Member_User.html">用户信息</a></li>
                    <li><a href="/home/collect">我的收藏</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="/home/address" class="now">收货地址</a></li>
                </ul>
            </div>
        </div>
		<div class="m_right" style="width: 979px;">
            <p></p>
            <div class="mem_tit">收货地址</div>
            <div class="address">
                <div class="a_close"><a href="#"><img src="/o/images/a_close.png" /></a></div>
                <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">杨杨公司</td>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td>杨杨</td>
                  </tr>
                  <tr>
                    <td align="right">邮政编码：</td>
                    <td>621000</td>
                  </tr>
                  <tr>
                    <td align="right">配送区域：</td>
                    <td>四川成都市武侯区三环以内</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td>科华北路66号世外桃源写字楼3楼</td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td>12345678998</td>
                  </tr>
                </table>
                
                <p align="right">
                    <a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="/home/address/edit" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp;
                </p>
            </div>
            <div class="mem_tit">
                <a href="#"><img src="/o/images/add_ad.gif" /></a>
            </div>
        </div>
    </div>
@endsection