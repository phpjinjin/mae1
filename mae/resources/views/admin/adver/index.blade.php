@extends('admin.public.ifram')


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
				<th width="60"><input name="" type="checkbox" value="" >全选</th> 
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
        			
				  <tr class="text-c">
				    <td>
				      
				  	</td>
				    <td>{{$v->amsg}}</td>
				    <td>{{ $v->atitle }}</td>
				    <td>
				      <a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">
				        <img width="110" class="picture-thumb" src="{{ asset( 'uploads/adver/'.$v->apic) }}"></a>
				    </td>
				    <td class="text-l">{{ $v->aurl }}</td>
				    
				    <td class="td-status">
				    	
				    	 <span class="label label-success radius">@if( $v->astatus == 0) 已投放 @else已下刊@endif</span>
				    		    	
				     </td>


				     <td class="td-manage">
					<form action="/admin/adver/{{ $v->advid }}" method="post">
						<a style="text-decoration:none" onclick="picture_stop(this,'10001')" href="/admin/adver/{{ $v->advid }}" @if($v->astatus == 0)title="下刊" @else title="投放" @endif>
							<i class="Hui-iconfont">@if($v->astatus == 0)&#xe6de;@else &#xe6dc; @endif</i>
							</a> 
						<a style="text-decoration:none" class="ml-5" onclick="picture_edit('图库编辑','picture-add.html','10001')" href="/admin/adver/{{ $v->advid }}/edit" title="编辑"><i class="Hui-iconfont"></i></a>
						
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" style="background:none;border:none;" class="ml-5" onclick="active_del(this,'10001')" style="background:none;"><i class="Hui-iconfont" title="删除"></i></button>&nbsp;&nbsp;
					</form>
					</td>
				  </tr>
				</tbody>

				@endforeach
				<form action="/admin/adver/{{ $v->advid }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					<input type="submit" value="删除所选">		
					</form>
		</table>
		
	</div>
<div style="float:right;top:1px;">{{ $data->appends($request)->links() }}</div>

