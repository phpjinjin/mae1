<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
  <script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/js/bootstrap.js" />
</head>
<body>
  <!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="btn btn-primary btn-lg btn-block">
                    layer.msg(session('success'),{icon:1});
                </div>
            @endif

            @if (session('error'))
                <div class="btn btn-default btn-lg btn-block">
                    layer.msg(session('error'),{icon:2});
                </div>
            @endif
<!-- 显示错误消息 结束 -->

  <form action="/admin/column/{{ $column->id }}" method="post" style="display:block; width:500px; margin:0 auto;">
  <div class="form-group">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <label for="exampleInputEmail1">栏目标题</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Gname" value="{{ $column->title }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">跳转地址</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Gname" name="url" value="{{ $column->url }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">栏目位置</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="sort" value="{{ $column->sort }}">
  </div>
   <button type="submit" class="btn btn-default">修改</button>
</form>
</body>
</html>