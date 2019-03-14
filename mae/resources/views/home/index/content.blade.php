<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/o/css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
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
    <!-- 引入layui -->
    <script src="/d/layui-v2.4.5/layui/layui.js"></script>
    <script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
    <link rel="stylesheet" type="text/css" href="/o/css/pages.css" />
    @yield('menu') 
    <style type="text/css">
        #butt:hover{
            color:#D97593;
            font-weight:bold;
        }
        #look{
            text-decoration:none;
        }
        #look:hover{
            color:#FF4466;
            font-weight:bold;
        }
        a:hover{
            text-decoration:none;
            color:pink; 
        }
    </style>
<title>朝花夕拾</title>
<link href="../../../images/mae.ico" type="image/x-icon" rel="shortcut icon">
</head>
<body style="font-size: 12px;">
</head>


<body style="font-size:12px;">  

<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <!--Begin 所在收货地区 Begin-->
        <span class="s_city_b">
            <span class="fl">送货至：</span>
            <span class="s_city">
                <span>四川</span>
                <div class="s_city_bg">
                    <div class="s_city_t"></div>
                    <div class="s_city_c">
                        <h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                           </tr>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">

            <span class="fl">你好
            @if(session('login') == null)<a href="/home/login">，请登录/免费注册|

            @elseif(  session('login') == true) <a href="/home/center">  {{ session('account') }}
            @endif
           
            @if(  session('login') == true)
            </a>&nbsp;<a href="/home/exit">退出</a>&nbsp;|
            @endif
            <a href="#">个人中心</a>&nbsp;|</span>
            <span class="ss">
                <div class="ss_list">
                    收藏夹
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="/home/collect">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                    客户服务
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
                    网站导航
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
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/home/index"><img src="/o/images/logo4.png" /></a></div>
    <div class="search">
        <form action="/home/goods" method="get">
            <input type="text" value="" class="s_ipt" placeholder="请输入商品关键字" name="search"/>
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
        <div class="car_t"><a href="/home/carts">购物车</a> [ <span style="color:#FF4466;">{{ $carts_count->tiao }}</span> ]</div>
        <div class="car_bg">
            
          <!--Begin 购物车未登录 Begin-->
              @if(session('login') == null)
            <div class="un_login">还未登录！<a href="/home/login" style="color:#FF4466;">马上登录</a> 查看购物车！</div>
              @else
              @endif
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars" style="height:250px;">
                @foreach($carts_count as $k=>$v)
                <li>
                    <div class="img"><a href="/home/goods/{{ $v->gid }}"><img src="{{ asset('uploads/gpic/'.$v->cart_good[0]->goodspic[0]->gpic) }}" width="58" height="58" /></a></div>
                    <div class="name"><a href="/home/goods/{{ $v->gid }}">{{ $v->cart_good[0]->gname }}</a></div>
                    <div class="price"><font color="#ff4e00"></font>X{{ $v->cnt }}</div>
                </li>
                @endforeach

            </ul>
            <div class="price_sum"><a href="/home/carts" id="look">......查看更多</a></div>
            <div class="price_sum">共计&nbsp; <font color="#FF4466">￥</font><span style="color:#FF4466;">{{ $carts_count->sum }}</span></div>
            <div class="price_a" style="background:#FF4466;"><a href="/home/carts">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
              </div>
    </div>
</div>

<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            @yield('none')
                <ul>
                    <a href="" hidden>{{ $num = 0 }}</a>
                    @foreach($cate_data as $k=>$v)

                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/o/images/cate2.ico" /></span>
                            <span class="fl">{{ $v->gtname }}</span>
                        </div>
                        <div class="zj" style="top:{{ $num  }}px;background:#f9f9f9;border: 1px solid #C3C3C3">
                            <div class="zj_l"">
                                @foreach($v['sub'] as $kk=>$vv)
                                <div class="zj_l_c">
                                    
                                    <h2 onclick="type({{$vv->tid}})">{{ $vv->gtname }}</h2>
                                    @foreach($vv['sub'] as $kkk=>$vvv)
                                    <a onclick="typex({{$vvv->tid}})">{{ $vvv->gtname }}</a>|
                                    @endforeach
                                </div>
                            @endforeach

                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/o/images/catex3.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/o/images/catex2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                    <a href="" hidden>{{ $num -= 40 }}</a>
                    @endforeach     
                </ul>
                
            </div>
        </div>  
        <script type="text/javascript">
        function type(tid){
            location.href = "/home/goods/?tid="+tid;
        }
        function typex(tid){
            location.href = "/home/goods/?tid="+tid;
        }
        </script>
        <!--End 商品分类详情 End-->
        <ul class="menu_r">                              
            <li style="margin-left: 10px"><a href="/home/index">首页</a></li>
            <li style="margin-left: 10px"><a href="/home/goods">全部商品</a></li>
            <li style="margin-left: 10px"><a href="Food.html">热卖商品</a></li>
            <li style="margin-left: 10px"><a href="Fresh.html">精品推荐</a></li>
            <li style="margin-left: 10px"><a href="HomeDecoration.html">店家甄选</a></li>
            <li style="margin-left: 10px"><a href="SuitDress.html">猜你喜欢</a></li>
        </ul>
        <div class="m_ad"></div>
    </div>
</div>
<!--End Menu End--> 
@section('content')


@show
<!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/footer1.gif" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/footer2.gif" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/footer3.gif" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/footer4.gif" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            @foreach($getColumn as $k=>$v)
                @if($v->sort==1)
                <dd><a href="#">{{ $v->title }}</a></dd>
                @endif
            @endforeach
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            @foreach($getColumn as $k=>$v)
                @if($v->sort==2)
                <dd><a href="#">{{ $v->title }}</a></dd>
                @endif
            @endforeach
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            @foreach($getColumn as $k=>$v)
                @if($v->sort==3)
                <dd><a href="#">{{ $v->title }}</a></dd>
                @endif
            @endforeach
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            @foreach($getColumn as $k=>$v)
                @if($v->sort==4)
                <dd><a href="#">{{ $v->title }}</a></dd>
                @endif
            @endforeach
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物资讯</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>       
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/o/images/wxid.jpg" width="118" height="118" /></div>
            <img src="/o/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright ? 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/o/images/b_1.gif" width="98" height="33" /><img src="/o/images/b_2.gif" width="98" height="33" /><img src="/o/images/b_3.gif" width="98" height="33" /><img src="/o/images/b_4.gif" width="98" height="33" /><img src="/o/images/b_5.gif" width="98" height="33" /><img src="/o/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
    <!--End Footer End -->    
</div>

</body>

</html>