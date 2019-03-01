@extends('home.index.head')
@section('header')
            <div class="menu">
                <!--Begin 商品分类详情 Begin-->    
                <div class="nav">
                    <div class="nav_t">全部商品分类</div>
                    <div class="leftNav">
                        <ul>    
                          <!-- 遍历分类 -->
                            <li>
                                <div class="zj">
                                    <div class="zj_l">
                                        <div class="zj_l_c">
                                            <!-- 第一层遍历 -->
                                            <h2>零食 / 糖果 / 巧克力</h2>
                                            <!-- 第二层遍历 -->
                                            <a href="#">坚果</a>|
                                        </div>
                                    </div>
                                    <div class="zj_r">
                                        <a href="#"><img src="/o/images/n_img1.jpg" width="236" height="200" /></a>
                                        <a href="#"><img src="/o/images/n_img2.jpg" width="236" height="200" /></a>
                                    </div>
                                </div>
                            </li>               
                        </ul>            
                    </div>
                <!--End 商品分类详情 End-->                                                     
                <ul class="menu_r">
                      <!-- 遍历模块 -->
                    <li><a href="Index.html">首页</a></li>
                </ul>
                <div class="m_ad"></div>
            </div>
        </div>
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
        
        <!--End Banner End-->
        <div class="inews">
            <div class="news_t">
                <span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
                <!-- 遍历公告 -->
                <li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
            </ul>
        </div>
    </div>
        </header>
                <!-- Wrapper for slides -->

        <div class="item active slide-1">
            <img style="height: 700px;width: 1520px" src="/o/img/slider-1.png" alt="img-holiwood">
        </div>
        
        <div class="container blog">
        <h1>精品推荐</h1>
        <p>- Lorem Ipsum is<span class="hidden-xs"> simply dummy</span> text of the printing -</p>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 product-blog">
                <a href="#"><img src="/o/img/blog-1.jpg" class="img-responsive" title="img-blog" alt="img-holiwood"></a>
                <div class="time-blog">
                    <span class="time"><i class="far fa-calendar-alt"></i><span>May, 12 2018</span></span>
                    <span class="time"><i class="far fa-edit"></i><span>Pixel-Creative</span></span>
                </div>
                <h2><a href="#">Choose for yourself the Flobal chiffon dress</a></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 product-blog">
                <a href="#"><img src="/o/img/blog-2.jpg" class="img-responsive" title="img-blog" alt="img-holiwood"></a>
                <div class="time-blog">
                    <span class="time"><i class="far fa-calendar-alt"></i><span>May, 12 2018</span></span>
                    <span class="time"><i class="far fa-edit"></i><span>Pixel-Creative</span></span>
                </div>
                <h2><a href="#">Choose for yourself the Flobal chiffon dress</a></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 product-blog">
                <a href="#"><img src="/o/img/blog-3.jpg" class="img-responsive" title="img-blog" alt="img-holiwood"></a>
                <div class="time-blog">
                    <span class="time"><i class="far fa-calendar-alt"></i><span>May, 12 2018</span></span>
                    <span class="time"><i class="far fa-edit"></i><span>Pixel-Creative</span></span>
                </div>
                <h2><a href="#">Choose for yourself the Flobal chiffon dress</a></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

            </div>
        </div>
        </div>
        <div class="container collection" id="showcase-2">
        <h1>鲜花</h1>
        <h2>- All Category of Jenstore -</h2>
        <div class="gallery clearfix">
        <figure>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-collection">
                    <div class="product-image-collec">
                        <figure class="hot"><a href="#"><img src="/o/img/collec-1.jpg" class="img-responsive" alt="img-holiwood"></a></figure>
                        <div class="product-icon-collec">
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-shopping-basket"></i></a>
                            <a href="#"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-title-collec">
                        <h5><a href="#"> Pink roses</a></h5>
                        <div class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <div class="prince">$207.2</div>
                    </div>
                </div>
            </div>
        </div>
        </figure>
        </div>
        </div>
        <div class=" wedding" id="showcase-3">
        <h1>盆栽</h1>
        <h2>- Lorem Ipsum is<span class="hidden-xs"> simply dummy</span> text of the printing -</h2>
        <div class="gallery clearfix">
        <figure>
            <div class="img-wedding"><img src="/o/img/wedding.png" alt="img-holiwood"></div>
            <div class="container wedding-content">
                <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 product-wedding">
                <div class="product-image-wedding">
                        <a href="#"><img src="/o/img/wedding-4.jpg" class="img-responsive" alt="img-holiwood"></a>
                        <div class="product-icon-wedding">
                            <a href="#"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-shopping-basket"></i></a>
                            <a href="#"><i class="far fa-heart"></i></a>
                        </div>
                </div>
                <div class="product-title-wedding">
                        <h5><a href="#">Bouquet Rose</a></h5>
                        <div class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <div class="prince">$350.4</div>
                </div>
            </div>
        </div>
            </div>
            
        </figure>
        </div>

        </div>
        <div class="holiday" id="showcase-4">
        <div class="container">
            <h1>饰品</h1>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-holiday">
                    <div class="product-image-holiday">
                        <figure class="hot"><a href="#"><img src="/o/img/holiday-1.jpg" class="img-responsive" alt="img-holiwood"></a></figure>
                        <div class="product-icon-holiday">
                            <a href="#"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-shopping-basket"></i></a>
                            <a href="#"><i class="far fa-heart"></i></a>
                        </div>
                </div>
                <div class="product-title-holiday">
                        <h5><a href="#">Fun & Flirty By BloomNation</a></h5>
                        <div class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <div class="prince">$200.2</div>
                </div>
                </div>
            </div>
            </div>
            </figure>
            </div>

        </div>
        </div>
        <div class="count">
        <div class="img-count">
            <img src="/o/img/who.png" alt="img-holiwood">
        </div>
        <div class="title-count">
            <h1>美文</h1>
            <p>- Lorem Ipsum is<span class="hidden-xs"> simply dummy</span> text of the printing -</p>
        <div id="countdown">
        <a href="#">查看更多</a>
        </div>


        </div>
        <footer>
        <div class="hidden-lg hidden-md back-to-top fade"><i class="fas fa-caret-up"></i></div>
        <div class="BG-menu"></div>
        <!-- Modal quick view -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
                <div class="modal-body">
                    <div class="tab-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="img-pill-1" class="tab-pane fade in active">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 title-quick">
                                    <figure class="fi-quick"><h1>QUICK VIEW</h1></figure>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <img src="/o/img/wedding-1.jpg" class="img-responsive" alt="holiwood">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail">
                                <h1>Queen Rose - Pink</h1>
                                <p class="p1">It is a long established fact that a reader will be distracted  by the readable content of a page when looking at its layout.</p>
                                <div class="star">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span>10 Rating(s) | Add Your Rating</span>
                                </div>
                                <div class="prince"><span>$250.9</span><s class="strike">$300.02</s></div>
                                <figure class="fi-option"><p class="option">Option</p></figure>
                                <div class="size">
                                    <span class="lb-size">Size <span class="sta-red">*</span>
                                    </span>
                                    <span class="lb-color">Color <span class="sta-red">*</span>
                                    </span>
                                </div>
    <div class="select-custom">
        <select>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>
        <a href="#"><span class="color-1"></span></a> <a href="#"><span class="color-2"></span></a> <a href="#"><span class="color-3"></span></a> <a href="#"><span class="color-4"></span></a> 
        <p class="require">Required Fields <span>*</span></p>
        <div class="Quality">
            
            <div class="input-group input-number-group">
                <span class="text-qua">Quanty:</span>
                  <div class="input-group-button">
                    <span class="input-number-decrement">-</span>
                  </div>
                  <input class="input-number" type="number" min="0" max="1000" value="01" >
                  <div class="input-group-button">
                    <span class="input-number-increment">+</span>
                  </div>
                  <span class="dola">$ </span><span class="total">250.9</span>
            </div>
            
        </div>
        <div class="add-cart">
            <a href="#" class="btn-add-cart">Add to cart</a>
            <a href="#" class="list-icon icon-1"><i class="far fa-eye"></i></a>
            <a href="#" class="list-icon icon-2"><i class="far fa-heart"></i></a>
        </div>
    </div>
