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
<script src="https://img.highcharts.com.cn/highcharts/highcharts.js"></script>
<script src="https://img.highcharts.com.cn/highcharts/modules/series-label.js"></script>
<script src="https://img.highcharts.com.cn/highcharts/modules/data.js"></script>
<style>
  body,html{background: #fff}
</style>
<body>
<div class="re">
  <div class="resTi">
    <div class="res-tit">
      <ul class="flex">
        <li><a href="javascript:history.go(-1);"></a></li>
        <li>走势</li>
        <li></li>
      </ul>
    </div>
    <div class="resTiA">
      <ul class="flex">
        <li style="width:initial;padding:0 5px;">近十期指数走势图</li>
        <!-- <li>
          <select id="">
            <option value="">2019-3-18</option>
            <option value="">2019-3-18</option>
            <option value="">2019-3-18</option>
            <option value="">2019-3-18</option>
            <option value="">2019-3-18</option>
          </select>
        </li> -->
      </ul>
    </div>
    <div class="chart" id="chart" style="height:5rem;">
    </div>
    <div class="resTiB">
      <ul class="flex">
        <li>期数</li>
        <li>指数</li>
      </ul>
    </div>
  </div>

  <div class="res">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="resA flex">
      <div class="resA1">
        <P><?php echo ($vo["dateno"]); ?></P>
        <P><?php echo ($vo["start_time"]); ?></P>
      </div>
      <div class="resA2">
        <div class="resA2A flex">
          <i class="resA2-<?php echo ($vo["n1"]); ?>"></i>
          <i class="resA2-<?php echo ($vo["n2"]); ?>"></i>
          <i class="resA2-<?php echo ($vo["n3"]); ?>"></i>
        </div>
        <div class="resA2B">
          <ul class="flex">
            <li><?php echo ($vo["hz"]); ?></li>
            <li><?php echo ($vo["dx"]); ?></li>
            <li><?php echo ($vo["ds"]); ?></li>
          </ul>
        </div>
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>


</div>


<script>
  $(window).scroll(function(){
      var len=$('.resTiB').offset().top;
      var len1=$('.res').offset().top;
      console.log($(window).scrollTop())
      if($(window).scrollTop()>len){
        $('.resTiB').addClass('resTiB-fiexd');
        $('.res').addClass('resMar');
      }else if($(window).scrollTop()<len1){
        $('.resTiB').removeClass('resTiB-fiexd')
        $('.res').removeClass('resMar');
        return false
      }
    })

    var hzlist = JSON.parse("<?php echo ($hzlist); ?>");
    var arr = [0];
    arr=arr.concat(hzlist);
    var arr1_f = [];
    var arr1_s = [];
    for(var i in arr){
      if(arr[i]==0){
        arr1_f.push(null);
        arr1_s.push('-');
      }else{
        arr1_f.push(i);
        if(arr[i]==3||arr[i]==5||arr[i]==7||arr[i]==9){
          arr1_s.push(5);
        }else if(arr[i]==4||arr[i]==6||arr[i]==8||arr[i]==10){
          arr1_s.push(10);
        }else if(arr[i]==11||arr[i]==13||arr[i]==15||arr[i]==17){
          arr1_s.push(15);
        }else{
          arr1_s.push(20);
        }
      }
    }
    var arr1 = [arr1_f,arr1_s];
    Highcharts.chart('chart', {
      chart:{
        // backgroundColor:'#75A3BD'
      },
      title: {
        text: null
      },
      credits: {
        enabled: false//不显示LOGO
      },
      legend: {
        enabled: false,
      },
      yAxis: {
        tickPosition: [0, 5, 10, 15, 20],
        labels: {
          formatter: function (value) {
            // console.log(this.value)
            if (this.value == 5) {
              return "跌红";
            } else if (this.value == 10) {
              return "跌绿";
            } else if (this.value == 15) {
              return "涨红";
            } else if (this.value == 20) {
              return "涨绿";
            } else {
              return "";
            }
          }
        },
        title: {
          text: null
        }
      },
      plotOptions: {
        series: {
          dataLabels: {
            enabled: true,
            formatter: function (e) {
              return arr[this.x]
            }
          }
        }
      },
      data: {
        columns: arr1
        // [
        //   [null, 1,2,3,4],  // 第一行为数据列的名字
        //   ['开奖走势图', 15, 5,15,10], 		  // 分类及数值
        // ]
      }
    });
</script>

</body>
</html>