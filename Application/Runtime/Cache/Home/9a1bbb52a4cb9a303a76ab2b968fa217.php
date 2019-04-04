<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/Public/css/animate.css">
  <link rel="stylesheet" href="/Public/css/style.css">
  <link rel="stylesheet" href="/Public/lib/css/pagination.css">
  <script src="/Public/js/jquery.min.js"></script>
  <script src="/Public/js/swiper.min.js"></script>
  <script src="/Public/layer/layer.js"></script>
  <script src="/Public/laypage/laypage.js"></script>
  <script src="/Public/js/important.js"></script>
  <title><?php echo ($title); ?></title>
</head>
<body>


<div class="ceTit flex">
  <div class="ceImg">
    <a href="javascript:;">
      <img src="/Public/images/touxiang2.png" alt="">
    </a>
  </div>
  <div class="ceNa">
    <p>
      <?php if($_SESSION['loginuser']['username']!= ''): echo ($_SESSION['loginuser']['username']); ?>
      <?php else: ?>
        设置用户名<?php endif; ?>
    </p>
    <p><?php echo ($_SESSION['loginuser']['telnum']); ?></p>
  </div>
</div>

<div class="ceLu flex">
  <div class="ceLua">
    <a href="<?php echo U('User/shenqingzhiwei');?>">
      <p>职位申请记录</p>
    </a>
  </div>
  <div class="ceLua ceLua1">
    <a href="<?php echo U('User/adddance');?>">
      <p>我的简历</p>
    </a>
  </div>
</div>


<div class="cePer">
  <ul>
    <!--<li><a href="#">我的简历</a></li>-->
    <li><a href="soucang.html">收藏职位</a></li>
    <li><a href="heshizW.html">适合我的职位</a></li>
    <li><a href="Opinion.html">意见反馈</a></li>
    <li><a href="Gpass.html">更改密码</a></li>
  </ul>
</div>





</body>
</html>