@extends('admin.public.ifram')

<!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="class='alert alert-success" role="lert">
                    {{ session('success') }}
                </div>
            @endif


            @if (session('error'))
                <div class="class='alert alert-danger" role="lert">
                    {{ session('error') }}
                </div>
            @endif
<!-- 显示错误消息 结束 -->


<div class="page-container" style="float:left;width:100%;">
		<form action="/admin/orders" method="get">
		
		<input type="text" name="search" value="{{ $request['search'] or '' }}" placeholder=" 请输入订单号" style="width:250px;margin-left:40%" class="input-text" >
		<input   type="submit" value="搜索 " style="width:4%;height:4%;background-color:green;color:white">
			</form>
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		
	</span>
	 <span class="r">共有数据:
	 	<strong>{{ $res1}}</strong> 条
	 </span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
				
					<th width="80">订单号</th>
					<th width="100">总金额</th>
					<th width="100">下单时间</th>
					
					<th width="60">收货人</th>
					<th width="60">收货地址</th>
					<th width="60">总数量</th>
					<th width="200">状态</th>
					<th width="200">操作</th>
					
				</tr>
			</thead>
			@foreach($data as $k=>$v)
			<tbody>
			
        			
				  <tr class="text-c" id="tr{{ $v->oid }}">
				    		
				    <td style="text-align:center;vertical-align:middle;">{{ $v->oid  or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">{{ $v->sum  or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">{{ $v->created_at  or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">{{ $v->uname  or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">{{ $v->addres  or '' }}</td>
				    
				    <td style="text-align:center;vertical-align:middle;">{{ $v->cnt  or ''}}</td>     

				    <td class="td-status" style="text-align:center;vertical-align:middle;">
				    	 <span class="label label-success radius">@if( $v->status == 1) 未付款 @elseif( $v->status == 2)未发货 @elseif( $v->status == 3)已发货 @elseif( $v->status == 4)交易完成已收货@endif</span>
				     </td>
				  	


				     <td class="td-manage" style="text-align:center;vertical-align:middle;">
					
						<i class="Hui-iconfont" id="abcc" onclick ="shows({{  $v->oid  or '' }});" >&#xe720;</i>
							  
						

						<a style="text-decoration:none" onclick="picture_stop(this,'10001')" href="/admin/orders/putaway/{{ $v->oid  or ''}}"> 
							<i class="Hui-iconfont"></i>
							</a> 
							
						<a style="text-decoration:none"  class="ml-5"  onclick ="edits({{  $v->oid  or '' }});" title="编辑"><i class="Hui-iconfont"></i></a>
						
						
						 <a style="text-decoration:none"  class="ml-5"  onclick ="deleted({{  $v->oid  or '' }});" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
						@if($v->status == 1)
							<div >未付款</div>
						@elseif($v->status == 2)
							<div >
								<a style="text-decoration:none;"  href="/admin/orders/orderr/{{ $v->oid  }}" title="发货" >
							发货
							</a> 
						</div>
							  
						@elseif($v->status == 3)
							<div >已发货</div>
						@elseif($v->status == 4)
							<div >交易完成已收货</div>
						@endif
				
					</td>
					
				  </tr>
				  	
				</tbody>
					@endforeach
		</table>
		
	</div>
<div style="float:right;top:1px;">{{$data->appends($request)->links() }}</div>


<script src="/d/layui-v2.4.5/layui/layui.js"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/laydate/default/laydate.css"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/code.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.mobile.css"></script>
<script src="/d/layui-v2.4.5/layui/css"></script>
<script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
	<script>
		function shows(id){
		layer.open({
			  type: 2,
			  title: '订单详情',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['1280px', '80%'],
			  content: '/admin/orders/'+id//iframe的url
			}); 
		} 

		function edits(id){
		layer.open({
			  type: 2,
			  title: '订单修改',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['780px', '90%'],
			  content: '/admin/orders/'+id+'/edit' 
			  }); 
		} 
				var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

			parent.layer.close(index); //再执行关闭
			if(index)
			{
				window.parent.location.reload();

			}
			
function deleted(id){
			
			layer.confirm('确认删除吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
				var url = '/admin/orders/orders/'+id;
			  $.get(url , function(res){
					if(res) {
						layer.msg('删除成功',{icon: 1});
						$('#tr'+id).remove();
						
					} else {
						layer.msg('删除失败');
					}
				});
				
			});
		}





	</script>