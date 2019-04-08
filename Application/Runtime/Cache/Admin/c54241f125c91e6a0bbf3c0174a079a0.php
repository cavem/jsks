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
                <input type="text" name="id" readonly autocomplete="off" class="layui-input" value="<?php echo ($info["id"]); ?>">
            </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">用户名</label>
          <div class="layui-input-block">
            <input type="text" name="username" autocomplete="off" class="layui-input" value="<?php echo ($info["username"]); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">用户密码</label>
          <div class="layui-input-block">
            <input type="password" name="password" placeholder="若空则不做修改" autocomplete="off" class="layui-input" value="">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">昵称</label>
          <div class="layui-input-block">
            <input type="text" name="nickname" autocomplete="off" class="layui-input" value="<?php echo ($info["nickname"]); ?>">
          </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账户余额</label>
            <div class="layui-input-block">
                <input type="number" name="balance" autocomplete="off" class="layui-input" value="<?php echo ($info["balance"]); ?>">
            </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">用户类型</label>
          <div class="layui-input-block">
            <input type="radio" name="usertype" value="1" title="普通用户" <?php echo ($info['usertype']==1?checked:''); ?>>
            <input type="radio" name="usertype" value="0" title="管理员" <?php echo ($info['usertype']==0?checked:''); ?>>
          </div>
        </div>
        <div class="layui-form-item" style="text-align:center;">
          <button type="submit" class="paysub layui-btn">保存</button>
        </div>
      </form>
      
</body>
<script>
$(function(){

})
</script>
</html>