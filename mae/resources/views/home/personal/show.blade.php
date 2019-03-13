


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



	
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort" border="1px solid red" style="width:100%">
			<thead>
				<tr class="text-c">
				
					<th style="width:25%" >商品名称</th>
					<th style="width:25%" >商品图片</th>
					<th style="width:8%" >购买单价</th>
					<th style="width:8%" >购买数量</th>
					<th style="width:8%" >小计</th>
				
										
				</tr>
			</thead>
		@foreach( $orders as $k=>$v)
			<tbody>
			
        			@foreach($goods as $kk=>$vv)
				  <tr class="text-c" style="text-align:center">
				    		
				    <td >{{ $vv->gname }}</td>
				  
				    <td >
				    	<img src="{{ asset('/uploads/gpic/'.$vv->goodspic[0]->gpic) }}" style="width:44%;height:28%;margin: 0 auto;" >	
				    </td>
				
				    <td >{{ $v->ordersdetail->price }}</td>
				    <td >{{ $v->ordersdetail->cnt }}</td>
				    <td >￥{{ $v->sum }} </td>
				    
				  @endforeach

				  

					
				  </tr>
				
				  	
				</tbody>
				@endforeach
		</table>
		
	</div>



