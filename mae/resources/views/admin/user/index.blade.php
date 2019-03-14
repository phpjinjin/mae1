
@extends('admin.public.ifram')
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页
	 <span class="c-gray en">&gt;
	</span> 管理员管理 
	<span class="c-gray en">&gt;
	</span> 管理员列表 
	<span class="c-gray en">&gt;
	</span> 
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i>
	</a>
</nav>
<div class="page-container">
	<div class="text-c"> 
	<form action="/admin/user" method="get">
			<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" value="{{ $search }}" name="search" >
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
		
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="5">管理员列表</th>
				<th scope="col" colspan="4" >分页条数
				<select name="count">
					<option value="5" @if ($count ==5) selected @endif >5</option>
					<option value="10" @if ($count ==10) selected @endif>10</option>
					<option value="20" @if ($count ==20) selected @endif>20</option>
				</select> 
			<th>
</form>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">账号</th>
				<th width="150">姓名</th>
				<th width="150">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>

				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $k=>$v)	
		<tr class="text-c">
				
				<td><input type="checkbox" value="{{ $v->aid }}" name=""></td>
				<td>{{ $v->aid }}</td>
				<td>{{ $v->account }}</td>
				<td>{{ $v->auname }}</td>
				<td>@if($v->sex == 0)
					男
					@elseif($v->sex == 1)
					女
					@else($v->sex == 2)
					保密
					@endif	
				</td>
				<td>{{ $v->phone}}</td>
				<td>{{ $v->email}}</td>
				<td>@if( $v->power == 0)
					超级管理员
					@elseif($v->power ==
					 1)
					总编
					@elseif($v->power == 2)
					栏目主辑
					@else($v->power == 3)
					栏目编辑
					@endif
				


				</td>
				<td>{{$v->created_at}}</td>
				<td class="td-manage">
					<a title="修改" href="/admin/user/{{ $v->aid }}/edit" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6df;
						</i>
					</a> 
					<form action="/admin/user/{{$v->aid}}" method="post" style="display:inline-block";>
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="删除"  class="btn btn-danger btn-xs dropdown-toggle">
					</form>
					<input type="submit" value="角色"  class="btn btn-warning btn-xs dropdown-toggle">
				</td>
		 	
		</tr>
		@endforeach
		</tbody>
	</table>
	<div style="float: right;top:1px;">
		{{ $data->appends($request)->links() }}
	</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>

</body>
</html>