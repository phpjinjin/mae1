
@extends('home.personal.index')

@section('order')

<script src="/d/layui-v2.4.5/layui/layui.js"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/laydate/default/laydate.css"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/code.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.mobile.css"></script>
<script src="/d/layui-v2.4.5/layui/css"></script>
<script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
   
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="20%">订单号</td>
                <td width="15%">下单时间</td>
                <td width="15%">订单总金额</td>
                <td width="25%">订单状态</td>
                <td width="15%" >操作</td>
                <td width="10%" >操作</td>
               
               
              </tr>
              @foreach($order as $k=>$v)
           
              <tr id="tr{{ $v->oid }}">
                <td><font color="#ff4e00">{{ $v->oid }}</font></td>
                <td>{{ $v->created_at }}</td>
                <td>￥{{ $v->sum }}</td>

                @if( $v->status == 1) 
                <td>未付款</td>
                @elseif( $v->status == 2)
                <td>未发货</td>
                  @elseif( $v->status == 3)
                <td>已发货</td>
                @elseif( $v->status == 4)
                <td> 确认收货</td>
                @endif

                @if($v->status==1)
                 <td onclick ="deleted({{  $v->oid  }});"> 取消订单</td> 
                 <td onclick ="show({{  $v->oid  }});"> 订单详情</td> 
                @else
                <td><font color="#ff4e00">已确认</font></td> 
                @endif
              </tr>
             
              @endforeach
            </table> 

<script type="text/javascript">
	function deleted(id){
			
			layer.confirm('确认取消订单吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
				var url = '/home/center/delete/'+id;
			  $.get(url , function(res){
					if(res) {
						layer.msg('取消订单成功',{icon: 1});
						$('#tr'+id).remove();
					} else {
						layer.msg('删除订单失败请稍后再试');
					}
				});
				
			});
		
		}

 function show(id){
    layer.open({
        type: 2,
        title: '订单详情',
        shadeClose: true,
        shade: 0.6,
        area: ['1000px', '55%'],
        content: '/home/center/show/'+id,
      });
    }

</script>



@endsection