</div>
</div>
<div id="img-pill-2" class="tab-pane fade">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 title-quick">
    <figure class="fi-quick"><h1>QUICK VIEW</h1></figure>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <img src="/o/img/queen.jpg" class="img-responsive" alt="holiwood">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail">
    <h1>Queen Rose</h1>
    <p class="p1">It is a long established fact that a reader will be distracted  by the readable content of a page when looking at its layout.</p>
    <div class="star">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        <span>10 Rating(s) | Add Your Rating</span>
    </div>
    <div class="prince"><span>$300.02</span><s class="strike">$250.9</s></div>
    <figure class="fi-option"><p class="option">Option</p></figure>
    <div class="size">
        <span class="lb-size">Size <span class="sta-red">*</span></span><span class="lb-color">Color <span class="sta-red">*</span></span>
    </div>
    <div class="select-custom">
        <select>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>
        <a href="#"><span class="color-1"></span></a> <a href="#"><span class="color-2"></span></a> <a href="#"><span class="color-3"></span></a> <a href="#"><span class="color-4"></span></a> 
        <p class="require">Required Fields <span>*</span></p>
        <div class="Quality">
            
            <div class="input-group input-number-group">
                <span class="text-qua">Quanty:</span>
                  <div class="input-group-button">
                    <span class="input-number-decrement">-</span>
                  </div>
                  <input class="input-number" type="number" min="0" max="1000" value="01" >
                  <div class="input-group-button">
                    <span class="input-number-increment">+</span>
                  </div>
                  <span class="dola">$ </span><span class="total">250.9</span>
            </div>
            
        </div>
        <div class="add-cart">
            <a href="#" class="btn-add-cart">Add to cart</a>
            <a href="#" class="list-icon icon-1"><i class="far fa-eye"></i></a>
            <a href="#" class="list-icon icon-2"><i class="far fa-heart"></i></a>
        </div>
    </div>
