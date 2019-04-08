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
<body>
<div class="fj">
  <ul>
    <li><a <?php echo ($isopen==1?'href="/Game/index"':'href="javascript:;" class="notopen"'); ?>><img src="/Public/images/a1.png" alt=""></a></li>
    <li><a href="javascript:;" <?php echo ($isopen==1?'class="unable"':'class="notopen"'); ?>><img src="/Public/images/a2.png" alt=""></a></li>
    <li><a href="javascript:;" <?php echo ($isopen==1?'class="unable"':'class="notopen"'); ?>><img src="/Public/images/a3.png" alt=""></a></li>
    <li><a href="javascript:;" <?php echo ($isopen==1?'class="unable"':'class="notopen"'); ?>><img src="/Public/images/a4.png" alt=""></a></li>
  </ul>
</div>
<script>
$(function(){
  $('.unable').click(function(){
    layer.msg('积分不足')
  })
  $('.notopen').click(function(){
    layer.msg('亚洲区已封盘')
  })
})
</script>
</body>
</html>