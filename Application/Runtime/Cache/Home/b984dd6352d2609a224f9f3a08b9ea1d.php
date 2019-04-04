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
<script>
var sctdurl = "<?php echo U('Job/sctd');?>";
</script>
<?php if($joblist[0]['id'] == ''): ?><div class="leMoe" style="display:block;">
  <p>对不起，您没有申请任何职位</p>
</div><?php endif; ?>

<div class="le">
  <div class="list ">
    <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="lister">
      <a href="<?php echo U('Job/details');?>?id=<?php echo ($vo["id"]); ?>">
        <div class="listA  leA flex">
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
      <div class="lister-L" mid="<?php echo ($vo["jaid"]); ?>">
        <a href="javascript:;"></a>
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>

  <!--分页-->
  <div style="text-align:center;padding: 20px 0;"><?php echo ($page); ?></div>

  <div class="detLisHei"></div>
  <div class="detLis flex">
    <div class="detLis-a">
      <ul class="flex">
        <li><a href="javascript:;">全选</a></li>
        <li class="reba"><a href="javascript:;">删除</a></li>
      </ul>
    </div>
    <div class="detLis-b">
      <a href="javascript:;"></a>
    </div>
  </div>
</div>

<script>
  $(function () {
    // 点击选中
    $('.lister .lister-L').click(function () {
      if($(this).hasClass('lister-L-act')){
        $(this).removeClass('lister-L-act');
      }else{
        $(this).addClass('lister-L-act');
      }
    });
    // 全选
    $('.detLis-a>ul>li:nth-child(1)').click(function () {
      var len=$('.list .lister').length;
      var len1=$('.list .lister .lister-L-act').length;
      if(len1>=len){ //删除全部选中
        $('.list .lister .lister-L').removeClass('lister-L-act')
      }else{ //全部选中
        $('.list .lister .lister-L').addClass('lister-L-act')
      }
    });

    // 删除
    $('.detLis-a>ul>li:nth-child(2)').click(function () {
      var len=$('.list  .lister .lister-L-act').length;
      if(len<=0){
        layer.msg("<p style='color: #fff;'>请先选择！<p/>")
      }else{
        var arr=[];
        $('.list .lister .lister-L-act').each(function () {
          arr.push(parseInt($(this).attr('mid')));
        });
        $.post(sctdurl,{"selectitem":JSON.stringify(arr)},function(data){
          if(data==0){
            layer.msg("<p style='color: #fff;'>删除成功！<p/>");
            window.location.reload();
          }else{
            layer.msg("<p style='color: #fff;'>删除失败！<p/>");
          }
        })
      }
    })

  })
</script>


</body>
</html>