<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>朝花夕拾</title>
    <link href="../../../images/mae.ico" type="image/x-icon" rel="shortcut icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/r/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/r/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/r/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/r/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

    <script src="/d/layui-v2.4.5/layui/layui.js"></script>
    <script src="/d/layui-v2.4.5/layui/layui.all.js"></script>
  </head>
  
  <body>
   <div id="mws-container" class="clearfix">
            <!-- 显示错误消息 开始 -->
            @if (session('success'))
                <div class="mws-form-message success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mws-form-message error">
                    {{ session('error') }}
                </div>
            @endif
             <!-- 显示错误消息 结束 -->

    <div class="login-boxtitle">

      <a href="home/demo.html"><img alt="" src="/r/images/logo3.png" /></a>

    </div>

    <div class="res-banner">
      <div class="res-main">

        <div class="login-banner-bg"><span></span><img src="/r/images/big.jpg" /></div>
        <div class="login-box"> 

            <div class="am-tabs" id="doc-my-tabs">
              <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">邮箱注册</a></li>
                <li><a href="">手机号注册</a></li>
              </ul>
              @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="background: #E8E8E3;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style:none;color: orangered;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                  <form method="post" action="/home/register">
                    {{csrf_field()}}
                   <div class="user-email">
                      <label for="email"><i class="am-icon-envelope-o"></i></label>
                      <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                   </div>                   
                   <div class="user-pass">
                      <label for="password"><i class="am-icon-lock"></i></label>
                      <input type="password" name="password" id="password" placeholder="设置密码">
                   </div>                   
                   <div class="user-pass">
                      <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                      <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码">
                   </div> 
                    <div class="am-cf">
                        <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>
                 </form>
                 
                 <div class="login-links">
                    <label for="reader-me">
                      <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                    </label>
                  </div>
                    

                </div>

                <div class="am-tab-panel">
                  <form method="post" action="/home/register/phone">
                    {{ csrf_field() }}
                    <div class="user-phone">
                        <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                        <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                    </div>                                     
                    <div class="verification">
                          <label for="code"><i class="am-icon-code-fork"></i></label>
                          <input type="tel" name="code" id="code" placeholder="请输入验证码">
                          
                          <input type="button" id="dyMobileButton" value="获取" onclick="sendPhone(this)" >
                    </div>

                     <div class="user-pass">
                        <label for="password"><i class="am-icon-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="设置密码">
                     </div>                   
                     <div class="user-pass">
                        <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                        <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码">
                     </div>
                     <div class="am-cf">
                          <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                        </div>
                     </form>
                     <div class="login-links">
                        <label for="reader-me">
                          <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                        </label>
                      </div>
                        
                
                  <hr>
                </div>

                <script   type="text/javascript">
                  // alert($);
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })
                  function editCon(){

                      var t= 60;
                      var time = null;
                      if(time == null){
                         time = setInterval(function(){
                          t--;
                          //  修改button 和内容
                          $('#dyMobileButton').val('重新发送('+t+'s)');
                          if(t < 1){
                            //清楚定时器
                            clearInterval(time);
                            time = null;
                            $('#dyMobileButton').val('获取');
                            $('#dyMobileButton').attr('disabled',false);
                          }
                        },1000);
                      }
                       
                      
                  }
                  function sendPhone(obj)
                  {   
                      //接收手机号
                      var phone =$('#phone').val();
                      //定义正则匹配手机号是否格式正确
                      var phone_grep = /^1{1}[3456789]{1}[0-9]{9}$/;
                      // 使用正则检查手机号
                      if(!phone_grep.test(phone)){
                        return false;
                      }
                      // console.log('aaaaaaaa');
                      // 将js对象转换成jquery对象
                      var object = $(obj);
                      // 设置button状态
                      object.attr('disabled',true);
                      //获取当前按钮上的文字
                      var text = object.val();
                      // console.log(text);
                      if(text == '获取'){
                          //发送ajax 请求后台
                          $.get('/home/register/sendPhone/',{'phone':phone},function(data){
                              if(data.code == 0){
                                  editCon();
                              }else{
                                  alert(data.msg);
                              }
                          },'json');
                        }else{
                          return false;
                        }
                      
                      
                  }
                </script>

              </div>
            </div>

        </div>
      </div>
      
          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>

</html>
<script type="text/javascript"></script>