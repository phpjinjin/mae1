@extends('home.index.content')
@section('content')
@section('menu')
<script type="text/javascript" src="\d\layui-v2.4.5\layui\css\modules\layer\default\layer.css"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.all.js"></script>
<script type="text/javascript" src="\d\layui-v2.4.5\layui\layui.js"></script>
@endsection

@if (session('gologin'))
    <script type="text/javascript">
            layer.alert('请先前往登录', {
            skin: 'layui-layer-lan'
            ,closeBtn: 0
            ,anim: 1 //动画类型
          });
    </script>
@endif
@section('none')
<div class="leftNav">
@endsection
<div class="i_bg bg_color">
    <div class="i_ban_bg">
        <!--Begin Banner Begin-->
        <div class="banner">        
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($getSlid as $k=>$v)
                    @if($v->nid==1)
                    <li><a href="/home/goods/{{ $v->surl }}"><img src="{{ asset('uploads/slid/'.$v->simg) }}" width="740" height="401" /></a></li>
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
        // var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
            <div class="news_t">
                <span class="fr"><a href="#">更多 ></a></span>网站公告
            </div>
            <ul>
                <li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
                <li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
            </ul>
        </div>
    </div>
    <!--Begin 热门商品 Begin-->

    <!--Begin 鲜花 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">1F</span>
        <span class="fl">花束 <b>·</b> 花篮</span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                    @foreach($huashu as $k => $v)
                    <!-- 遍历热卖鲜花 -->
                        <li>
                            <a href="#"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="211" height="286" /></a>
                        </li>
                    @endforeach
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt" style="background-color: pink">
                <div class="fresh_txt_c">
                    <!-- 遍历花色 -->
                    <a href="#">进口水果</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <!-- 遍历部分展示鲜花 -->
                @foreach($huashu as $k=>$v)
                <li>
                    <div class="name"><a href="#">{{ $v->gname }}</a></div>
                    <div class="price">
                        <font>￥<span>{{ $v->price }}</span></font>
                    </div>
                    <div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="180" height="155" /></a></div>
                    
                </li>
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[2]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[1]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 鲜花 End-->

    <!--Begin 盆栽 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">2F</span>
        <span class="fl">盆栽</span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <!-- 遍历热卖鲜花 -->
                        <li>
                            <a href="#"><img src="{{ asset('/uploads/gpic/'.$pengzai[4]->goodspic[0]->gpic) }}" width="211" height="286" /></a>
                        </li>
                    </ul> 
                </div>   
            </div>
            <div class="fresh_txt" style="background-color: pink">
                <div class="fresh_txt_c">
                    <!-- 遍历花色 -->
                    <a href="#">进口水果</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <!-- 遍历部分展示鲜花 -->
                @foreach($pengzai as $k=>$v)
                <li>
                    <div class="name"><a href="#">{{ $v->gname }}</a></div>
                    <div class="price">
                        <font>￥<span>{{ $v->price }}</span></font>
                    </div>
                    <div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="180" height="155" /></a></div>
                    
                </li>
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[2]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[1]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 盆栽 End-->
    <a name="tuijian"></a>
    <!--Begin 精品推荐 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">3F</span>
        <span class="fl">精品推荐</span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <!-- 遍历热卖鲜花 -->
                        <li>
                        @foreach($hot2 as $k => $v)
                            <a href="#"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="211" height="286" /></a>
                        @endforeach
                        </li>
                    </ul>
                </div>   
            </div>
            <div class="fresh_txt" style="background-color: pink">
                <div class="fresh_txt_c">
                    <!-- 遍历花色 -->
                    <a href="#">进口水果</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <!-- 遍历部分展示鲜花 -->
                @foreach($hot as $k=>$v)
                <li>
                    <div class="name"><a href="#">{{ $v->gname }}</a></div>
                    <div class="price">
                        <font>￥<span>{{ $v->price }}</span></font>
                    </div>
                    <div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="180" height="155" /></a></div>
                    
                </li>
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[2]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
                <li><a href="#"><img src="{{ asset('/uploads/gpic/'.$hot2[1]->goodspic[0]->gpic) }}" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 精品推荐 End-->
    


    <!--Begin 猜你喜欢 Begin-->
    <a name="xihuan"></a>
    <div class="i_t mar_10">
        <span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">          
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            @foreach($hot as $k => $v)
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('/uploads/gpic/'.$v->goodspic[0]->gpic) }}" width="180" height="155" /></a>
                                    </div>
                                    <div class="name" style="margin-top: 30px; width: 100px;height: 22px; overflow: hidden;"><a title="{{ $v->gname }}" href="#">{{ $v->gname }}</a></div>
                                    <div class="price">
                                        <font>￥<span>{{ $v->price }}</span></font>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->

@endsection

