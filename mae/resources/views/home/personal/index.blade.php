@extends('home.index.content')
@section('content')
<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
          <div class="left_m">
              <div class="left_m_t t_bg2">个人中心</div>
                <ul>
                  <li><a href="Member_User.html" class="now">用户信息</a></li>
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
