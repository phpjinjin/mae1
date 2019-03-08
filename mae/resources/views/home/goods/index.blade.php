@extends('home.index.content')
@section('content')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>

@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
<style type="text/css">
    #cart{
        text-decoration: none;
        font-family:STHeiti;
    }
    #cart:hover{
        font-weight:bold;
    }
</style>
@endsection
@section('none')
<div class="leftNav none">
@endsection
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
        	<ul>
            	<li>
                    <div class="img"><a href="#"><img src="/o/images/his_1.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/o/images/his_2.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/o/images/his_3.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/o/images/his_4.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/o/images/his_5.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
        	</ul>
        </div>
        <div class="l_list">
        	<div class="list_t">
            	<span class="fl list_or">
                	<a href="#" class="now">默认</a>
                    <a href="#">
                    	<span class="fl">销量</span>                        
                        <span class="i_up">销量从低到高显示</span>
                        <span class="i_down">销量从高到低显示</span>                                                     
                    </a>
                    <a href="#">
                    	<span class="fl">价格</span>                        
                        <span class="i_up">价格从低到高显示</span>
                        <span class="i_down">价格从高到低显示</span>     
                    </a>
                    <a href="#">新品</a>
                </span>
                <span class="fr">共发现<span style="color:red;">{{ $tiao }}</span>件</span>
            </div>
            <div class="list_c">
            	
                <ul class="cate_list">
                	@foreach($goods as $k=>$v)
                	<li>
                    	<div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{ $v->price }}</span></font> &nbsp;&nbsp;&nbsp;&nbsp; 销量:{{ $v->salecnt }}
                        </div>
                        <div class="name"><a href="#">{{ $v->gname }}</a></div>
                        <div class="carbg">
                        	<a id="shou{{$v->gid}}" onclick="shou({{ $v->gid }})" class="ss">收藏</a>
                            <a onclick="carts({{ $v->gid }})" class="j_car" id="cart">加入购物车</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div style="float:right;">
                    {{ $goods->appends($request)->links() }}</a>
                </div>
                
                
                
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function shou(gid){
            
            var url = '/home/collect/add/'+gid;
            $.get(url , function(res){
                if(res){
                    layer.msg('操作成功',{icon: 1});
                    $('#shou'+gid).text(res);
                }else{
                    layer.msg(res,{icon: 2});
                }
            });
        }
    </script>
    <script type="text/javascript">
        function carts(gid){
            var cnt = 1;
            var url = '/home/carts/add/'+cnt+'/'+gid;
            $.get(url , function(res){
                if(res) {
                    layer.alert('已加入购物车', {
                      icon: 1,
                      skin: 'layer-ext-moon' 
                    })
                } else {
                    layer.msg('加入购物车失败',{icon: 1});
                }
            });
        }
                    
                    
    </script>
@endsection