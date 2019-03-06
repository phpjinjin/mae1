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



	
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
				
					<th width="80">商品名称</th>
					<th width="100">商品图片</th>
					<th width="100">购买单价</th>
					
					<th width="60">购买数量</th>
					<th width="60">小计</th>
										
				</tr>
			</thead>
			@foreach($ordersdetail as $k=>$v)
			<tbody>
			
        			
				  <tr class="text-c">
				    		
				    <td style="text-align:center;vertical-align:middle;">{{ $v->goods->gname  or ''}}</td>
				    @foreach($v->goods->goodspic as $kk=>$vv)
				    <td style="text-align:center;vertical-align:middle;">
				    	<img src="{{ asset( 'uploads/gpic/'.$vv->gpic) }}">	
				    </td>
				    @endforeach
				    <td style="text-align:center;vertical-align:middle;">{{ $v->price  or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">{{ $v->cnt or ''}}</td>
				    <td style="text-align:center;vertical-align:middle;">￥{{$v->price * $v->cnt}}  </td>
				    
				  

				  

					
				  </tr>
				
				  	
				</tbody>
				@endforeach
		</table>
		
	</div>



