@extends('admin.public.ifram')
	<h2 align="center" style="color: #aaa;">网站信息管理</h2>
	
	<div style="width: 200px; float: right; margin-right: 25%;margin-top: -10px">
		<a href="/admin/web/edit"><button class="btn btn-warning">修改网站信息</button></a>
	</div>
	<div style="float: right; margin-right: 20%;margin-top: -10px">
		<table align="center" class="table table-border table-bordered table-bg mt-20" style="width: 800px;">
			<thead>
				<tr>
					<th colspan="2" scope="col">网站信息</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="30%">网站名称</th>
					<td><span id="web_name">{{$webs[0]->web_name}}</span></td>
				</tr>
				<tr>
					<th width="30%">网站描述</th>
					<td><span id="describe">{{$webs[0]->describe}}</span></td>
				</tr>
				<tr>
					<th width="30%">网站logo</th>
					<td><span id="logo" style="width: 200px;height: 200px"><img style="width: 250px;height: 100px" src="{{ asset('/uploads/web/'.$webs[0]->logo) }}"></span></td>
				</tr>
				<tr>
					<th width="30%">网站备案号</th>
					<td><span id="filing">{{$webs[0]->filing}}</span></td>
				</tr>
				<tr>
					<th width="30%">联系方式</th>
					<td><span id="telephone">{{$webs[0]->telephone}}</span></td>
				</tr>
				<tr>
					<th width="30%">版权信息</th>
					<td><span id="cright">{{$webs[0]->cright}}</span></td>
				</tr>
				<tr>
					<th width="30%">网站状态</th>
					
					@if($webs[0]->status == 2)
						<td><span id="closeweb">网站维护中</span></td>
					@else
						<td><span id="openweb">网站运营中</span></td>
					@endif
				</tr>
					
			</tbody>
		</table>
	</div>
 