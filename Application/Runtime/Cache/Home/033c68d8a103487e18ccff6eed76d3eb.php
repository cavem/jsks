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
<script>
  var loginurl = "<?php echo U('Login/sign');?>";  
</script>
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
  <div class="lisNav">
    <ul class="flex">
      <li><a href="<?php echo U('Index/index');?>">首页</a>&nbsp;&gt;&nbsp;</li>
      <li><a href="<?php echo U('Job/joblist');?>">招聘信息列表</a>&nbsp;&gt;&nbsp;</li>
      <li><a href="#">职位详情</a></li>
    </ul>
  </div>
</div>
<div class="headHer" style="height: 2.1rem;"></div>

<!--面议-->
<div class="detaNa">
  <div class="detaNaA">
    <div class="detaNa-tit">
      <p><?php echo ($info["job_name"]); ?><span>[<?php echo ($info["work_pay"]); ?>]</span></p>
    </div>
    <ul>
      <li><a href="<?php echo U('Job/company');?>?id=<?php echo ($info["business_id"]); ?>"><?php echo ($info["business_name"]); ?></a></li>
    </ul>
  </div>
</div>
<!--职位信息-->
<div class="detaNa">
  <div class="detaNaA">
    <div class="detaNa-tit">
      <p>职位信息</p>
    </div>
    <ul class="detaNaA-il">
      <input type="hidden" class="jid" value="<?php echo ($info["id"]); ?>">
      <li>工作地区：<?php echo ($info["work_place"]); ?></li>
      <li>学历要求：<?php echo ($info["edu_require"]); ?></li>
      <li>年龄要求：<?php echo ($info["age_require"]); ?></li>
      <li>性别要求：<?php echo ($info["sex_require"]); ?></li>
      <li>开始时间：<?php echo ($info["start_time"]); ?></li>
    </ul>
  </div>
</div>
<!--职位描述-->
<div class="detaNa">
  <div class="detaNaA">
    <div class="detaNa-tit">
      <p>职位描述</p>
    </div>
    <div class="detaNa-content">
      <?php echo ($info["desc"]); ?>
    </div>
  </div>
</div>
<!--相似职位-->
<div class="detaNa">
  <div class="detaNaA">
    <div class="detaNa-tit">
      <p>相似职位</p>
    </div>
    <div class="detaxS">
      <?php if(is_array($simjoblist)): $i = 0; $__LIST__ = $simjoblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--列表-->
      <a href="<?php echo U('Job/details');?>?id=<?php echo ($vo["id"]); ?>">
        <div class="detS flex">
          <div class="detS1 detS3">
            <p><?php echo ($vo["job_name"]); ?></p>
            <p><?php echo ($vo["business_name"]); ?></p>
          </div>
          <div class="detS2 detS1">
            <p><?php echo ($vo["work_place"]); ?></p>
            <p><?php echo ($vo["work_pay"]); ?></p>
          </div>
        </div>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>

<div class="detLisHei"></div>
<div class="detLis flex">
  <div class="detLis-a">
    <ul class="flex">
      <li><a href="#">投递简历</a></li>
      <li class="reba"><a href="#">收藏</a></li>
    </ul>
  </div>
  <div class="detLis-b">
    <a href="javascript:;"></a>
  </div>
</div>

<script>
  $(function () {
    // 投递简历
    $('.detLis-a>ul>li:first-child').click(function () {
        layer.load();
        var selectitem = [parseInt($('.jid').val())];
        selectitem = JSON.stringify(selectitem);
        console.log(selectitem);
        // 有选择职位 投递简历
        $.ajax({
          url:'tdjl',
          data:{"selectitem":selectitem},
          type:"POST",
          dataType:"json",
          success:function (data) {
            layer.closeAll();
            if(data==0){
              layer.msg("<p style='color: #fff;'>投递简历成功！</p>")
            }else if(data==1){
              layer.msg("<p style='color: #fff;'>该职位您已投递过简历！</p>")
            }else if(data=='nosign'){
              layer.msg("<p style='color: #fff;'>请先登录！</p>");
              window.location.href = loginurl;
            }
            
          }
        })
    });
  
    // 收藏
    $('.detLis-a>ul>li:nth-child(2)').click(function () {
      layer.load();
      $.ajax({
        url:'collect',
        data:{"jid":$('.jid').val()},
        type:"POST",
        dataType:"json",
        success:function (data) {
          layer.closeAll();
          if(data==0){
            layer.msg("<p style='color: #fff;'>职位收藏成功！</p>")
          }else if(data==1){
            layer.msg("<p style='color: #fff;'>您已收藏过该职位！</p>")
          }else{
            layer.msg("<p style='color: #fff;'>收藏失败！</p>")
          }
        }
      })
    });
  })
</script>



</body>
</html>