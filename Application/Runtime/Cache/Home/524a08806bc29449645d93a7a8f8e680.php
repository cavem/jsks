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
          <input type="number" name="username" id="res1" placeholder="请输入11数字"  oninput="if(value.length>11)value=value.slice(0,11)">
        </div>
      </div>
      <div class="sign-a flex">
        <div class="sign-a1">
          <p>密码</p>
        </div>
        <div class="sign-a2">
          <input type="password" name="password"  id="res2" placeholder="请输入您的密码">
        </div>
      </div>
      <div class="sign-a flex">
        <div class="sign-a1">
          <p>昵称</p>
        </div>
        <div class="sign-a2">
          <input type="text" name="nickname"  id="res3" placeholder="请输入您的昵称">
        </div>
      </div>
      <input type="hidden" name="headimg" value="<?php echo 'tx'.mt_rand(1,20).'.jpg'; ?>">
      <div class="sign-a sign-b flex">
        <div class="sign-a1">
          <p>图片验证码</p>
        </div>
        <div class="sign-a2">
          <input type="text" name="code"  id="res4" placeholder="请输入图片验证码">
        </div>
        <div class="sign-b-img">
            <a href="javascript:;"><img src="<?php echo U('verify');?>" alt="" onclick="this.src=this.src+'?time='"+ Math.random()></a>
        </div>
      </div>
      <div class="sign-a flex">
        <div class="sign-a1">
          <p>邀请人ID</p>
        </div>
        <div class="sign-a2">
          <input type="text" name=""  id="res5" placeholder="邀请人ID没有可不填">
        </div>
      </div>
      <div class="sign-a-but">
        <button type="submit">注册</button>
      </div>
    </div>
  </form>
  <div style="text-align:right;padding:0.3rem 0.3rem 0;margin-top:15px;"><a href="<?php echo U('sign');?>">立即登录>></a></div>
</div>



<script>
  $(function(){

    $('.sign form').submit(function(){
      var res1=$('#res1').val();
      var res2=$('#res2').val();
      var res3=$('#res3').val();
      var res4=$('#res4').val();
      var res5=$('#res5').val();
      if(res1.length<11){
        layer.msg('请输入11位数字')
      }else if(!(/^[0-9A-Za-z_]{6,16}$/.test(res2))){
        layer.msg('密码由数字、大小写字母、下划线组成，最小6位，最大16位，请正确填写密码！');
      }else if(res3==''){
        layer.msg('请输入昵称')
      }else if(res4==''){
        layer.msg('请输入验证码')
      }else{
        return true
      }
      return false
    })


  })
</script>



</body>
</html>