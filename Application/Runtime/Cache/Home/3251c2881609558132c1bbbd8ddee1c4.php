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

<div class="sign qsing">
  <div class="sign-tit">
    <ul class="flex">
      <li><a href="javascript:history.go(-1)"></a></li>
      <li>企业登录</li>
      <li><a href="<?php echo U('Login/qregister');?>">注册</a></li>
    </ul>
  </div>
</div>

<div class="signA">
  <form action="" method="">
    <div class="signAF1 qsignAF1">
      <div class="signA-a flex">
        <div class="signA-a1">
          <p>用户名</p>
        </div>
        <div class="signA-a2">
          <input type="text" name="" placeholder="用户名/手机号">
        </div>
      </div>
      <div class="signA-a flex">
        <div class="signA-a1">
          <p>密码</p>
        </div>
        <div class="signA-a2">
          <input type="password" name="" placeholder="请输入密码">
        </div>
      </div>
      <div class="signA-b">
        <button type="button">登录</button>
      </div>
    </div>
  </form>
</div>

<div class="qsignPass signPass">
  <ul class="flex">
    <!--<li id="signp1" class="signPss-act"><a href="#">记住登录</a></li>-->
    <li><a href="<?php echo U('Login/sign');?>">个人服务</a></li>
    <li><a href="<?php echo U('Login/retrieve');?>?type=1">忘记密码？</a></li>
  </ul>
</div>







</body>
</html>