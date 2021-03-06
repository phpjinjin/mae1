<!DOCTYPE html>
<html>
<head>
	<title>Mae后台登录系统</title>
	<link rel="stylesheet" href="/l/css/style.css">
	<link href="../../../images/mae.ico" type="image/x-icon" rel="shortcut icon">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Simple Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps-and-Meta-Tags -->

</head>

<body>
    <h1>Mae后台登录系统</h1>
    <div class="container w3">
        <h2>现在登录</h2>
		<form action="/admin/login" method="post">
			@if (session('success'))
                <div class="mws-form-message success" style="background: #E8E8E3;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mws-form-message error" style="background: orangered;">
                    {{ session('error') }} 
                </div>
            @endif
             <!-- 显示错误消息 结束 -->
			{{ csrf_field() }}
			<div class="username">
				<span class="username" style="height:19px">账号:</span>
				<input type="text" name="account" class="name" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username"style="height:19px">密码:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">记得我
　　
<br>
				<a href="#">忘记了密码</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" class="login" value="Login">
			</div>
			<div class="clear"></div>
		</form>
	</div>
	<div class="footer-w3l">
		<p> 某某公司后台登录系统</p>
	</div>
</body>
</html>