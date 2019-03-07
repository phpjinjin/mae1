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
            <div class="mem_tit">添加地址</div>
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td style="font-family:'宋体';">
                    <input type="text" name="region" class="add_ipt" />
                    （必填）
                </td>

                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" name="code" class="add_ipt" />（必填）
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" name="aname" class="add_ipt" />（必填）</td>
                <td align="right">手机号码</td>
                <td style="font-family:'宋体';"><input type="text" name="phone" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td colspan="3" style="font-family:'宋体';"><input type="text" name="adress" style="width: 81%" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">默认地址</td>
                <td colspan="3" style="font-family:'宋体';">
                    <input type="radio" name="addres" value="1">是
                    <input type="radio" name="addres" value="2">否
                （必填）</td>
              </tr>
            </table>
            <p align="right">
              <a href="/home/address/update/1" class="add_b">确认添加</a>&nbsp; &nbsp; 
            </p> 
        </div>
    </div>
@endsection