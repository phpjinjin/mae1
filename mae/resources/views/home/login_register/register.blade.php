<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>朝花夕拾</title>

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="/r/css/normalize.min.css">
<link rel="stylesheet" href="/r/css/style.css">
<script type="text/javascript" src="/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>

<body>
<div class="demo-btns">
  <header>
    <h1>Mae注册</h1>
  </header>
  <div class="info">
    <div class="buttons">
      <p> <a href="" data-modal="#modal" class="modal__trigger">Mae</a> <a href="" data-modal="#modal2" class="modal__trigger">手机注册</a> <a href="" data-modal="#modal3" class="modal__trigger">邮箱注册</a> </p>
    </div>
    <p>单击按钮激活模式。<br>
   
  </div>
</div>

<!-- Modal -->
<div id="modal" class="modal modal__bg" role="dialog" aria-hidden="true">
  <div class="modal__dialog">
    <div class="modal__content">
      <h1>Mae</h1>
      <p>叶散的时候,才明白欢聚,花谢的时候才明白青春,愿我们年轻时可以无畏  年老时可以无悔,愿您永远年轻,永远热泪盈眶,愿您以梦为马,莫负芳华!</p>
      
      <!-- modal close button --> 
      <a href="" class="modal__close demo-close">
      <svg class="" viewBox="0 0 24 24">
        <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/>
        <path d="M0 0h24v24h-24z" fill="none"/>
      </svg>
      </a> </div>
  </div>
</div>
<div id="modal2" class="modal modal--align-top modal__bg" role="dialog" aria-hidden="true">
  <div class="modal__dialog">
    <div class="modal__content">
      <h1>Big Modal</h1>
      <h3>This modal is pretty tall.</h3>
      <p>Selfies normcore four dollar toast four loko listicle artisan. Hoodie Marfa authentic, wayfarers church-key tofu Banksy pop-up Kickstarter Brooklyn heirloom swag synth. Echo Park cray synth mixtape. Tofu gastropub squid readymade, trust fund Wes Anderson DIY PBR 8-bit try-hard +1 Shoreditch lo-fi tote bag.</p>
      <p><img src="http://unsplash.it/600/300" alt="" /></p>
      <p>Mumblecore cred selfies fingerstache. Tousled skateboard plaid lo-fi shabby chic salvia, swag Odd Future Etsy art party Austin cronut. Crucifix whatever Pinterest food truck, pickled viral cray 90's DIY chambray keffiyeh biodiesel Vice blog. Cred meh yr tofu.</p>
      <p>Mumblecore cred selfies fingerstache. Tousled skateboard plaid lo-fi shabby chic salvia, swag Odd Future Etsy art party Austin cronut. Crucifix whatever Pinterest food truck, pickled viral cray 90's DIY chambray keffiyeh biodiesel Vice blog. Cred meh yr tofu.</p>
      <!-- modal close button --> 
      <a href="" class="modal__close demo-close">
      <svg class="" viewBox="0 0 24 24">
        <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/>
        <path d="M0 0h24v24h-24z" fill="none"/>
      </svg>
      </a> </div>
  </div>
</div>
<div id="modal3" class="modal  modal__bg" role="dialog" aria-hidden="true">
  <div class="modal__dialog">
    <div class="modal__content">
      <h1>邮箱注册</h1>
      <form class="form-horizontal" action="/home/register" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">邮箱</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">设置密码</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">确定密码</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="repassword">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default" value="注册">
            </div>
          </div>
</form>
      
      <!-- modal close button --> 
      <a href="" class="modal__close demo-close">
      <svg class="" viewBox="0 0 24 24">
        <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/>
        <path d="M0 0h24v24h-24z" fill="none"/>
      </svg>
      </a> </div>
  </div>
</div>
<script src="/r/js/index.js"></script>
</body>
</html>
