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
  <!-- 顶部开始 -->
  <div class="container">
    <div class="logo"><a href="/admin.php">后台管理</a></div>
    <div class="left_open">
      <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav right" lay-filter="">
      <li class="layui-nav-item">
        <a href="javascript:;">admin</a>
        <dl class="layui-nav-child">
          <!-- 二级菜单 -->
          <!-- <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd> -->
          <!-- <dd><a onclick="x_admin_show('切换帐号','login.html')">切换帐号</a></dd> -->
          <dd><a href="<?php echo U('/Admin/Login/login');?>">切换账号</a></dd>
          <dd><a href="<?php echo U('/Admin/Login/loginout');?>">退出</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item to-index"><a href="javascript:;">欢迎您！</a></li>
    </ul>

  </div>
  <!-- 顶部结束 -->
  <!-- 中部开始 -->
  <!-- 左侧菜单开始 -->
  <div class="left-nav">
    <div id="side-nav">
      <ul id="nav">
        <li>
          <a href="javascript:;">
            <i class="iconfont">&#xe6b4;</i>
            <cite>彩票管理</cite>
            <i class="iconfont nav_right">&#xe697;</i>
          </a>
          <ul class="sub-menu">
            <li date-refresh="1">
              <a _href="<?php echo U('/Admin/Lottery/lottery1');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>开奖管理</cite>
              </a>
            </li>
            <li>
              <a _href="<?php echo U('/Admin/Lottery/lottery2');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>投注管理</cite>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
            <i class="iconfont">&#xe6b8;</i>
            <cite>会员管理</cite>
            <i class="iconfont nav_right">&#xe697;</i>
          </a>
          <ul class="sub-menu">
            <li>
              <a _href="<?php echo U('/Admin/Member/member1');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>会员管理</cite>
              </a>
            </li>
            <li>
              <a _href="<?php echo U('/Admin/Member/member3');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>充值管理</cite>
              </a>
            </li>
            <li>
              <a _href="<?php echo U('/Admin/Member/member4');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>提现管理</cite>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
              <i class="layui-icon">&#xe656;</i>
            <cite>系统管理</cite>
            <i class="iconfont nav_right">&#xe697;</i>
          </a>
          <ul class="sub-menu">
            <li>
              <a _href="<?php echo U('/Admin/System/setting');?>">
                <i class="iconfont">&#xe6a7;</i>
                <cite>系统设置</cite>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- <div class="x-slide_left"></div> -->
  <!-- 左侧菜单结束 -->
  <!-- 右侧主体开始 -->
  <div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
      <ul class="layui-tab-title">
        <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
      </ul>
      <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
        <dl>
          <dd data-type="this">关闭当前</dd>
          <dd data-type="other">关闭其它</dd>
          <dd data-type="all">关闭全部</dd>
        </dl>
      </div>
      <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
          <iframe src="<?php echo U('/Admin/Index/welcome');?>" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
        </div>
      </div>
      <div id="tab_show"></div>
    </div>
  </div>
  <div class="page-content-bg"></div>
  <!-- 右侧主体结束 -->
 
  
  <!-- 中部结束 -->
  <!-- 底部开始 -->
  <div class="footer">
    <div class="copyright">Copyright ©2017 admin v2.3 All Rights Reserved</div>
  </div>
  <audio src='/Public/audio/11248.mp3' style='display:none' id='audio'></audio>
  <!-- 底部结束 -->
  <script>
  var wsurl = "ws://39.107.68.39:8888/jsks/server.php";
  websocket = new WebSocket(wsurl);
  if (window.WebSocket) {
        websocket.onopen = function(evevt) {
            console.log("Connected to WebSocket server.")
        };
        websocket.onmessage = function(event) {
            var msg = JSON.parse(event.data);
            var type = msg.type;
            var umsg = msg.message;
            var uname = msg.name;
            var uhead = msg.head;
            var time = msg.time;
            var reciever = msg.reciever;
            if(type=="system"){
              addVoice();
              $('title').html('有一条提现消息');
            }
        };
        websocket.onerror = function(event) {
            console.log("Connected to WebSocket server error")
        };
        websocket.onclose = function(event) {
            console.log("websocket Connection Closed. ")
        }
    } else {
        alert("该浏览器不支持web socket")
    }
    function addVoice(){
        document.getElementById('audio').play();
    }
  </script>



</body>

</html>