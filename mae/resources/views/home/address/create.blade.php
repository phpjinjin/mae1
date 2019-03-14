@extends('home.index.content')
@section('content')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>

@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
<script src="/o/js/distpicker.data.js"></script>
<script src="/o/js/distpicker.js"></script>
<script src="/o/js/main.js"></script>
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
            <div class="mem_tit">添加地址</div>
            <form action="/home/address/store" method="post">
                {{csrf_field()}}
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td style="font-family:'宋体';">
                    <div data-toggle="distpicker">
                      <select class="uuu" ></select>
                      <select id="select2" ></select>
                      <select id="select3" >></select>
                      </div>
                    <input id="region" type="text" value="" name="region" class="add_ipt" hidden />
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
                <td colspan="3" style="font-family:'宋体';"><input type="text" name="addres" style="width: 81%" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">默认地址</td>
                <td colspan="3" style="font-family:'宋体';">
                    <input type="radio" name="status" value="1">是
                    <input type="radio" name="status" value="2" checked>否
                （必填）</td>
              </tr>
            </table>
            <p align="right">
              <input id="btn_submt" style="width: 90px;height: 25px;line-height: 25px;overflow: hidden;background-color: #d97593;color: #FFF;font-size: 12px;font-family: '宋体';text-align: center;margin-left: 10px;border: 0;cursor: pointer;float: right; margin-right: 20px;" type="submit" class="add_b" value="确认添加">&nbsp; &nbsp; 
            </p> 
            </form>
            
        </div>
    </div>
<script type="text/javascript">
  $(function (){
      $("#btn_submt").click(function () {
         //alert($("#select").val());//获取选中项的value
          var a = $(".uuu").val();
          var b = $("#select2").val();
          var c = $("#select3").val()
          $("#region").val(a+b+c);
          var d = $("#region").val();
          // alert(d);
      });
  })
</script>
@if(session('tianjia'))
<script type="text/javascript">
  layer.msg(' 添加成功');
</script>   
@endif
@if(session('tjerror'))
<script type="text/javascript">
  layer.msg(' 添加失败');
</script>   
@endif
@endsection