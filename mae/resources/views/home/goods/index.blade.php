@extends('home.index.content')
@section('content')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
<script type="text/javascript" src="\o\js/milk_ban.js"></script>
<script type="text/javascript" src="\o\js/paper_ban.js"></script>
<script type="text/javascript" src="\o\js/baby_ban.js"></script>
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>

<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/o/css/pages.css">
<style type="text/css">
    #cart{
        text-decoration: none;
        font-family:STHeiti;
    }
    #cart:hover{
        font-weight:bold;
    }

    </style>
</style>

@endsection
@section('none')

<div class="leftNav none">
@endsection

    <div class="content">
        <div class="cate_nav">
            @foreach($cate_data as $k=>$v)

            <dl>
                <dt><a>{{ $v->gtname }}</a></dt>
                @foreach($v['sub'] as $kk=>$vv)

                <dd><a onclick="types({{$vv->tid}})">{{ $vv->gtname }}</a></dd>
                @endforeach
            </dl>
            @endforeach
        </div>
        <script type="text/javascript">
            function types(tid){
                location.href = "/home/goods/?tid="+tid;
            }
        </script>
        <!--Begin Banner Begin-->
        <div class="nban">      
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($getSlid as $k=>$v)

                    @if($v->nid==1)
                    <li><a href="/home/goods/{{ $v->surl }}"><img src="{{ asset('uploads/slid/'.$v->simg) }}" width="977" height="401" /></a></li>
                    @endif
                    @endforeach
                </ul>   
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->        
    </div>






    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl" style="font-size:14px;">浏览量排行</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
        	<ul>
                @for($i=0;$i < 5;$i++)
            	<li>
                    
                    <div class="img"><a href="/home/goods/{{ $good_hot[$i]->gid }}"><img src="{{ asset('/uploads/gpic/'.$good_hot[$i]->goodspic[0]->gpic) }}" width="185" height="162" /></a></div>
                	<div class="name"><a href="/home/goods/{{ $good_hot[$i]->gid }}">{{ $good_hot[$i]->gname }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $good_hot[$i]->price }}</span></font> &nbsp;
                    </div>
                </li>
                @endfor
        	</ul>
        </div>
        <div class="l_list">
        	<div class="list_t">
            	<span class="fl list_or">
                	<a href="#" class="now">默认</a>
                    <a href="/home/goods/?msg=salecnt">
                    	<span class="fl">销量</span>                                     
                    </a>
                    <a href="#">
                    	<span class="fl">价格</span>                        
                        <span class="i_up" title="价格从低到高显示" onclick="di()"></span>
                        <span class="i_down" title="价格从高到低显示" onclick="gao()"></span>  
                    </a>
                    <a href="/home/goods/?msg=time">新品</a>
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
                <div style="float:right;" id="pages">
                    {{ $goods->appends($request)->links() }}
                </div>
                
                
                
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function shou(gid){
            var url = '/home/collect/add/'+gid;
            $.get(url , function(res){
                if(res){
                    layer.msg('操作成功');
                    $('#shou'+gid).text(res);
                }else{
                    layer.msg(res);
                }
            });
        }
    
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
                    
        function di(){
            location.href = "/home/goods/?msg=price1";
        }
        function gao(){
            location.href = "/home/goods/?msg=price2";
        }
    </script>
@endsection