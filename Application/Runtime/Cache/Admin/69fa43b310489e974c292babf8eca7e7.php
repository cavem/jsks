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
    <div class="x-body">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo ($_SESSION['admin']['username']); ?></span>！当前时间:<?php echo date("Y-m-d H:i:s"); ?>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
                    <i class="layui-icon" style="line-height:30px">ဂ</i>
                </a>
        </blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>今日充值</h3>
                                                <p>
                                                    <cite><?php echo ((isset($data["cz"]) && ($data["cz"] !== ""))?($data["cz"]):"0.00"); ?></cite>元</p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>今日投注</h3>
                                                <p>
                                                    <cite><?php echo ((isset($data["tz"]) && ($data["tz"] !== ""))?($data["tz"]):"0.00"); ?></cite>元</p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>今日中奖</h3>
                                                <p>
                                                    <cite><?php echo ((isset($data["zj"]) && ($data["zj"] !== ""))?($data["zj"]):"0.00"); ?></cite>元</p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>今日提现</h3>
                                                <p>
                                                    <cite><?php echo ((isset($data["tx"]) && ($data["tx"] !== ""))?($data["tx"]):"0.00"); ?></cite>元</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    </body>
</html>