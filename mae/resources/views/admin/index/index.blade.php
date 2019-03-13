<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/d/lib/html5shiv.js"></script>
<script type="text/javascript" src="/d/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/d/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/d/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/d/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/d/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/d/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/d/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>朝花夕拾</title>
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/d/aboutHui.shtml">朝花夕拾</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/d//aboutHui.shtml">H-ui</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">Mae</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.blade.php')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.blade.php')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.blade.php')"><i class="Hui-iconfont">&#xe60d;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加商品','/admin/goods','','510')"><i class="Hui-iconfont">&#xe620;</i> 商品</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>超级管理员</li>
				<li class="dropDown dropDown_hover">
					<a href="/d/#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
						<li><a href="/d/#">切换账户</a></li>
						<li><a href="/d/#">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="/d/#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
	<dl id="menu-admin">
		<dt><i class="Hui-iconfont">&#xe62e;</i><a style="text-decoration: none;" data-href="/welcome" data-title="后台首页">&nbsp;后台首页</a></dt>
	</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/user" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					<li><a data-href="/admin/user/create" data-title="添加用户" href="javascript:void(0)">添加用户</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-admin">
		<dt><i class="Hui-iconfont">&#xe62d;</i> 权限管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a data-href="/admin/rbac/roles" data-title="角色列表" href="javascript:void(0)">权限列表</a></li>
				<li><a data-href="/admin/rbac/roles/create" data-title="添加角色" href="javascript:void(0)">添加角色</a></li>
				<li><a data-href="/admin/rbac/roles/nodeadd" data-title="添加权限节点" href="javascript:void(0)">添加权限节点</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="member-list.blade.php" data-title="用户列表" href="javascript:;">用户列表</a></li>
					<li><a data-href="member-del.blade.php" data-title="删除的用户" href="javascript:;">删除的会员</a></li>
					<li><a data-href="member-level.blade.php" data-title="等级管理" href="javascript:;">等级管理</a></li>
					<li><a data-href="member-scoreoperation.blade.php" data-title="积分管理" href="javascript:;">积分管理</a></li>
					<li><a data-href="member-record-browse.blade.php" data-title="浏览记录" href="javascript:void(0)">浏览记录</a></li>
					<li><a data-href="member-record-download.blade.php" data-title="下载记录" href="javascript:void(0)">下载记录</a></li>
					<li><a data-href="member-record-share.blade.php" data-title="分享记录" href="javascript:void(0)">分享记录</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 文章管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/works/create" data-title="文章添加" href="javascript:void(0)">文章添加</a></li>
					<li><a data-href="/admin/works/" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
			</ul>
		</dd>
	</dl>

		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 类别管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/cate/create" data-title="添加类别" href="javascript:void(0)">添加类别</a></li>
					<li><a data-href="/admin/cate" data-title="查看类别" href="javascript:void(0)">查看类别</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 属性管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<!-- <li><a data-href="/admin/goodval/create" data-title="添加属性" href="javascript:void(0)">添加属性</a></li> -->
					<li><a data-href="/admin/goodval" data-title="商品属性列表" href="javascript:void(0)">属性列表</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 品牌管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="product-brand.blade.php" data-title="添加品牌" href="javascript:void(0)">添加品牌</a></li>
					<li><a data-href="product-list.blade.php" data-title="品牌列表" href="javascript:void(0)">品牌列表</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/goods/create" data-title="添加商品" href="javascript:void(0)">添加商品</a></li>
					<li><a data-href="/admin/goods" data-title="商品管理" href="javascript:void(0)">商品管理</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="http://h-ui.duoshuo.com/admin/" data-title="评价列表" href="javascript:;">评价列表</a></li>
					<li><a data-href="feedback-list.blade.php" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
			</ul>
		</dd>
	</dl>
		
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 广告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/adver/create" data-title="添加广告" href="javascript:void(0)">添加广告</a></li>
					<li><a data-href="/admin/adver" data-title="广告列表" href="javascript:void(0)">广告列表</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/orders" data-title="浏览订单" href="javascript:void(0)">浏览订单</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 轮播图管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/slid/create" data-title="添加轮播" href="javascript:void(0)">添加轮播</a></li>
					<li><a data-href="/admin/slid" data-title="轮播列表" href="javascript:void(0)">轮播列表</a></li>
			</ul>
		</dd>
	</dl>	
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/link/create" data-title="添加链接" href="javascript:void(0)">添加链接</a></li>
					<li><a data-href="/admin/link" data-title="链接列表" href="javascript:void(0)">链接列表</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="charts-1.blade.php" data-title="折线图" href="javascript:void(0)">折线图</a></li>
					<li><a data-href="charts-2.blade.php" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>
					<li><a data-href="charts-3.blade.php" data-title="区域图" href="javascript:void(0)">区域图</a></li>
					<li><a data-href="charts-4.blade.php" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>
					<li><a data-href="charts-5.blade.php" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>
					<li><a data-href="charts-6.blade.php" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>
					<li><a data-href="charts-7.blade.php" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 网站管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/web" data-title="网站设置" href="javascript:void(0)">网站设置</a></li>
			</ul>
		</dd>
	</dl>
</div>
</aside>

<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>

<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="/d/welcome.blade.php">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
		</div>

</div>
<!-- 内容开始 -->

<div id="iframe_box" class="Hui-article">

<div class="show_iframe">
	<div style="display:none" class="loading"></div>
		<iframe scrolling="yes" frameborder="0" src="welcome.blade.php"></iframe>
	</div>
</div>
<!-- 内容结束 -->
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/d/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/d/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/d/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/d/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="/d/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 


</body>
</html>