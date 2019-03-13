<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="/r/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/r/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/r/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/r/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/r/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/r/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">

				</div>
			</article>
		</header>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
    <form class="am-form am-form-horizontal" action="/home/center/store/{{$user->uid}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<!--头像 -->
						<div class="user-infoPic">
							@foreach($userd as $k=>$v)
							<div class="filePic">
								<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" id="file" name="pic" onchange="changepic(this)">
								<img class="am-circle am-img-thumbnail" 
	
							  @if($v->face != null) 
		                      src="{{asset('/uploads/users/'.$v->face)}}"
		                      @else 
		                      src="/homes/images/user.jpg"
		                      @endif alt="" title="点击图片进行上传" id="show">
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>
								@if($user->pname == '')您暂未设置用户名
								@elseif($user->pname != ''){{ $user->pname }}
								@endif
								</i></b></div>								
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="pname" value="{{ $user->pname }}" placeholder="请输入您的昵称">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="uname" name="uname" value="{{ $user->uname }}" placeholder="请输入您的姓名">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" data-am-ucheck @if($user->sex == 0) checked @else '' @endif > 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck @if($user->sex == 1) checked @else '' @endif> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" data-am-ucheck @if($user->sex == 2) checked @else '' @endif> 保密
										</label>
									</div>
								</div>
								<div class="am-form-group">
									
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" placeholder="telephonenumber" type="tel" value="{{ $v->phone }}">

									</div>
									
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" value="{{ $v->email }}" name="email">

									</div>
								</div>
								@endforeach
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<input type="submit" value="确定保存">
								</div>

					</form>
						</div>

					</div>

				</div>

			</div>

			
		</div>

	</body>

</html>
<script type="text/javascript">
function changepic() {
        var reads= new FileReader();
        f=document.getElementById('file').files[0];
        reads.readAsDataURL(f);
        reads.onload=function (e) {
            document.getElementById('show').src=this.result;
        };
    }

</script>
