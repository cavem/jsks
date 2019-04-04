<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/xzjob/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/xzjob/Public/css/animate.css">
  <link rel="stylesheet" href="/xzjob/Public/css/style.css">
  <link rel="stylesheet" href="/xzjob/Public/lib/css/pagination.css">
  <script src="/xzjob/Public/js/jquery.min.js"></script>
  <script src="/xzjob/Public/js/swiper.min.js"></script>
  <script src="/xzjob/Public/layer/layer.js"></script>
  <script src="/xzjob/Public/laypage/laypage.js"></script>
  <script src="/xzjob/Public/js/important.js"></script>
  <title><?php echo ($title); ?></title>
</head>
<style>
  body,html{background: #fff;}
</style>
<body>

<div class="sign">
  <div class="sign-tit">
    <ul class="flex">
      <li><a href="javascript:history.go(-1)"></a></li>
      <li>重置密码</li>
      <li><a href="#"></a></li>
    </ul>
  </div>
</div>

<div class="signA">
  <form action="" method="">
    <div class="signAF1">
      <div class="signA-a flex">
        <div class="signA-a1">
          <p>手机号</p>
        </div>
        <div class="signA-a2">
          <input type="text" name="" id="retPhone" placeholder="请输入手机号">
        </div>
      </div>
      <div class="signA-a signA-a1 flex">
        <div class="signA-a1">
          <p>验证码</p>
        </div>
        <div class="signA-a2">
          <input type="text" name="" id="retYzm" placeholder="请输入短信验证码">
        </div>
        <div class="signA-yzm">
          <button type="button"  id="retZym">获取验证码</button>
        </div>
      </div>
      <div class="signA-a flex">
        <div class="signA-a1">
          <p>设置密码</p>
        </div>
        <div class="signA-a2">
          <input type="password"  name="" id="retPass" placeholder="数字、大小写字母、下划线组成，6~16位">
        </div>
      </div>
      <div class="signA-a flex">
        <div class="signA-a1">
          <p>设置密码</p>
        </div>
        <div class="signA-a2">
          <input type="password"  name="" id="retPass1" placeholder="数字、大小写字母、下划线组成，6~16位">
        </div>
      </div>
      <div class="signA-b">
        <button type="button" id="retBut">重置密码</button>
      </div>
    </div>
  </form>
</div>

<div class="yt">
  <p>没有账号？ <a href="<?php echo U('Login/register');?>">立即注册</a></p>
</div>






</body>
</html>