</div>  
</div>
<div id="img-pill-3" class="tab-pane fade">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 title-quick">
    <figure class="fi-quick"><h1>QUICK VIEW</h1></figure>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <img src="/o/img/laven.jpg" class="img-responsive" alt="holiwood">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail">
    <h1>Lavender</h1>
    <p class="p1">It is a long established fact that a reader will be distracted  by the readable content of a page when looking at its layout.</p>
    <div class="star">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        <span>10 Rating(s) | Add Your Rating</span>
    </div>
    <div class="prince"><span>$300.02</span><s class="strike">$250.9</s></div>
    <figure class="fi-option"><p class="option">Option</p></figure>
    <div class="size">
        <span class="lb-size">Size <span class="sta-red">*</span></span><span class="lb-color">Color <span class="sta-red">*</span></span>
    </div>
    <div class="select-custom">
        <select>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>
        <a href="#"><span class="color-1"></span></a> <a href="#"><span class="color-2"></span></a> <a href="#"><span class="color-3"></span></a> <a href="#"><span class="color-4"></span></a> 
        <p class="require">Required Fields <span>*</span></p>
        <div class="Quality">
            
            <div class="input-group input-number-group">
                <span class="text-qua">Quanty:</span>
                  <div class="input-group-button">
                    <span class="input-number-decrement">-</span>
                  </div>
                  <input class="input-number" type="number" min="0" max="1000" value="01" >
                  <div class="input-group-button">
                    <span class="input-number-increment">+</span>
                  </div>
                  <span class="dola">$ </span><span class="total">250.9</span>
            </div>
            
        </div>
        <div class="add-cart">
            <a href="#" class="btn-add-cart">Add to cart</a>
            <a href="#" class="list-icon icon-1"><i class="far fa-eye"></i></a>
            <a href="#" class="list-icon icon-2"><i class="far fa-heart"></i></a>
        </div>
    </div>
