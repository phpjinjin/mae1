<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
	<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/js/bootstrap.js" />
</head>
<body>
	<form style="display:block; width:500px; margin:0 auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">商品名称</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Gname" value="{{ $gname }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">商品材料</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Gname" value="{{ $goodval->wood }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">商品包装</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" value="{{ $goodval->pack }}">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">花语</label>
    <textarea class="form-control" rows="3">{{ $goodval->lang }}</textarea>
  </div>
  
</form>
</body>
</html>