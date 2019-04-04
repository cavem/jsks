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
  <script src="/xzjob/Public/js/jquery.date.js"></script>
  <script src="/xzjob/Public/layer/layer.js"></script>
  <script src="/xzjob/Public/laypage/laypage.js"></script>
  <script src="/xzjob/Public/js/important.js"></script>
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
      <li><a href="Jllist.html">求职信息</a></li>
      <li><a href="hotZ.html">黄金招聘区</a></li>
      <li><a href="hangye.html">行业招聘</a></li>
      <li><a href="#">咨询</a></li>
    </ul>
  </nav>
  <div class="lisNav">
    <ul class="flex">
      <li><a href="index.html">首页</a>&nbsp;&gt;&nbsp;</li>
      <li><a href="<?php echo U('Job/joblist');?>">招聘信息列表</a>&nbsp;&gt;&nbsp;</li>
      <li><a href="#">公司详情</a></li>
    </ul>
  </div>
</div>
<div class="headHer" style="height: 2.8rem;"></div>


<div class="pany">
  <div class="pany-tit">
    <p><?php echo ($info["business_name"]); ?></p>
  </div>
  <div class="pan-js">
    <div class="panJs-tit">
      <p>公司介绍</p>
    </div>
    <div class="panJs-text">
      <p><?php echo ($info["intro"]); ?></p>
    </div>
    <div class="panJs-Te-a ">
      <a href="javascript:;"><span>显示全部</span></a>
    </div>
  </div>
  <div class="pan-js">
    <div class="panJs-tit">
      <p>该公司所有职位</p>
    </div>
    <div class="panJs-w">
      <ul>
        <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Job/details');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["job_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</div>


<div class="foot">
  <div class="indB flex">
    <div class="indB1">
      <ul class="flex">
        <li><a href="<?php echo U('Login/sign');?>">登录</a></li>
        <li><a href="<?php echo U('Login/register');?>">注册</a></li>
      </ul>
    </div>
    <div class="indB3">
      <a href="javascript:;">TOP</a>
    </div>
  </div>
  <div class="indC">
    <ul class="flex">
      <li><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li class="indC-act"><a href="Jllist.html">个人求职</a></li>
      <li><a href="hotZ.html">黄金招聘区</a></li>
      <li><a href="hangye.html">行业招聘</a></li>
      <li><a href="">咨询</a></li>
    </ul>
    <p>徐州英才网版权所有©2012-2022</p>
  </div>
</div>


























</body>
</html>