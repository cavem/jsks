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
          <cite>投注管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace('/Admin/lottery/lottery2');" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so mform"  action="" method="GET" style="width:initial;display: inline-block;">
          <input class="layui-input"  autocomplete="off" placeholder="投注期号" name="date_no" value="<?php echo ($date_no); ?>">
          <input class="layui-input"  autocomplete="off" placeholder="会员ID"  name="uid" value="<?php echo ($uid); ?>">
          <input class="layui-input"  autocomplete="off" placeholder="投注时间" id="tz_time"  name="tz_time" value="<?php echo ($tz_time); ?>">
          <button class="layui-btn search" type="submit" title="搜索" lay-submit lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <div style="float:right;">
            <?php echo ($page); ?>
        </div>
      </div>
     
      <table class="layui-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>用户ID</th>
              <th>期号</th>
              <th>开奖号码</th>
              <th>投注信息 [玩法 | 投注点数 | 投注金额 |赔率 ]</th>
              <th>投注时间</th>
              <th width="70px">投注总金额</th>
              <th width="70px">赢钱</th>
            </tr> 
          </thead>
          <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($vo["id"]); ?></td>
              <td><a title="查看" class="viewid" data-val="<?php echo ($vo["uid"]); ?>" href="javascript:;" style="color: #009688">#<?php echo ($vo["uid"]); ?></a></td>
              <td><?php echo ($vo["date_no"]); ?></td>
              <td><?php echo ($vo["kj_num"]); ?></td>
              <td>
                <div class="info-wrap" style="height:41px;overflow:hidden;">
                  <table class="layui-table" style="margin:initial;">
                    <colgroup>
                      <col width="68">
                      <col width="60">
                      <col width="72">
                      <col width="62">
                      <col>
                    </colgroup>
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
                  <?php if(count($vo['info'])>1){echo '<div style="text-align: center;"><a class="view-more" href="javascript:;" style="color: #009688;">查看全部<i class="layui-icon layui-icon-down"></i></a></div>';} ?>
              </td>
              <td><?php echo ($vo["tz_time"]); ?></td>
              <td><?php echo ($vo["total_money"]); ?></td>
              <td><?php echo ($vo["win_money"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6"><span class="layui-badge layui-bg-orange">小计</span></td>
              <td style="color:#FFB800;"><?php echo ($xj_tz_total); ?></td>
              <td style="color:#FFB800;"><?php echo ($xj_win_total); ?></td>
            </tr>
            <tr>
              <td colspan="6"><span class="layui-badge">总计</span></td>
              <td class="zj_tz" style="color:#FF5722;">计算中...</td>
              <td class="zj_win" style="color:#FF5722;">计算中...</td>
            </tr>
            </tfoot>
        </table>
      </div>
      <script>
        layui.use('laydate', function(){
          var laydate = layui.laydate;
          
          //执行一个laydate实例
          laydate.render({
            elem: '#tz_time' //指定元素
          });
        });
        $(function(){
          $('.edit.enable').click(function(){
            var id = $(this).closest('tr').children('td').eq(0).text();
            //prompt层
            layer.prompt({title: '请输入自定义开奖号', formType: 3}, function(text, index){
              layer.load();
              if(text.length!=3){
                layer.msg('您输入的号码格式有误', function(){});
              }else{
                $.post('edit_kj_num',{"id":id,"kj_num":text},function(data){
                  layer.msg(data);
                  window.location.reload();
                })
              }
              
            });
          })
          $('.view-more').click(function(){
            if($(this).hasClass('down')){
              $(this).closest('td').find('.info-wrap').css("height",'41px');
              $(this).removeClass('down');
              $(this).html('<a class="view-more" href="javascript:;" style="color: #009688;">查看全部<i class="layui-icon layui-icon-down"></i></a>');
            }else{
              $(this).closest('td').find('.info-wrap').css("height",'initial');
              $(this).addClass('down');
              $(this).html('<a class="view-more" href="javascript:;" style="color: #009688;">收起<i class="layui-icon layui-icon-up"></i></a>');
            }
            
          })
          //获取总计
          $.post('/Admin/lottery/get_tz_zj',$('.mform').serialize(),function(data){
            data = JSON.parse(data);
            $('.zj_tz').text(data['zj_tz_total']);
            $('.zj_win').text(data['zj_win_total']);
          })
        })
      </script>
    </body>
  
  </html>