@extends('home.personal.index')

@section('order')

<script src="/d/layui-v2.4.5/layui/layui.js"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/laydate/default/laydate.css"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/code.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.mobile.css"></script>
<script src="/d/layui-v2.4.5/layui/css"></script>
<script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
<div class="m_des">
                <form action="/home/center/save" method="post">

					{{ csrf_field()}}
                <div class="mem_tit">账户安全</div>
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                	<!-- 显示错误消息 开始 -->
		            @if (session('success'))
		                <div class="mws-form-message success" style="background: #E8E8E3;">
		                    {{ session('success') }}
		                </div>
		            @endif

		            @if (session('error'))
		                <div class="mws-form-message error" style="background: orangered;">
		                    {{ session('error') }} 
		                </div>
		            @endif
             		<!-- 显示错误消息 结束 -->
                  <tr height="45">
                    <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                    <td><input type="password" value="" class="add_ipt" style="width:180px;" name="password" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新密码 &nbsp; &nbsp;</td>
                    <td><input type="password" value="" class="add_ipt" style="width:180px;" name=" pass1" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">确认密码 &nbsp; &nbsp;</td>
                    <td><input type="password" value="" class="add_ipt" style="width:180px;" name="pass2" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="submit" value="确认修改" class="btn_tj" /></td>
                  </tr>
                </table>
                </form>
            </div>
@endsection