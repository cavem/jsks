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
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">彩票管理</a>
        <a>
          <cite>开奖管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="" method="GET" style="width:initial;">
          <input class="layui-input"  autocomplete="off" placeholder="开奖期号"  id="date" name="date_no">
          <input class="layui-input"  autocomplete="off" placeholder="开奖号码" id="number"  name="kj_num">
          <input class="layui-input" id="start_time" autocomplete="off" placeholder="开始时间" id="number"  name="start_time">
          <button class="layui-btn search" type="submit"  lay-submit lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <div style="float:right;">
          <?php echo ($page); ?>
        </div>
      </div>
      
      <table class="layui-table">
        <colgroup>
          <col width="150">
          <col width="200">
          <col>
        </colgroup>
        <thead>
          <tr>
            <th>ID</th>
            <th>期号</th>
            <th>开奖号码</th>
            <th>开始时间</th>
            <th>开奖时间</th>
            <th>结束时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["date_no"]); ?></td>
            <td><?php echo ($vo["kj_num"]); ?></td>
            <td><?php echo ($vo["start_time"]); ?></td>
            <td><?php echo ($vo['kj_time']==''?'<span class="mas"><span id="minute_show">00</span>:<span id="second_show">00</span></span>':$vo['kj_time']); ?></td>
            <td><?php echo ($vo["end_time"]); ?></td>
            <td><?php echo ($vo['state']=='投注中'?'<span class="layui-badge">投注中</span>':($vo['$state']=='开奖中'?'<span class="layui-badge layui-bg-orange">开奖中</span>':'<span class="layui-badge layui-bg-black">已封盘</span>')); ?></td>
            <td>  
              <button class="edit layui-btn layui-btn-sm <?php echo ($vo['state']=='投注中'?'enable':'layui-btn-disabled'); ?>" title="<?php echo ($vo['state']=='投注中'?'修改开奖号码':''); ?>">
                <i class="layui-icon">&#xe642;</i>
              </button>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
    <script>
    // 倒计时
    function timer(intDiff){
      if(intDiff=='f'){return false;}
      setInterval(function(){
          var day=0,
            hour=0,
            minute=0,
            second=0;//时间默认值
          if(intDiff > 0){
            day = Math.floor(intDiff / (60 * 60 * 24));
            hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
            minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
            second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;
            $('#day_show').html(day+"天");
            $('#hour_show').html('<s id="h"></s>'+hour);
            $('#minute_show').html('<s></s>'+minute);
            $('#second_show').html('<s></s>'+second);
          }
          
          if(intDiff==0){
            window.location.reload();
            clearInterval(timer)
          }
          intDiff--;
        }, 1000);
      }
      //获取剩余时间
      var gettimer = function(){
        $.post('/Admin/Lottery/gettimer',{"n":"n"},function(data){
          data=JSON.parse(data);
          if(data['state']=="投注中"){
            num=data['timer'];
          }else if(data['state']=="开奖中"){
            num=0;
          }else{
            num='f';
          }
          timer(num);
        })
      }
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start_time' //指定元素
        });
      });
      $(function(){
        gettimer();
        $('.edit.enable').click(function(){
          var id = $(this).closest('tr').children('td').eq(0).text();
          var date_no = $(this).closest('tr').children('td').eq(1).text();
          //prompt层
          layer.prompt({title: '请输入自定义开奖号', formType: 3}, function(text, index){
            var n1=text.charAt(0);
            var n2=text.charAt(1);
            var n3=text.charAt(2);
            if(text.length!=3||n1==0||n2==0||n3==0||n1>6||n2>6||n3>6){
              layer.msg('您输入的号码格式有误', function(){});
            }else{
              layer.load();
              $.post('/Admin/Lottery/edit_kj_num',{"id":id,"kj_num":text,"date_no":date_no},function(data){
                layer.msg(data);
                window.location.reload();
              })
            }
            
          });
        })
      })
    </script>
  </body>

</html>