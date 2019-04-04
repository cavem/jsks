<?php if (!defined('THINK_PATH')) exit();?><html class="x-admin-sm">
  <head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/Public/admin/css/font.css">
    <link rel="stylesheet" href="/Public/admin/css/xadmin.css">
    <link rel="stylesheet" href="/Public/lib/css/pagination.css">
    <script type="text/javascript" src="/Public/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/Public/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/Public/admin/js/cookie.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <script>
  $(function(){
    $('.num,.search,.prev,.next').click(function(){
      layer.load(1, {
        shade: [0.2,'#fff'] //0.1透明度的白色背景
      });
    })
    $('.viewid').click(function(){
      var id = $(this).data('val');
      layer.open({
        type: 2 //此处以iframe举例
        ,title: '查看'
        ,area: ['900px', '600px']
        ,shade: .3
        ,maxmin: true
        ,content: "<?php echo U('Member/member1');?>?id="+id
      });
    })
  })
  </script>
<body>
<form class="layui-form mform" action="" method="POST" style="padding:10px 20px;">
        <div class="layui-form-item">
            <label class="layui-form-label">用户ID</label>
            <div class="layui-input-block">
                <input type="text" name="uid" readonly autocomplete="off" class="layui-input" value="<?php echo ($id); ?>">
            </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">订单号</label>
          <div class="layui-input-block">
            <input type="text" name="ordernum" readonly autocomplete="off" class="layui-input" value="<?php echo 'KS'.date('YmdHis'); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">充值方式</label>
          <div class="layui-input-block">
            <select name="type">
              <option value=""></option>
              <option value="微信">微信</option>
              <option value="支付宝">支付宝</option>
              <option value="银行卡">银行卡</option>
              <option value="其他">其他</option>
            </select>
          </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">充值金额</label>
            <div class="layui-input-block">
                <input type="number" placeholder="请输入充值金额" name="money" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        
      </form>
      <div class="layui-form-item" style="text-align:center;">
            <button class="paysub layui-btn">立即充值</button>
    </div>
</body>
<script>
$(function(){
    $('.paysub').click(function(){
        if($('select[name="type"]').val()==''){
            layer.msg('请选择充值方式', function(){});
        }else if($("input[name='money']").val()==''){
            layer.msg('请输入充值金额', function(){});
        }else{
            layer.load();
            $('.mform').submit();
        }
    })
})
</script>
</html>