</div>

</div>
<div id="img-pill-4" class="tab-pane fade">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 title-quick">
    <figure class="fi-quick"><h1>QUICK VIEW</h1></figure>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <img src="/o/img/collec-3.jpg" class="img-responsive" alt="holiwood">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail">
    <h1>Queen Rose - Yellow</h1>
    <p class="p1">It is a long established fact that a reader will be distracted  by the readable content of a page when looking at its layout.</p>
    <div class="star">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        <span>10 Rating(s) | Add Your Rating</span>
    </div>
    <div class="prince"><span>$300.02</span><s class="strike">$250.9</s></div>
    <figure class="fi-option"><p class="option">Option</p></figure>
    <div class="size">
        <span class="lb-size">Size <span class="sta-red">*</span></span><span class="lb-color">Color <span class="sta-red">*</span></span>
    </div>
    <div class="select-custom">
        <select>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>
        <a href="#"><span class="color-1"></span></a> <a href="#"><span class="color-2"></span></a> <a href="#"><span class="color-3"></span></a> <a href="#"><span class="color-4"></span></a> 
        <p class="require">Required Fields <span>*</span></p>
        <div class="Quality">
            
            <div class="input-group input-number-group">
                <span class="text-qua">Quanty:</span>
                  <div class="input-group-button">
                    <span class="input-number-decrement">-</span>
                  </div>
                  <input class="input-number" type="number" min="0" max="1000" value="01" >
                  <div class="input-group-button">
                    <span class="input-number-increment">+</span>
                  </div>
                  <span class="dola">$ </span><span class="total">250.9</span>
            </div>
            
        </div>
        <div class="add-cart">
            <a href="#" class="btn-add-cart">Add to cart</a>
            <a href="#" class="list-icon icon-1"><i class="far fa-eye"></i></a>
            <a href="#" class="list-icon icon-2"><i class="far fa-heart"></i></a>
        </div>
    </div>
</div>  
</div>
</div>
<ul class="nav nav-pills col-lg-6 col-md-6 col-sm-6 col-xs-12 img-pill">
<li class="active col-lg-4 col-md-4 col-sm-4 col-xs-12"><a data-toggle="pill" href="#img-pill-1"><img src="/o/img/wedding-1.jpg" class="img-responsive" alt="holiwood"></a></li>
<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a data-toggle="pill" href="#img-pill-2"><img src="/o/img/queen.jpg" class="img-responsive" alt="holiwood"></a></li>
<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a data-toggle="pill" href="#img-pill-3"><img src="/o/img/laven.jpg" class="img-responsive" alt="holiwood"></a></li>
<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a data-toggle="pill" href="#img-pill-4"><img src="/o/img/collec-3.jpg" class="img-responsive" alt="holiwood"></a></li>
</ul>
              </div>
              
            </div>
        
          </div>
        </div>
        <div style="height: 350px"></div>
        <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/o/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
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
            <div class="b_er_c"><img src="/o/images/er.gif" width="118" height="118" /></div>
            <img src="/o/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/o/images/b_1.gif" width="98" height="33" /><img src="/o/images/b_2.gif" width="98" height="33" /><img src="/o/images/b_3.gif" width="98" height="33" /><img src="/o/images/b_4.gif" width="98" height="33" /><img src="/o/images/b_5.gif" width="98" height="33" /><img src="/o/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
        <!-- --------------------------- -->
        </footer>

@endsection
