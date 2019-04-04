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
          <div class="res-tit res-titA-z" style="background:#75A3BD;">
        <ul class="flex">
          <li><a href="javascript:history.go(-1);"></a></li>
          <li></li>
          <li></li>
        </ul>
      </div>
      <div class="res-titHei"></div>
<style>
.res-titA-z{position: fixed;top: 0;left: 0;width: 100%;z-index: 999;}
.res-titHei{height: 1rem;}
</style>
  
      <div class="rl">
        <h3>公告</h3>
        <p><?php echo ($sysinfo); ?></p>
      </div>
      
      
      
      
      </body>
      </html>