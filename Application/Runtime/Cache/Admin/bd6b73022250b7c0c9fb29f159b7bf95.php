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
        <a href="javascript:;">会员管理</a>
        <a>
          <cite>提现管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so"   action="" method="GET" style="width:initial;display: inline-block;" >
          <input class="layui-input"  autocomplete="off" placeholder="用户ID"  id="uid" name="uid">
          <input class="layui-input"  autocomplete="off" placeholder="提现时间"  id="tx_time" name="tx_time">
          <select name="state">
              <option value=""></option>
              <option value="审核中">审核中</option>
              <option value="已确认">已确认</option>
          </select>
          <input class="layui-input"  autocomplete="off" placeholder="确认时间"  id="qr_time" name="qr_time">
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
            <th>用户ID</th>
            <th>姓名</th>
            <th>提现卡号</th>
            <th>提现金额</th>
            <th>提现时间</th>
            <th>提现状态</th>
            <th>确认时间</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><a title="查看" class="viewid" data-val="<?php echo ($vo["uid"]); ?>" href="javascript:;" style="color: #009688">#<?php echo ($vo["uid"]); ?></a></td>
            <td><?php echo ($vo["truename"]); ?></td>
            <td><?php echo ($vo["cardnum"]); ?></td>
            <td><?php echo ($vo["money"]); ?></td>
            <td><?php echo ($vo["tx_time"]); ?></td>
            <td><?php echo ($vo['state']=="审核中"?'<span class="layui-badge">审核中</span>':'<span class="layui-badge layui-bg-black">已确认</span>'); ?></td>
            <td><?php echo ($vo["qr_time"]); ?></td>
            <td style="width:120px;">  
              <button class="qr layui-btn layui-btn-xs <?php echo ($vo['state']=='审核中'?'enable':'layui-btn-disabled'); ?>" title="确认">
                <i class="layui-icon">确认</i>
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
          elem: '#tx_time' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#qr_time' //指定元素
        });
      });
      $(function(){
        $('.qr.enable').click(function(){
          layer.load()
          var id = $(this).closest('tr').children('td').eq(0).text();
          $.post('qrtx',{"id":id},function(data){
            if(data==0){
              layer.closeAll();
              layer.msg("操作成功");
              window.location.reload();
            }else{
              layer.msg("操作失败");
            }
          })
        })
      })
    </script>
  </body>

</html>