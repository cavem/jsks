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
    body .demo-class .layui-layer-btn0{background: #fff;color: #333;border:1px solid #dedede}
    body .demo-class .layui-layer-btn1{    border-color: #1E9FFF; background-color: #1E9FFF; color: #fff;}
</style>
<script>
var username = "<?php echo ($_SESSION['loginuser']['username']); ?>";
var usertype = "<?php echo ($_SESSION['loginuser']['usertype']); ?>";
var headimg = "<?php echo ($_SESSION['loginuser']['headimg']); ?>";
var mynickname = "<?php echo ($_SESSION['loginuser']['nickname']); ?>";
var timers = "<?php echo ($timer); ?>";
var kfqq = "<?php echo ($kfqq); ?>";
var kfws = "<?php echo ($kfws); ?>";
var bankcard = "<?php echo ($bankcard); ?>";
</script>

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
  <div class="indX">
    <div class="dexHead flex"  style="height:87px;">
      <div class="dexHead-img">
        <img src="/Public/images/touxiang/<?php echo ($_SESSION['loginuser']['headimg']); ?>" alt="">
      </div>
      <div class="dexHeadA ">
        <div class="dexHeadA1">
          <p><span>BB2指数</span>第<span class="predateno"></span>期开盘结果</p>
        </div>
        <div class="dexHeadA2">
          <ul class="dexHeadA2-u1 flex">
            <li class=""></li>
            <li class=""></li>
            <li class=""></li>
          </ul>
          <ul class="dexHeadA2-u2 flex">
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="dexLottery" style="height:38px;">
      <p class="bqw">本期为第<span class="curdateno"></span>期&nbsp;<span id="dexL1">距离封盘还有</span><span class="mas"><span id="minute_show">00</span>:<span id="second_show">00</span></span><span></span></p>
      <p class="gjy" style="display:none;">交易时间为12:00-00:00,距交易开始还有<span class="mas"><span id="hour_show2" style="color:red;">00</span>:<span id="minute_show2">00</span>:<span id="second_show2">00</span></span></p>
    </div>
  </div>


  <div class="ind">
    <div class="indTh flex">
      <div class="indA">
        <ul>
          <li><a href="javascript:void(0)" onclick="location.reload()">刷新</a></li>
          <li><a href="<?php echo U('sysinfo');?>">公告</a></li>
          <li><a href="<?php echo U('result');?>">走势</a></li>
          <li><a href="<?php echo U('rule');?>">规则</a></li>
          <li><a id="Upper" href="javascript:;">入金</a></li>
          <li><a href="<?php echo U('User/yinhang');?>">个人</a></li>
          <li><a href="<?php echo U('User/record');?>">建仓</a></li>
          <li><a href="<?php echo U('User/xiafen');?>">出金</a></li>
          <li><a style="background: url(/Public/images/menu2.png) no-repeat center;background-size: 100% 100%;" href="<?php echo U('Index/index');?>">首页</a></li>
        </ul>
      </div>
      <div class="indB">
        <ul>
        </ul>
      </div>
    </div>
  </div>

</div>

<div class="indFor flex">
  <div class="indForA">
    <p>余额：<span id="moneyNum"><?php echo ($balance); ?></span></p>
  </div>
  <div class="indForB">
    <ul class="flex">
      <!--<li><a href="javascript:;">追号</a></li>-->
      <li class="indForB-ul2"><a href="javascript:;">建仓</a></li>
    </ul>
  </div>
</div>

<div class="indBack"></div>
<div class="indBan ">
  <div class="indBan-A">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!--三军-->
        <div class="swiper-slide">
          <div class="indB1">
            <div class="indB1Tit">
              <p>三军、涨跌红绿</p>
            </div>
            <div class="indB1-a">
              <ul class="flex">
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="1" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="2" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="3" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="4" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="5" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-a"><a href="javascript:;" data-wf="sj" data-val="6" data-pl="1.99"><span>1.99</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="dx" data-val="涨" data-pl="1.99"><p>涨</p><span>1.99</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="dx" data-val="跌" data-pl="1.99"><p>跌</p><span>1.99</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="ds" data-val="红" data-pl="1.99"><p>红</p><span>1.99</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="ds" data-val="绿" data-pl="1.99"><p>绿</p><span>1.99</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--指定全数-->
        <div class="swiper-slide">
          <div class="indB1">
            <div class="indB1Tit">
              <p>指定全数、全数</p>
            </div>
            <div class="indB1-a indB2-a">
              <ul class="flex">
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="111" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="222" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="333" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="444" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="555" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-b-a"><a href="javascript:;" data-wf="ws" data-val="666" data-pl="175"><p class="flex"><i></i><i></i><i></i></p><span>175</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="qs" data-val="" data-pl="35"><p>全数</p><span>35</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--点数-->
        <div class="swiper-slide">
          <div class="indB1">
            <div class="indB1Tit">
              <p>点数</p>
            </div>
            <div class="indB1-a indB2-a">
              <ul class="flex">
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="4" data-pl="68"><p>4点</p><span>68</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="5" data-pl="34"><p>5点</p><span>34</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="6" data-pl="20.5"><p>6点</p><span>20.5</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="7" data-pl="13.6"><p>7点</p><span>13.6</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="8" data-pl="9.7"><p>8点</p><span>9.7</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="9" data-pl="8"><p>9点</p><span>8</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="10" data-pl="7.6"><p>10点</p><span>7.6</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="11" data-pl="7.6"><p>11点</p><span>7.6</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="12" data-pl="8.2"><p>12点</p><span>8.2</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="13" data-pl="9.7"><p>13点</p><span>9.7</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="14" data-pl="13.5"><p>14点</p><span>13.5</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="15" data-pl="20.5"><p>15点</p><span>20.5</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="16" data-pl="34"><p>16点</p><span>34</span></a></li>
                <li class="indB1-a-b"><a href="javascript:;" data-wf="hz" data-val="17" data-pl="68"><p>17点</p><span>68</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--长牌-->
        <!-- <div class="swiper-slide">
          <div class="indB1">
            <div class="indB1Tit">
              <p>长牌</p>
            </div>
            <div class="indB1-a indB3-a">
              <ul class="flex">
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="12" data-pl="7"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_2.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="13" data-pl="7"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_3.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="14" data-pl="7"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_4.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="15" data-pl="7"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_5.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="16" data-pl="7"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="23" data-pl="7"><p class="flex"><i><img src="/Public/images/s_2.png" alt=""></i><i><img src="/Public/images/s_3.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="24" data-pl="7"><p class="flex"><i><img src="/Public/images/s_2.png" alt=""></i><i><img src="/Public/images/s_4.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="25" data-pl="7"><p class="flex"><i><img src="/Public/images/s_2.png" alt=""></i><i><img src="/Public/images/s_5.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="26" data-pl="7"><p class="flex"><i><img src="/Public/images/s_2.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="34" data-pl="7"><p class="flex"><i><img src="/Public/images/s_3.png" alt=""></i><i><img src="/Public/images/s_4.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="35" data-pl="7"><p class="flex"><i><img src="/Public/images/s_3.png" alt=""></i><i><img src="/Public/images/s_5.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="36" data-pl="7"><p class="flex"><i><img src="/Public/images/s_3.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="45" data-pl="7"><p class="flex"><i><img src="/Public/images/s_4.png" alt=""></i><i><img src="/Public/images/s_5.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="46" data-pl="7"><p class="flex"><i><img src="/Public/images/s_4.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>7</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="cp" data-val="56" data-pl="7"><p class="flex"><i><img src="/Public/images/s_5.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>7</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="indB1">
            <div class="indB1Tit">
              <p>短牌</p>
            </div>
            <div class="indB1-a indB3-a">
              <ul class="flex">
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="11" data-pl="11"><p class="flex"><i><img src="/Public/images/s_1.png" alt=""></i><i><img src="/Public/images/s_1.png" alt=""></i></p><span>11</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="22" data-pl="11"><p class="flex"><i><img src="/Public/images/s_2.png" alt=""></i><i><img src="/Public/images/s_2.png" alt=""></i></p><span>11</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="33" data-pl="11"><p class="flex"><i><img src="/Public/images/s_3.png" alt=""></i><i><img src="/Public/images/s_3.png" alt=""></i></p><span>11</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="44" data-pl="11"><p class="flex"><i><img src="/Public/images/s_4.png" alt=""></i><i><img src="/Public/images/s_4.png" alt=""></i></p><span>11</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="55" data-pl="11"><p class="flex"><i><img src="/Public/images/s_5.png" alt=""></i><i><img src="/Public/images/s_5.png" alt=""></i></p><span>11</span></a></li>
                <li class="indB3-b-a"><a href="javascript:;" data-wf="dp" data-val="66" data-pl="11"><p class="flex"><i><img src="/Public/images/s_6.png" alt=""></i><i><img src="/Public/images/s_6.png" alt=""></i></p><span>11</span></a></li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="indBanL">
      <ul class="flex">
        <li><a href="javascript:;"></a></li>
        <li><a href="javascript:;"></a></li>
      </ul>
    </div>
    <div class="indMon">
      <div class="indB1-b flex">
        <div class="indB1-b1">
          <a href="javascript:;">全仓</a>
        </div>
        <ul class="flex">
          <li><a href="javascript:;">快速建仓</a></li>
          <li><a href="javascript:;">最小建仓</a></li>
        </ul>
      </div>
      <div class="indB1-c">
        <ul class="flex">
          <li>建仓金额</li>
          <li><input type="number" id="sum"></li>
          <li><button type="button">建仓</button></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="draggable" style="position: absolute;bottom: 40px;right: 0px;background: #3478F5;color: #fff;width: 50px;height: 50px;line-height: 50px;text-align: center;font-size: 16px;border-radius: 50px;"><a style="color:#fff;font-size:16;display:block;width: 100%;height: 100%;" class="kfhh" href="javascript:;">客服</a></div>
<script src="/Public/js/game.js"></script>
<script type="text/javascript" src="/Public/js/draggabilly.pkgd.min.js"></script>
<script>
$(function(){
  $('.draggable').draggabilly({ containment: true });
  $('.kfhh').click(function(){
    layer.open({
        title: "提示",
        content: "是否发起客服会话?",
        shadeClose: true,
        skin: "demo-class",
        btn: ["取消", "确定"],
        btn2: function() {
            if(isWeiXin()){
              layer.alert("请先添加客服微信："+kfws);
            }else{
              layer.alert("请先添加客服qq："+kfqq);
              window.location.href = "mqqwpa://im/chat?chat_type=wpa&uin=" + kfqq + "&version=1&src_type=web&web_src=oicqzone.com"
            }
        }
    })
  })
  function isWeiXin(){
      var ua = window.navigator.userAgent.toLowerCase();
      if(ua.match(/MicroMessenger/i) == 'micromessenger'){
          return true;
      }else{
          return false;
      }
  }
})

</script>

</body>
</html>