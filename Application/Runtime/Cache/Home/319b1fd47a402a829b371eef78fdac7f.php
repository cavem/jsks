<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="/Public/js/jquery.min.js"></script>
  <script src="/Public/js/swiper.min.js"></script>
  <script src="/Public/layer/layer.js"></script>
  <script src="/Public/js/important.js"></script>
  <link rel="stylesheet" href="/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/Public/css/animate.css">
  <link rel="stylesheet" href="/Public/css/style.css">
  <title><?php echo ($title); ?></title>
</head>
<style>
  body,html{background: #fff;}
</style>
<body>


<div class="sign-img">
  <img src="/Public/images/img.jpg" alt="">
</div>

<div class="sign">
  <form action="" method="POST">
    <div class="signA">
      <div class="sign-a flex">
        <div class="sign-a1">
          <p>账号</p>
        </div>
        <div class="sign-a2">
          <input type="text" id="sign1" name="username" placeholder="请输入您的账号/手机号">
        </div>
      </div>
      <div class="sign-a flex">
        <div class="sign-a1">
          <p>密码</p>
        </div>
        <div class="sign-a2">
          <input type="password" id="sign2" name="password" placeholder="请输入您的密码">
        </div>
      </div>
      <div class="sign-a sign-b flex">
        <div class="sign-a1">
          <p>图片验证码</p>
        </div>
        <div class="sign-a2">
          <input type="text" name="code" id="sign3" placeholder="请输入图片验证码">
        </div>
        <div class="sign-b-img">
            <a href="javascript:;"><img src="<?php echo U('verify');?>" alt="" onclick="this.src=this.src+'?time='"+ Math.random()></a>
        </div>
      </div>
      <div class="sign-a-but">
        <button type="submit">确认登录</button>
      </div>
    </div>
  </form>
  <div style="text-align:right;padding:0.3rem 0.3rem 0;margin-top:15px;"><a href="<?php echo U('register');?>">立即注册>></a></div>
</div>


<script>
  $(function(){
    
    $('.sign form').submit(function(){
      var s1=$('#sign1').val();
      var s2=$('#sign2').val();
      var s3=$('#sign3').val();
      if(s1==''){
        layer.msg('请输入账号！')
      }else if(s2==''){
        layer.msg('请输入密码！')
      }else if(s3==''){
        layer.msg('请输入验证码！')
      }else{
        return true
      }
      return false
    })


  })
</script>



</body>
</html>