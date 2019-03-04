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
		<form action="/admin/adver" method="get">
		
		<input type="text" name="search" value="{{ $request['search'] or '' }}" placeholder=" 请输入广告标题" style="width:250px;margin-left:40%" class="input-text" >
		<input   type="submit" value="搜索 " style="width:4%;height:4%;background-color:green;color:white">
			</form>
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		
	</span>
	 <span class="r">共有数据:
	 	<strong>{{ $res1 }}</strong> 条
	 </span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
				
					<th width="80">客户信息</th>
					<th width="100">广告标题</th>
					<th width="100">图片</th>
					
					<th width="50">跳转地址</th>
					
					<th width="60">发布状态</th>
					<th width="200">操作</th>
				</tr>
			</thead>
			

			<tbody>
				
				  @foreach($data as $k=>$v)
        			
				  <tr class="text-c" id="tr{{ $v->advid }}">
				  
				    <td>{{$v->amsg or ''}}</td>
				    <td>{{ $v->atitle or '' }}</td>
				    <td>
				      <a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">
				        <img width="110" class="picture-thumb" src="{{ asset( 'uploads/adver/'.$v->apic) }}"></a>
				    </td>
				    <td class="text-l">{{ $v->aurl or '' }}</td>
				    
				    <td class="td-status">
				    	
				    	 <span class="label label-success radius">@if( $v->astatus == 0) 已投放 @else已下刊@endif</span>
				    		    	
				     </td>
				     

				     <td class="td-manage">
					<form action="/admin/adver/{{ $v->advid }}" method="post">
						<a style="text-decoration:none" onclick="picture_stop(this,'10001')" href="/admin/adver/{{ $v->advid or '' }}" @if($v->astatus == 0)title="下刊" @else title="投放" @endif>
							<i class="Hui-iconfont">@if($v->astatus == 0)&#xe6de;@else &#xe6dc; @endif</i>
							</a> 
						<a style="text-decoration:none" class="ml-5" onclick="edits({{ $v->advid }})"  title="编辑"><i class="Hui-iconfont"></i></a>
						<a style="text-decoration:none"  class="ml-5"  onclick ="deleted({{  $v->advid  or '' }});" num="{{  $v->advid  or '' }}" title="编辑"><i class="Hui-iconfont">&#xe6e2;</i></a>

							{{ csrf_field() }}
							{{ method_field('DELETE') }}
						
					</form>
					</td>
				  </tr>
				</tbody>

				@endforeach
			
			
		</table>
		
	</div>
<div style="float:right;top:1px;">{{ $data->appends($request)->links() }}</div>



<script src="/d/layui-v2.4.5/layui/layui.js"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/laydate/default/laydate.css"></script>
<script src="/d/layui-v2.4.5/layui/css/modules/code.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.css"></script>
<script src="/d/layui-v2.4.5/layui/css/layui.mobile.css"></script>
<script src="/d/layui-v2.4.5/layui/css"></script>
<script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
<script >
function edits(id){
		layer.open({
			  type: 2,
			  title: '文章修改',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['780px', '90%'],
			  content: '/admin/adver/'+id+'/edit' 
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
		var url = '/admin/adver/adver/'+id;
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