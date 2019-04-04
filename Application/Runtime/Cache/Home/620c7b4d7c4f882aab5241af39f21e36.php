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

<div class="sf">
  <div class="sf1">
    <p>会员昵称&nbsp;&nbsp;<span>456123</span></p>
    <p>目前余额&nbsp;&nbsp;<span>1212</span></p>
  </div>
  <div class="sf2 flex">
    <p>支付方式&nbsp;&nbsp;</p>
    <div class="sf2-a">
      <ul>
        <li class="sf2-active"><a href="javascript:;"><p>微信支付</p></a></li>
        <li><a href="javascript:;"><p>支付宝支付</p></a></li>
        <li><a href="javascript:;"><p>银行卡支付</p></a></li>
        <li><a href="javascript:;"><p>其它支付</p></a></li>
      </ul>
    </div>
  </div>
  <div class="sf1 sf3 flex">
    <p>上分金额&nbsp;&nbsp;</p>
    <div class="sf3-put">
      <input type="number" class="numPut" placeholder="请输入上分金额">
    </div>
  </div>
  <div class="sf4">
    <button type="button">提交</button>
  </div>

</div>


<script>
  $(document).ready(function () {
    var len=$(window).height();
    $('.sf').css('height',len)
  });

  $(function () {
    // 点击选中支付方式
    $('.sf2-a>ul>li>a').click(function () {
     $(this).parent().addClass('sf2-active').siblings().removeClass('sf2-active')
    });

    // 点击提交
    $('.sf4>button').click(function () {
      var valu=$('.numPut').val();
      if(valu==''){
        layer.msg('请输入金额！');
      }else{
        $.ajax({
          url:'',
          data:{},
          type:"POST",
          dataType:"json",
          success:function (data) {
            console.log(data)
          }
        })
      }
    })

  })

</script>

</body>
</html>