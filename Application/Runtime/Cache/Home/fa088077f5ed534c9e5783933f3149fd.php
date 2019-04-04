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
  
<div class="index">

  <div class="thF thXf">
    <div class="thFa thXfa flex">
      <div class="thFa1">
        <p>会员昵称</p>
      </div>
      <div class="thFa2">
        <p><?php echo ($_SESSION['loginuser']['nickname']); ?></p>
      </div>
    </div>
    <div class="thFa thXfa flex">
      <div class="thFa1">
        <p>目前金额</p>
      </div>
      <div class="thFa2">
        <p><?php echo ($balance); ?></p>
        <input type="hidden" class="balance" value="<?php echo ($balance); ?>">
      </div>
    </div>
    <form class="mform">
    <div class="thFa flex">
      <div class="thFa1">
        <p>下分金额</p>
      </div>
      <div class="thFa2">
        <input type="number" name="money" id="thFA1-a1" placeholder="请输入下分金额">
      </div>
    </div>
    <div class="thFa flex">
      <div class="thFa1">
        <p>银行卡号</p>
      </div>
      <div class="thFa2">
        <input type="number" name="cardnum" id="thFA1-a2" placeholder="请输入银行卡号">
      </div>
    </div>
    <div class="thFa flex">
      <div class="thFa1">
        <p>开户行</p>
      </div>
      <div class="thFa2">
        <input type="text" name="bank_name" id="thFA1-a3" placeholder="请输入开户行">
      </div>
    </div>
    <div class="thFa flex">
      <div class="thFa1">
        <p>开户网点</p>
      </div>
      <div class="thFa2">
        <input type="text" name="bank_netdot" id="thFA1-a4" placeholder="请输入开户网点">
      </div>
    </div>
    <div class="thFa flex">
      <div class="thFa1">
        <p>姓名</p>
      </div>
      <div class="thFa2">
        <input type="text" name="truename" id="thFA1-a5"  placeholder="请输入姓名">
      </div>
    </div>
    </form>
    <div class="thFBut">
      <button type="button" id="thABut">提交</button>
    </div>
  </div>

</div>

<script>
  $(document).ready(function () {
    var win=$(window).height();
    $('.index').css('height',win)
  })
  $(function () {
    // 点击提交
    $('#thABut').click(function () {
      var x1=$('#thFA1-a1').val();
      var x2=$('#thFA1-a2').val();
      var x3=$('#thFA1-a3').val();
      var x4=$('#thFA1-a4').val();
      var x5=$('#thFA1-a5').val();
      if(x1==''){
        layer.msg('请输入下分金额');
      }else if($('.balance').val()>x1){
        layer.msg('下分金额不能大于余额');
      }else if(x2==''){
        layer.msg('请输入银行卡号');
      }else if(x3==''){
        layer.msg('请输入开户行');
      }else if(x4==''){
        layer.msg('请输入开户网点');
      }else if(x5==''){
        layer.msg('请输入姓名');
      }else{
        layer.load();
        $.ajax({
          url:'',
          data:$('.mform').serialize(),
          type:"POST",
          dataType:"json",
          success:function (data) {
            layer.closeAll();
            if(data==0){
              layer.msg("提交成功");
              window.location.reload();
            }else if(data==1){
              layer.msg("提交失败");
            }else{
              layer.msgt(data);
            }
          }
        })
      }
    })
  })
</script>




</body>
</html>