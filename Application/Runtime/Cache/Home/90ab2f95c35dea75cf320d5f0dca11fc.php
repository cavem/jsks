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
<link rel="stylesheet" href="/Public/admin/css/xadmin.css">
<link rel="stylesheet" href="/Public/lib/css/pagination.css">
<style>
  body,html{background: #fff;}
</style>
<body>
<div class="re">
  <div class="resTi">
    <div class="res-tit">
      <ul class="flex">
        <li><a href="javascript:history.go(-1);"></a></li>
        <li>建仓记录</li>
        <li></li>
      </ul>
    </div>
  </div>
</div>
<div style="overflow: scroll;">  
  <table class="layui-table" style="width:600px;">
    <thead>
        <tr>
        <th>期号|投注时间</th>
        <th>建仓信息</th>
        <th>建仓总金额</th>
        <th>盈利</th>
        </tr> 
    </thead>
    <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["date_no"]); ?><br><?php echo ($vo["tz_time"]); ?></td>
        <td>
            <div class="info-wrap">
            <table class="layui-table" style="margin:initial;">
                <tbody>
                    <?php if(is_array($vo["info"])): $i = 0; $__LIST__ = $vo["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo2["wf"]); ?></td>
                        <td><?php echo ($vo2["val"]); ?></td>
                        <td><?php echo ($vo2["money"]); ?></td>
                        <td><?php echo ($vo2["pl"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            </div>
            
        </td>
        <td><?php echo ($vo["total_money"]); ?></td>
        <td><?php echo ($vo["win_money"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><span class="layui-badge layui-bg-orange">小计</span></td>
        <td style="color:#FFB800;"><?php echo ($xj_tz_total); ?></td>
        <td style="color:#FFB800;"><?php echo ($xj_win_total); ?></td>
      </tr>
      <tr>
        <td colspan="2"><span class="layui-badge">总计</span></td>
        <td class="zj_tz" style="color:#FF5722;">计算中...</td>
        <td class="zj_win" style="color:#FF5722;">计算中...</td>
      </tr>
    </tfoot>
    </table>

</div>
<?php echo ($page); ?>
<script>
var uid = "<?php echo ($_SESSION['loginuser']['id']); ?>";
$(function(){
  //获取总计
  $.post('/Admin/lottery/get_tz_zj',{"uid":uid},function(data){
    data = JSON.parse(data);
    $('.zj_tz').text(data['zj_tz_total']);
    $('.zj_win').text(data['zj_win_total']);
  })
})
</script>

</body>
</html>