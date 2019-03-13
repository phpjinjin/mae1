@extends('home.index.content')
@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<!--End Header End--> 
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
          <div class="left_m">
              <div class="left_m_t t_bg2">个人中心</div>
                <ul>
                  <li><a href="/home/center/information" class="now">用户信息</a></li>
                  <li><a href="/home/center/password" class="now">修改密码</a></li>
                    <li><a href="Member_Collect.html">我的收藏</a></li>
                    
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="/home/center/order" >我的订单</a></li>
                    <li><a href="Member_Address.html">收货地址</a></li>
                
                </ul>
            </div>
            
           
        </div>
		<div class="m_right">
      @section('order')
      
    @show
        </div>
    </div>
  
</div>

@endsection
