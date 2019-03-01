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
		<form action="/admin/works" method="get">
		
		<input type="text" name="search" value="{{ $request['search'] or '' }}" placeholder=" 请输入文章标题" style="width:250px;margin-left:40%" class="input-text" >
		<input   type="submit" value="搜索 " style="width:4%;height:4%;background-color:green;color:white">
			</form>
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		
	</span>
	 <span class="r">共有数据:
	 	<strong>{{ $res1 or ''}}</strong> 条
	 </span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
				<th width="60"><input name="" type="checkbox" value="" >全选</th> 
					<th width="80">文章标题</th>
					<th width="100">文章作者</th>
					<th width="100">图片</th>
					
				
					
					<th width="60">发布状态</th>
					<th width="200">操作</th>
				</tr>
			</thead>
			<tbody>
				  @foreach($data as $k=>$v )
        			
				  <tr class="text-c">
				    <td>
				      <input name="ddd" type="checkbox" value="{{ $v->wid  or ''}}">
				  	</td>
				    <td>{{ $v->wtitle  or ''}}</td>
				    <td>{{ $v->wuname  or '' }}</td>
				    <td>
				      <a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">
				        <img width="110" class="picture-thumb" src="{{ asset( 'uploads/works/'.$v->wpic) }}"></a>
				    </td>
				   
				    
				    <td class="td-status">
				    	
				    	 <span class="label label-success radius">@if( $v->wstatus == 1) 已投放 @else已下刊@endif</span>
				    		    	
				     </td>
				     <label id="yydd" hidden>{{ $v->wcontent  or ''}}</label>


				     <td class="td-manage">
					<form action="/admin/works/{{ $v->wid }}" method="post">
						<i class="Hui-iconfont" id="abcc" onclick ="shows({{  $v->wid  or '' }});" >&#xe720;</i>
							
					
						<a style="text-decoration:none" onclick="picture_stop(this,'10001')" href="/admin/works/putaway/{{ $v->wid  }}" @if($v->astatus == 1)title="下刊" @elseif($v->astatus == 2) title="投放" @endif>
							<i class="Hui-iconfont">@if($v->wstatus == 1)&#xe6de;@else &#xe6dc; @endif</i>
							</a> 
						<a style="text-decoration:none"  class="ml-5"  onclick ="edits({{  $v->wid  or '' }});" title="编辑"><i class="Hui-iconfont"></i></a>
						
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" style="background:none;border:none;" class="ml-5"  id="up"   style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
					</form>
					</td>
				  </tr>
				</tbody>

				@endforeach
				<form action="/admin/works/{{ $v->wid   or ''}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					<input type="submit" value="删除所选">		
					</form>
		
			
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
	<script>
		function shows(id){
		layer.open({
			  type: 2,
			  title: '文章详情',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['580px', '90%'],
			  content: '/admin/works/'+id//iframe的url
			}); 
		} 

		function edits(id){
		layer.open({
			  type: 2,
			  title: '文章修改',
			  shadeClose: true,
			  shade: 0.6,
			  area: ['780px', '90%'],
			  content: '/admin/works/'+id+'/edit' 
			  }); 
		} 
				var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

			parent.layer.close(index); //再执行关闭
			if(index)
			{
				window.parent.location.reload();

			}
			



	</script>