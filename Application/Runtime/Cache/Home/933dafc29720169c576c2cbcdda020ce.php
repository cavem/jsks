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
<style>
  body,html{background: #fff;}
</style>
<script>
  var loginurl = "<?php echo U('Login/sign');?>";  
</script>
<body>
<div class="head">
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
      <li><a href="<?php echo U('Job/joblist');?>">招聘信息列表</a>&nbsp;&nbsp;</li>
    </ul>
  </div>
  <div class="su">
    <div class="suA flex">
      <div class="suA-a">
        <div class="suA-a-1">
          <p><?php echo ($type); ?></p>
        </div>
        <div class="suA-a-2 animated">
          <ul>
            <li><a href="javascript:;">职位</a></li>
            <li><a href="javascript:;">企业</a></li>
          </ul>
        </div>
      </div>
      <div class="suA-b">
        <form class="mform" action="" method="GET">
          <div class="suA-b-a flex">
            <input type="hidden" class="type" name="type">
            <div class="suA-b-a1">
              <input type="text" name="keyword" value="<?php echo ($keyword); ?>" placeholder="请输入关键字，如：销售经理">
            </div>
            <div class="suA-b-a2">
              <button class="submit"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="headHer" style="height: 3.3rem;"></div>

<div class="list">
  <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="lister">
    <a href="<?php echo U('Job/details');?>?id=<?php echo ($vo["id"]); ?>">
      <div class="listA flex">
        <div class="listAL">
          <p><?php echo ($vo["job_name"]); ?></p>
          <p><?php echo ($vo["update_time"]); ?></p>
          <p><?php echo ($vo["business_name"]); ?></p>
        </div>
        <div class="listAR">
          <p><?php echo ($vo["work_place"]); ?></p>
        </div>
      </div>
    </a>
    <div class="lister-L" data-jid="<?php echo ($vo["id"]); ?>">
      <a href="javascript:;"></a>
    </div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<!--分页-->
<div style="text-align:center;padding: 20px 0;"><?php echo ($page); ?></div>

<div class="detLisHei"></div>
<div class="detLis flex">
  <div class="detLis-a">
    <ul class="flex">
      <li><a href="#">全选</a></li>
      <li><a href="#">投递简历</a></li>
    </ul>
  </div>
  <div class="detLis-b">
    <a href="javascript:;"></a>
  </div>
</div>

<script>
  $(function(){
    // 点击选中
    $('.lister .lister-L>a').click(function () {
      if($(this).parent().hasClass('lister-L-act')){
        $(this).parent().removeClass('lister-L-act')
      }else{
        $(this).parent().addClass('lister-L-act')
      }
    });

    // 全选
    $('.detLis-a>ul>li:nth-child(1)').click(function(){
      var len=$('.list .lister').length;
      var len1=$('.list .lister .lister-L-act').length;
      if(len==len1){
        // 取消全选
        $('.list .lister .lister-L').removeClass('lister-L-act')
      }else{
        // 添加全选
        $('.list .lister .lister-L').addClass('lister-L-act')
      }
    });

    // 投递简历
    $('.detLis-a>ul>li:nth-child(2)').click(function () {
      var len=$('.list .lister .lister-L-act').length;
      if(len==0){
        // 没有选择职位
        layer.msg("<p style='color: #fff;'>请先选择职位！</p>")
      }else{
        layer.load();
        var selectitem = new Array();
        //遍历已选中项
        $('.lister-L-act').each(function(){
          selectitem.push($(this).data('jid'));
        })
        selectitem = JSON.stringify(selectitem);
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
      }
    });
  })

</script>


</body>
</html>