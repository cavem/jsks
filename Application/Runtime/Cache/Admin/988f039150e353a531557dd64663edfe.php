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
<div class="layui-tab" style="margin:0;">
    <ul class="layui-tab-title">
        <li class="layui-this">投注信息</li>
        <li>充值记录</li>
        <li>提现记录</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <iframe style="width:100%;height:390px;border:0;" src="<?php echo U('Lottery/lottery2');?>?uid=<?php echo ($id); ?>"></iframe>
        </div>
        <div class="layui-tab-item">
            <iframe style="width:100%;height:990px;border:0;" src="<?php echo U('Member/member3');?>?uid=<?php echo ($id); ?>"></iframe>
        </div>
        <div class="layui-tab-item">
            <iframe style="width:100%;height:990px;border:0;" src="<?php echo U('Member/member4');?>?uid=<?php echo ($id); ?>"></iframe>
        </div>
    </div>
</div>
</body>
</html>