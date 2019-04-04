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
@media screen and (min-width: 992px){
.layui-col-md12 {
    width: initial;
    display: inline-block;
}
}
</style>
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">会员管理</a>
        <a>
          <cite>会员管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so"  action="" method="GET" style="width:initial;">
          <input class="layui-input"  autocomplete="off" placeholder="ID"  id="id" name="id">
          <input class="layui-input"  autocomplete="off" placeholder="用户名" id="nickname"  name="username">
          <input class="layui-input" autocomplete="off" placeholder="开始时间" id="reg_time"  name="reg_time">
          <button class="layui-btn search" title="搜索" lay-submit lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <div style="float:right;">
          <?php echo ($page); ?>
        </div>
      </div>
      
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>昵称</th>
            <th>余额</th>
            <th>注册时间</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td><?php echo ($vo["nickname"]); ?></td>
            <td><?php echo ($vo["balance"]); ?></td>
            <td><?php echo ($vo["reg_time"]); ?></td>
            <td style="width:180px;">  
              <button class="view layui-btn layui-btn-xs" title="查看">
                <i class="layui-icon">查看</i>
              </button>
              <button class="pay layui-btn layui-btn-xs" title="充值">
                <i class="layui-icon">充值</i>
              </button>
              <button class="edit layui-btn layui-btn-xs" title="编辑">
                  <i class="layui-icon">编辑</i>
                </button>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#reg_time' //指定元素
        });
      });
      $(function(){
        $('.view').click(function(){
          var id = $(this).closest('tr').children('td').eq(0).text();
          layer.open({
            type: 2 //此处以iframe举例
            ,title: '查看'
            ,area: ['900px', '500px']
            ,shade: .3
            ,maxmin: true
            ,content: "<?php echo U('Member/member1_view');?>?id="+id
          });
        })
        $('.pay').click(function(){
          var id = $(this).closest('tr').children('td').eq(0).text();
          layer.open({
            type: 2 //此处以iframe举例
            ,title: '充值'
            ,area: ['900px', '500px']
            ,shade: .3
            ,maxmin: true
            ,content: "<?php echo U('Member/member1_pay');?>?id="+id
          });
        })
        $('.edit').click(function(){
          var id = $(this).closest('tr').children('td').eq(0).text();
          layer.open({
            type: 2 //此处以iframe举例
            ,title: '编辑'
            ,area: ['900px', '500px']
            ,shade: .3
            ,maxmin: true
            ,content: "<?php echo U('Member/member1_edit');?>?id="+id
          });
        })
      })
    </script>
  </body>

</html>