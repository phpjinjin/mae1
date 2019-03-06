@extends('home.index.head')
@section('content')
<div class="i_bg bg_color">
    <div class="i_ban_bg">
        <!--Begin Banner Begin-->
        <div class="banner">        
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><img src="/o/images/ban1.jpg" width="740" height="401" /></li>
                    <li><img src="/o/images/ban1.jpg" width="740" height="401" /></li> 
                    <li><img src="/o/images/ban1.jpg" width="740" height="401" /></li> 
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
        <div class="inews">
            <div class="news_t">
                <span class="fr"><a href="#">更多 ></a></span>新闻资讯
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
        <span class="i_mores fr">  
            <!-- 遍历鲜花分类 -->
            <a href="#">进口咖啡</a>&nbsp; &nbsp; &nbsp;
        </span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <!-- 遍历热卖鲜花 -->
                        <li>
                            <a href="#">
                                <img src="/o/images/fre_r.jpg" width="211" height="286" />
                            </a>
                        </li>
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                    <!-- 遍历花色 -->
                    <a href="#">进口水果</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <!-- 遍历部分展示鲜花 -->
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/o/images/fre_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/o/images/fre_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 鲜花 End-->
    <!--Begin 可爱盆栽 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">2F</span>
        <span class="fl">可爱盆栽</span>                                
        <span class="i_mores fr">
            <a href="#">咖啡</a>&nbsp; &nbsp; | &nbsp; &nbsp;
        </span>
    </div>
    <div class="content">
        <div class="food_left">
            <div class="food_ban">
                <div id="imgPlay2">
                    <ul class="imgs" id="actor2">
                        <li><a href="#"><img src="/o/images/food_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/o/images/food_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/o/images/food_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_f">上一张</div>
                    <div class="next_f">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                    <a href="#">饼干糕点</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <li>
                    <div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                        <font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/food_1.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/o/images/food_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/o/images/food_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 可爱盆栽 End-->
    <!--Begin 精美饰品 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">3F</span>
        <span class="fl">精美饰品</span>                                
        <span class="i_mores fr">
            <a href="#">洗发护发</a>&nbsp; &nbsp; | &nbsp; &nbsp;
        </span>                
    </div>
    <div class="content">
        <div class="make_left">
            <div class="make_ban">
                <div id="imgPlay3">
                    <ul class="imgs" id="actor3">
                        <li>
                            <a href="#">
                            <img src="/o/images/make_r.jpg" width="211" height="286" />
                            </a>
                        </li>

                    </ul>
                    <div class="prev_m">上一张</div>
                    <div class="next_m">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                    <a href="#">洗发护发</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <li>
                    <div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                        <font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/make_1.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/o/images/make_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/o/images/make_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 精美饰品 End-->

    <!--Begin 限时特卖 Begin-->
    <div class="i_t mar_10">
        <span class="fl">美文 <b>·</b> 限时活动</span>
    </div>
    <div class="content" style="height: 223px;background: #fff">
        <div class="fresh_left" style="height: 223px;background: #fff">
            <div class="fre_ban">
                <div class="inews" style="width: 209px;height: 219px">
                    <div class="news_t">
                        <span class="fr"><a href="#">更多 ></a></span>美文推荐
                    </div>
                    <ul>
                        <li><a href="#">掬一轮明月 表无尽惦念</a></li>
                        <li><a href="#">好奇金装成长裤新品上市</a></li>
                    </ul>
                </div>   
            </div>
        </div>
        <div class="fresh_mid" style="width: 989px;height: 219px">
            <ul>
                <!-- 遍历部分展示鲜花 -->
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/o/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 限时特卖 End-->

    
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
        <span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">          
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/o/images/hot2.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>iphone 6S</h2>
                                        Apple/苹果 iPhone 6s Plus公开版
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>5288</span></font> &nbsp; 25R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/o/images/hot3.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>倩碧特惠组合套装</h2>
                                        倩碧补水组合套装8折促销
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>368</span></font> &nbsp; 18R
                                    </div>
                                </div>
                            </li>
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
