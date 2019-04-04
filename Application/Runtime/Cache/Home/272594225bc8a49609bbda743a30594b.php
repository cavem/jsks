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

<div class="head head1">
  <div class="log flex">
    <div class="log1">
      <a href="#"></a>
    </div>
    <div class="log2">
      <!--<div class="log2-a">-->
      <!--<ul class="flex">-->
      <!--<li><a href="sign.html">登录</a></li>-->
      <!--<li><a href="register.html">注册</a></li>-->
      <!--</ul>-->
      <!--</div>-->
      <div class="log2-b">
        <div class="log2-b-1">
          <a href="javascript:;"></a>
        </div>
        <div class="log2-b-2 animated">
          <ul>
            <li><a href="<?php echo U('Index/index');?>">返回首页</a></li>
            <li><a href="<?php echo U('User/gcenter');?>">会员中心</a></li>
            <li><a href="<?php echo U('Login/loginout');?>">退出</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <ul class="flex">
      <li><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li><a href="<?php echo U('Index/jllist');?>">个人求职</a></li>
      <li><a href="<?php echo U('Index/hotz');?>">黄金招聘区</a></li>
      <li><a href="<?php echo U('Index/hangye');?>">行业招聘</a></li>
      <li><a href="#">咨询</a></li>
    </ul>
  </nav>
  <div class="lisNav">
    <ul class="flex">
      <li><a href="index.html">首页</a>&nbsp;&gt;&nbsp;</li>
      <li><a href="hotZ.html">热门行业</a></li>
    </ul>
  </div>
</div>
<div class="headHer" style="height: 2.8rem;"></div>



<div class="rm hot">
  <div class="reZk hotZ">
    <a href="details.html">
      <div class="reZkA flex">
        <div class="reZkA1">
          <img src="/Public/images/1.jpg" alt="">
        </div>
        <div class="reZkA2">
          <p>3月2日徐州英才网国际拜仁徐州英才网国际拜仁徐州英才网国际拜仁</p>
          <p>2019-02-18</p>
        </div>
      </div>
    </a>
    <a href="details.html">
      <div class="reZkA flex">
        <div class="reZkA1">
          <img src="/Public/images/1.jpg" alt="">
        </div>
        <div class="reZkA2">
          <p>3月2日徐州英才网国际拜仁徐州英才网国际拜仁徐州英才网国际拜仁</p>
          <p>2019-02-18</p>
        </div>
      </div>
    </a>
    <a href="details.html">
      <div class="reZkA flex">
        <div class="reZkA1">
          <img src="/Public/images/1.jpg" alt="">
        </div>
        <div class="reZkA2">
          <p>3月2日徐州英才网国际拜仁徐州英才网国际拜仁徐州英才网国际拜仁</p>
          <p>2019-02-18</p>
        </div>
      </div>
    </a>
    <a href="details.html">
      <div class="reZkA flex">
        <div class="reZkA1">
          <img src="/Public/images/1.jpg" alt="">
        </div>
        <div class="reZkA2">
          <p>3月2日徐州英才网国际拜仁徐州英才网国际拜仁徐州英才网国际拜仁</p>
          <p>2019-02-18</p>
        </div>
      </div>
    </a>
    <a href="details.html">
      <div class="reZkA flex">
        <div class="reZkA1">
          <img src="/Public/images/1.jpg" alt="">
        </div>
        <div class="reZkA2">
          <p>3月2日徐州英才网国际拜仁徐州英才网国际拜仁徐州英才网国际拜仁</p>
          <p>2019-02-18</p>
        </div>
      </div>
    </a>
  </div>
</div>

<div id="biuuu_city"></div>

<div class="foot">
  <div class="indB flex">
    <!--<div class="indB1">-->
    <!--<ul class="flex">-->
    <!--<li><a href="sign.html">登录</a></li>-->
    <!--<li><a href="register.html">注册</a></li>-->
    <!--</ul>-->
    <!--</div>-->
    <div class="indB1">
      <ul class="flex">
        <li><a href="javascript:;">15252005454</a></li>
        <li><a href="#">退出</a></li>
      </ul>
    </div>
    <div class="indB3">
      <a href="javascript:;">TOP</a>
    </div>
  </div>
  <div class="indC">
    <ul class="flex">
      <li><a href="index.html">首页</a></li>
      <li><a href="Jllist.html">个人求职</a></li>
      <li><a href="hotZ.html">黄金招聘区</a></li>
      <li><a href="hangye.html">行业招聘</a></li>
      <li><a href="#">咨询</a></li>
    </ul>
    <p>徐州英才网版权所有©2012-2022</p>
  </div>
</div>



<script>

  // 分页
  var pages=10;// 总页数
  laypage({
    cont: 'biuuu_city',
    pages: pages,
    first: false,
    last: false,
    jump: function(e,first){
      if(!first){
        // 回顶部
        $('body,html').animate({
          scrollTop:0
        },500);
        // 页数
        var page=e.curr;
        $.ajax({
          url:'',
          data:{},
          type:"POST",
          dataType:"json",
          success:function (data) {
            console.log(data)
          }
        });

      }
    }
  })
</script>















</body>
</html>