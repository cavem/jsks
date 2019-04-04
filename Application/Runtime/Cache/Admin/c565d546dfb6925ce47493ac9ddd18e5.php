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
<style>
.layui-form-select{display: inline-block;}
</style>
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">系统管理</a>
        <a>
          <cite>系统设置</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form class="layui-form mform" action="set" method="POST" style="padding:10px 20px;">
            <div class="layui-form-item">
                <label class="layui-form-label">站点标题</label>
                <div class="layui-input-block">
                    <input type="text" name="siteinfo[title]" autocomplete="off" class="layui-input" value="<?php echo ($siteinfo["title"]); ?>">
                </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">开奖时间(秒)</label>
              <div class="layui-input-block">
                <input type="num" name="siteinfo[kjsj]" autocomplete="off" class="layui-input" value="<?php echo ($siteinfo["kjsj"]); ?>">
              </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">客服QQ</label>
                <div class="layui-input-block">
                    <input type="text" name="siteinfo[kfqq]" autocomplete="off" class="layui-input" value="<?php echo ($siteinfo["kfqq"]); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">客服微信</label>
                <div class="layui-input-block">
                    <input type="text" name="siteinfo[kfws]" autocomplete="off" class="layui-input" value="<?php echo ($siteinfo["kfws"]); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">公告</label>
                <div class="layui-input-block">
                    <input type="text" name="siteinfo[sysinfo]" autocomplete="off" class="layui-input" value="<?php echo ($siteinfo["sysinfo"]); ?>">
                </div>
            </div>
          </form>
          <div class="layui-form-item" style="text-align:center;">
                <button class="save layui-btn">保存</button>
        </div>
    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#tx_time' //指定元素
        });
      });
      $(function(){
        $('.save').click(function(){
          if($("input[name='title']").val()==''){
            layer.msg('标题不能为空',function(){});
          }else if($("input[name='kjsj']").val()==''){
            layer.msg('开奖时间不能为空',function(){});
          }else if($("input[name='kfqq']").val()==''){
            layer.msg('客服qq不能为空',function(){});
          }else{
            $('.mform').submit();
          }
        })
      })
    </script>
  </body>

</html>