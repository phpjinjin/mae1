<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- layui -->
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css"  media="all">
        <!-- endlayui -->

        <!-- mae -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/o/css/bootstrap.min.css" >
        <link rel="icon" href="/o/img/favicon.png" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="/o/css/style-homev1.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-res-v1.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-fix-nav.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-form-search-mobile.css"> 
        <link rel="stylesheet" type="text/css" href="/o/css/style-about.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-res-about.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-faq.css">
        <link rel="stylesheet" type="text/css" href="/o/css/style-login.css">
        <!-- endmae -->




   

 
        <!-- 橙色 -->
        <link type="text/css" rel="stylesheet" href="/o/css/style.css" />
        <!-- end 橙色 -->
        <!-- scroll -->


        <!-- GG FONT -->
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="/o/css/fontawesome.css" >
        <!-- end -->

        <title>朝花夕拾</title>
    </head>
    <body>
        <!-- mae -->
        <header class="navbar-fixed-top pos-header" id="header-v1" style="background: unset ！important; box-shadow: unset ！important; transition: all 0.5s ease ！important;">
            <span class="fr">
            <span class="fl">您好，请<a href="/home/login">登录/注册</a>&nbsp; <a href="#" style="color:#ff4e00;"></a>&nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
            <span class="ss">
                <div class="ss_list">
                    <a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                    <a href="#">客户服务</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                    <a href="#">网站导航</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/o/images/s_tel.png" align="absmiddle" /></a></span>
       
        </span>
         @section('top')
      
        <div class="top">
    <div class="logo"><a href="Index.html"><img src="/o/images/logo4.png" /></a></div>
    <div class="search">
        <form>
            <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
        <div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <li>
                    <div class="img"><a href="#"><img src="/o/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
@show        
        
        @section('header')

        @show
        
        <!-- boostrap & jquery -->
        <script src="/o/js/jquery.min_af.js"></script>
        <script src="/o/js/bootstrap.min_0028.js"></script>
        <!-- js file -->
        <script src="/o/js/function-homev1.js"></script>
        <script src="/o/js/function-sidebar.js"></script>
        <script src="/o/js/function-back-top.js"></script>
        <script src="/o/js/function-select-custom.js"></script>
        <script src="/o/js/function-search-v2.js"></script>
        <!-- scroll js -->
        <script type="text/javascript" src="/o/scrolling/TweenMax.min.js"></script>
        <script src="/o/scrolling/jquery.superscrollorama.js"></script>
        <script src="/o/js/function-scroll.js"></script>

        <!-- 橙色 -->
        <script type="text/javascript" src="/o/js/jquery-1.11.1.min_044d0927.js"></script>
        <script type="text/javascript" src="/o/js/jquery.bxslider_e88acd1b.js"></script>
        
        <script type="text/javascript" src="/o/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/o/js/menu.js"></script>    
            
        <script type="text/javascript" src="/o/js/select.js"></script>
        
        <script type="text/javascript" src="/o/js/lrscroll.js"></script>
        
        <script type="text/javascript" src="/o/js/iban.js"></script>
        <script type="text/javascript" src="/o/js/fban.js"></script>
        <script type="text/javascript" src="/o/js/f_ban.js"></script>
        <script type="text/javascript" src="/o/js/mban.js"></script>
        <script type="text/javascript" src="/o/js/bban.js"></script>
        <script type="text/javascript" src="/o/js/hban.js"></script>
        <script type="text/javascript" src="/o/js/tban.js"></script>
        
        <script type="text/javascript" src="/o/js/lrscroll_1.js"></script>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();

        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
    </body>
    
</html>
