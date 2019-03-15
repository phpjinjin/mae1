
@extends('home.personal.index')

@section('order')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
@if (session('qxcg'))
    <script type="text/javascript">
        layer.msg(' 已取消收藏');
    </script>
@endif
@if (session('qxerror'))
    <script type="text/javascript">
        layer.msg(' 取消收藏失败');
    </script>
@endif

<script type="text/javascript" src="/o/js/n_nav.js"></script>


		<div class="m_right" style="width: 979px;">
            <p></p>
            <div class="mem_tit">
            	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现4件</span>我的收藏
            </div>
            <div class="fresh_mid" style="width: 979px">
	           	<ul>
                    @foreach($goods as $k=>$v)
	                <li onmouseenter="test({{$v->gid}})" onmouseleave="test2({{$v->gid}})">
	                    <div class="name"><a href="#">{{$v->gname}}</a>
	                    	<a href="/home/collect/delete/{{$v->gid}}" id="{{$v->gid}}" style="background: #aaa;margin-right: 10px" hidden >
	                    		&nbsp;取消收藏&nbsp;</a>
	                    </div>
	                    <div class="price">
	                        <font>￥<span>{{$v->price}}</span></font>
	                    </div>
	                    <div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="185" height="155" /></a></div>
	                </li>
                    @endforeach
	            </ul>

        	</div>
        	<div class="pages" style="margin-right: 30%; margin-top: 200px">
            	<a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
            </div>
		</div>
  
<script type="text/javascript">
	function test(gid){
		$('#'+gid).removeAttr('hidden');
	}
	function test2(gid){
		$('#'+gid).attr('hidden','true');
	}
</script>
@endsection