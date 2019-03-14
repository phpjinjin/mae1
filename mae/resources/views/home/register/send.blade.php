<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>朝花夕拾</title>
	<link href="../../../images/mae.ico" type="image/x-icon" rel="shortcut icon">
</head>
<body>
	{{ csrf_field() }}
	<h1>恭喜您:<font style="color: #408F2C;">{{ $email }}</font>测试<a href="http://www.mae.com/home/register/changestatus/{{ $id }}/{{ $token }}">测试</a></h1>
	
	
</body>
</html>