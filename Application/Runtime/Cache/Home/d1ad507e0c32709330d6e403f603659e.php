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
    
<div class="index" style="background:url('/Public/images/wait_bg.png') no-repeat center;background-size: 100% 100%;">
    <div style="width:100%;height: 100%;text-align:center;background: rgba(0,0,0,0.5);">
        <div style="font-size:14px;color: #fff;padding-top: 250px;">该理财交易时间为北京时间12:00到00:00，请准时参加</div>
        <div style="color: #fff;font-size:15px;padding-top: 20px;"><span id="dexL1">距交易开始还有</span><span class="mas"><span id="hour_show" style="color:red;">00</span>:<span id="minute_show">00</span>:<span id="second_show">00</span></span><span></span></div>
        <a style="margin-top:20px;display: block;padding: 4px 6px;" href="<?php echo U('Index/index');?>"><button>返回首页</button></a>
    </div>
</div>
</body>

<script>
$(function(){
    var len=$(window).height();
    $('.index').css("height",len);
    timer("<?php echo ($timer); ?>");
})
// 倒计时
function timer(intDiff){
$('.mas').show();
    setInterval(function(){
        var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值
        if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
        if (minute <= 9) minute = '0' + minute;
        if (second <= 9) second = '0' + second;
        $('#day_show').html(day+"天");
        $('#hour_show').html('<s id="h"></s>'+hour);
        $('#minute_show').html('<s></s>'+minute);
        $('#second_show').html('<s></s>'+second);
        }
        
        if(intDiff==0){
            window.location.href="<?php echo U('Game/index');?>"
            clearInterval(timer)
        }
        intDiff--;
    }, 1000);
}
</script>
</html>