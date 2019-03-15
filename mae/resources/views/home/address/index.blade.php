@extends('home.personal.index')


@section('order')
@if(session('xgcg'))
<script type="text/javascript">
  layer.msg(' 修改成功');
</script>
@endif
@if(session('tianjia'))
<script type="text/javascript">
  layer.msg(' 添加成功');
</script>
@endif
@if(session('szcg'))
<script type="text/javascript">
  layer.msg(' 设置成功');
</script>
@endif
@if(session('mrerror'))
<script type="text/javascript">
  layer.msg(mrerror);
</script>
@endif
@section('none')
<div class="leftNav none">
@endsection


   
            <p></p>
            <div class="mem_tit">收货地址</div>


            <div class="mem_tit">
                <a href="/home/address/create"><img src="/o/images/add_ad.gif" /></a>
            </div>
            @foreach($data as $k=>$v)
            <div class="address" id="add{{$v->addid}}">
                <div class="a_close"><img src="/o/images/a_close.png" id="img{{$v->addid}}" onclick="del({{$v->addid}})" /></div>
                <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  @if($v->status == 1)
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">默认地址</td>
                  </tr>
                  @else
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">{{$v->aname}}的地址</td>
                  </tr>
                  @endif
                  <tr>
                    <td align="right" width="80">收货人：</td>
                    <td>{{$v->aname}}</td>
                  </tr>
                  <tr>
                    <td align="right">邮政编码：</td>
                    <td>{{$v->code}}</td>
                  </tr>
                  <tr>
                    <td align="right">配送区域：</td>
                    <td>{{$v->region}}</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td>{{$v->addres}}</td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td>{{$v->phone}}</td>
                  </tr>
                </table>
                <p align="right">
                  @if($v->status == 2)
                  <a href="/home/address/moren/{{$v->addid}}" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp;
                  @endif
                  <a href="/home/address/edit/{{$v->addid}}" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp;
                </p>
            </div>
            @endforeach
        <div style="float:right;margin-right: 25px">{{ $data->appends($res)->links() }}</div>
        


    <script type="text/javascript">
      function del(id){
        layer.confirm('确认删除吗？', {
          btn: ['确认','取消'] //按钮
        },function(){
          var url = '/home/address/delete/'+id;
            $.get(url , function(res){
            if(res) {
              layer.msg(res,{icon: 1});
              $('#add'+id).remove();
            } else {
              layer.msg("sa",{icon: 1});
            }
          });
        });




      }
    </script>
@endsection