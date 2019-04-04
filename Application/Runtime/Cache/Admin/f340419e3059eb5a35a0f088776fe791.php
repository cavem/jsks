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
  })
  </script>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">会员管理</a>
        <a>
          <cite>投注管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" >
            <input class="layui-input"  autocomplete="off" placeholder="投注期号"  id="Issue" name="Issue">
          <input class="layui-input"  autocomplete="off" placeholder="ID"  id="id" name="id">
          <input class="layui-input"  autocomplete="off" placeholder="开始时间" id="start"  name="start">
          <input class="layui-input"  autocomplete="off" placeholder="结束时间" id="end"  name="end">
          <button class="layui-btn" title="搜索" lay-submit lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      
      <table class="layui-table x-admin" id="numTable" lay-filter="numTable"> </table>
      <script type="text/html" id="numDome">
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event='modify'>修改资料</a>
        <a  class="layui-btn layui-btn-xs" lay-event='deit'>代理流水</a>
        <a  class="layui-btn layui-btn-danger layui-btn-xs" lay-event='det'>删除</a>
      </script>
    </div>
    <script>
    

    
    </script>
  </body>

</html>