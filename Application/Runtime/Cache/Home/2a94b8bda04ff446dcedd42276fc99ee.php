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

<div class="exBaner">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <a href="javascript:;"><img src="/Public/images/ban1.jpg" alt=""></a>
      </div>
      <!-- <div class="swiper-slide">
        <a href="javascript:;"><img src="/Public/images/ban2.jpeg" alt=""></a>
      </div>
      <div class="swiper-slide">
        <a href="javascript:;"><img src="/Public/images/ban3.jpeg" alt=""></a>
      </div>
    </div>
    <div class="swiper-pagination"></div> -->
  </div>
</div>

<div class="exNu flex">
  <div class="exNu1">
    <ul>
      <li>成交额&nbsp;<span><?php echo rand(895621489,956321584); ?>元</span></li>
      <li>关注人数&nbsp;<span><?php echo rand(25314869,27412368); ?>人</span></li>
    </ul>
  </div>
  <div class="exNu2">
    <p><span><?php echo mt_rand(90,98); ?></span>%</p>
    <p>赚钱率</p>
  </div>
</div>

<div class="exIm">
  <ul class="flex">
    <li><a href="<?php echo U('fangjian');?>"><img src="/Public/images/img1.jpg" alt=""></a></li>
    <li><a href="javascript:;" onclick="layer.msg('对不起，您没有开通此区域账户')"><img src="/Public/images/img2.jpg" alt=""></a></li>
    <li><a href="javascript:;" onclick="layer.msg('对不起，您没有开通此区域账户')"><img src="/Public/images/img3.jpg" alt=""></a></li>
    <li><a href="javascript:;" onclick="layer.msg('对不起，您没有开通此区域账户')"><img src="/Public/images/img4.jpg" alt=""></a></li>
  </ul>
</div>



<script>
  var swiper = new Swiper('.swiper-container', {
    loop:true,
    autoplay:true,
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
  });
</script>



</body>
</html>