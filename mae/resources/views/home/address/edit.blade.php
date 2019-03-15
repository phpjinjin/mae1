@extends('home.personal.index')

@section('order')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
@if(session('xgcg'))
<script type="text/javascript">
  layer.msg(' 修改失败');
</script>
@endif

<script type="text/javascript" src="/o/js/n_nav.js"></script>
<link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
<script src="/o/js/distpicker.data.js"></script>
<script src="/o/js/distpicker.js"></script>
<script src="/o/js/main.js"></script>


		
            <p></p>
            <div class="mem_tit">修改地址</div>
            <form action="/home/address/update/{{$data->addid}}">
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td style="font-family:'宋体';">
                    <div data-toggle="distpicker">
                      <select class="uuu" ></select>
                      <select id="select2" ></select>
                      <select id="select3" >></select>
                      </div>
                    <input id="region" type="text" value="{{$data->region}}" name="region" class="add_ipt" hidden />
                </td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" value="{{$data->code}}" name="code" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" value="{{$data->aname}}" name="aname" class="add_ipt" />（必填）</td>
                <td align="right">手机号码</td>
                <td style="font-family:'宋体';"><input type="text" value="{{$data->phone}}" name="phone" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td colspan="3" style="font-family:'宋体';"><input type="text" value="{{$data->addres}}" name="addres" style="width: 81%" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">默认地址</td>
                <td colspan="3" style="font-family:'宋体';">
                    <input type="radio" @if($data->status == 1)checked @endif name="status" value="1">是
                    <input type="radio" @if($data->status == 2)checked @endif name="status" value="2">否
                （必填）</td>
              </tr>
            </table>
            <p align="right">
              <input style="width: 90px;height: 25px;line-height: 25px;overflow: hidden;background-color: #d97593;color: #FFF;font-size: 12px;font-family: '宋体';text-align: center;margin-left: 10px;border: 0;cursor: pointer;float: right; margin-right: 20px;" type="submit" value="确认修改" class="add_b" id="btn_submt">
            </p> 
            </form>
        
  
<script type="text/javascript">
  $(function (){
      $("#btn_submt").click(function () {

         //alert($("#select").val());//获取选中项的value
          var a = $(".uuu").val();
          var b = $("#select2").val();
          var c = $("#select3").val()
          $("#region").val(a+b+c);

      });
  })
</script>
@endsection