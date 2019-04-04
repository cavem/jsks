<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="/Public/js/jquery.min.js"></script>
  <script src="/Public/js/swiper.min.js"></script>
  <script src="/Public/layer/layer.js"></script>
  <script src="/Public/js/important.js"></script>
  <link rel="stylesheet" href="/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/Public/css/animate.css">
  <link rel="stylesheet" href="/Public/css/style.css">
  <title><?php echo ($title); ?></title>
</head>
<style>
  body,html{background: #fff;}
</style>
<body>
    <div class="res-tit res-titA-z" style="background:#75A3BD;">
        <ul class="flex">
          <li><a href="javascript:history.go(-1);"></a></li>
          <li></li>
          <li></li>
        </ul>
      </div>
      <div class="res-titHei"></div>
<style>
.res-titA-z{position: fixed;top: 0;left: 0;width: 100%;z-index: 999;}
.res-titHei{height: 1rem;}
</style>
  
<div class="thTit" style="top:1rem;">
  <ul class="flex">
    <li class="active"><a href="javascript:;">银行</a></li>
    <li><a href="javascript:;">安全</a></li>
  </ul>
</div>


<div class="th">
  <div class="thA">
    <form class="mform">
    <div class="thF ">
      <div class="thFa flex">
        <div class="thFa1">
          <p>姓名</p>
        </div>
        <div class="thFa2">
          <input type="text" name="truename" id="thFA1-a1" placeholder="如：李四">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>银行卡号</p>
        </div>
        <div class="thFa2">
          <input type="text" name="bank_no" id="thFA1-a2" placeholder="如：6222024100014685770">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>开户行</p>
        </div>
        <div class="thFa2">
          <input type="text" name="bank_name" id="thFA1-a3" placeholder="如：中国银行">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>开户网点</p>
        </div>
        <div class="thFa2">
          <input type="text" name="bank_netdot" id="thFA1-a4" placeholder="如：徐州青年路支行">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>安全码</p>
        </div>
        <div class="thFa2">
          <input type="number" name="safety_code" id="thFA1-a5" class="numPut" placeholder="只能输入数字">
        </div>
      </div>
      <p>注：请记住您的安全码，他将用来修改银行和密码信息</p>
      <div class="thFBut">
        <button type="button" id="thABut">新增</button>
      </div>
    </div>
    </form>
    <div class="tFtable">
      <table class="table">
        <thead>
        <tr>
          <th>姓名</th>
          <th>卡号</th>
          <th>开户行</th>
          <th>网点</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <input type="hidden" class="bid" value="<?php echo ($vo["id"]); ?>">
          <td><?php echo ($vo["truename"]); ?></td>
          <td><?php echo ($vo["bank_no"]); ?></td>
          <td><?php echo ($vo["bank_name"]); ?></td>
          <td><?php echo ($vo["bank_netdot"]); ?></td>
          <td><a href="javascript:;">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

      </table>
    </div>
  </div>
  <div class="thB">
    <form class="pform">
    <div class="thF">
      <div class="thB-ti">
        <p>修改密码</p>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>原始密码</p>
        </div>
        <div class="thFa2">
          <input name="oldpass" type="password" id="thB-1" placeholder="请输入您的原始密码">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>新密码</p>
        </div>
        <div class="thFa2">
          <input name="newpass" type="password" id="thB-3" placeholder="请输入您的新密码">
        </div>
      </div>
      <div class="thFa flex">
        <div class="thFa1">
          <p>确认密码</p>
        </div>
        <div class="thFa2">
          <input name="confpass" type="password" id="thB-4" placeholder="请再次输入您的新密码">
        </div>
      </div>
      <div class="thFBut">
        <button type="button" id="thB-but">修改</button>
      </div>
    </div>
    </form>
  </div>
</div>



<script>
  $(function () {
    // 点击删除
    $('.tFtable .table tbody tr td>a').click(function () {
      var that=$(this);
      layer.open({
        title:'提示',
        content:'确认删除？',
        shadeClose:true,
        btn:['取消','删除'],
        btn2:function () {
          $.post('delbank',{"bid":that.closest('tr').find('.bid').val()},function(data){
            if(data==0){
              that.parent().parent().addClass('fadeOutLeft');
              that.parent().parent().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function () {
                $(this).remove();
              });
            }else{
              layer.msg('删除失败');
            }
          })
        }
      });
    });
    // 新增判断
    $('#thABut').click(function () {
      var name=$('#thFA1-a1').val();
      var kh=$('#thFA1-a2').val();
      var khh=$('#thFA1-a3').val();
      var wd=$('#thFA1-a4').val();
      var aqm=$('#thFA1-a5').val();
      if(name==''){
        layer.msg('请输入姓名');
      }else if(kh==''){
        layer.msg('请输入银行卡号');
      }else if(khh==''){
        layer.msg('请输入开户行');
      }else if(wd==''){
        layer.msg('请输入开户网点');
      }else if(aqm==''){
        layer.msg('请输入安全码');
      }else{
        $.ajax({
          url:'addbank',
          data:$('.mform').serialize(),
          type:"POST",
          dataType:"json",
          success:function (data) {
            if(data==0){
              layer.msg('添加成功');
              window.location.reload();
            }else{
              layer.msg('添加失败');
            }
          }
        })
      }
    });

    // 修改密码提交
    $('#thB-but').click(function () {
      var cPass=$('#thB-1').val();
      var aqm=$('#thB-2').val();
      var pass1=$('#thB-3').val();
      var pass2=$('#thB-4').val();
      if(cPass==''){
        layer.msg('请输入原始密码')
      }else if(pass1==''){
        layer.msg('请输入新密码')
      }else if(pass2!=pass1){
        layer.msg('两次密码输入不一致')
      }else{
        $.ajax({
          url:'editpass',
          data:$('.pform').serialize(),
          type:"POST",
          dataType:"json",
          success:function (data) {
            if(data==0){
              layer.msg('修改成功');
            }else if(data==1){
              layer.msg('原密码错误');
            }else{
              layer.msg('修改失败');
            }
          }
        })
      }
    })



  })
</script>





</body>
</html>