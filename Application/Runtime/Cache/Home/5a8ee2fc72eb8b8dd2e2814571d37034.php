<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/xzjob/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/xzjob/Public/css/animate.css">
  <link rel="stylesheet" href="/xzjob/Public/css/style.css">
  <link rel="stylesheet" href="/xzjob/Public/lib/css/pagination.css">
  <script src="/xzjob/Public/js/jquery.min.js"></script>
  <script src="/xzjob/Public/js/swiper.min.js"></script>
  <script src="/xzjob/Public/js/jquery.date.js"></script>
  <script src="/xzjob/Public/layer/layer.js"></script>
  <script src="/xzjob/Public/laypage/laypage.js"></script>
  <script src="/xzjob/Public/js/important.js"></script>
  <title><?php echo ($title); ?></title>
</head>
<body>


<div class="leMoe">
  <p>对不起，暂时没有合适的职位哦~</p>
</div>

<div class="le">
  <div class="list ">
    <div class="lister">
      <a href="#">
        <div class="listA  leA flex">
          <div class="listAL">
            <p>办公室后勤</p>
            <p>2019-03-05</p>
            <p>（电信代理）徐州汇海通信科技有限公司</p>
          </div>
          <div class="listAR">
            <p>徐州</p>
            <span>未申请</span>
          </div>
        </div>
      </a>
      <div class="lister-L" mid="1">
        <a href="javascript:;"></a>
      </div>
    </div>
    <div class="lister">
      <a href="#">
        <div class="listA  leA flex">
          <div class="listAL">
            <p>办公室后勤</p>
            <p>2019-03-05</p>
            <p>（电信代理）徐州汇海通信科技有限公司</p>
          </div>
          <div class="listAR">
            <p>徐州</p>
            <span>未申请</span>
          </div>
        </div>
      </a>
      <div class="lister-L" mid="2">
        <a href="javascript:;"></a>
      </div>
    </div>
  </div>

  <!--分页-->
  <div  id="biuuu_city"></div>

  <div class="detLisHei"></div>
  <div class="detLis flex">
    <div class="detLis-a">
      <ul class="flex">
        <li><a href="#">全选</a></li>
        <li><a href="#">投递简历</a></li>
        <li class="reba"><a href="#">删除</a></li>
      </ul>
    </div>
    <div class="detLis-b">
      <a href="javascript:;"></a>
    </div>
  </div>
</div>






<script src="js/jquery.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="layer/layer.js"></script>
<script src="js/jquery.date.js"></script>
<script src="laypage/laypage.js"></script>
<script src="js/important.js"></script>


<script>

  // 分页
  var pages=10;// 总页数
  laypage({
    cont: 'biuuu_city',
    pages: pages,
    first: false,
    last: false,
    jump: function(e,first){
      if(!first){
        // 回顶部
        $('body,html').animate({
          scrollTop:0
        },500);
        // 页数
        var page=e.curr;
        $.ajax({
          url:'',
          data:{},
          type:"POST",
          dataType:"json",
          success:function (data) {
            console.log(data)
          }
        });

      }
    }
  });


  $(function () {
    // 点击选中
    $('.lister .lister-L').click(function () {
      if($(this).hasClass('lister-L-act')){
        $(this).removeClass('lister-L-act');
      }else{
        $(this).addClass('lister-L-act');
      }
    });
    // 全选
    $('.detLis-a>ul>li:nth-child(1)').click(function () {
      var len=$('.list .lister').length;
      var len1=$('.list .lister .lister-L-act').length;
      if(len1>=len){ //删除全部选中
        $('.list .lister .lister-L').removeClass('lister-L-act')
      }else{ //全部选中
        $('.list .lister .lister-L').addClass('lister-L-act')
      }
    });

    // 投递简历
    $('.detLis-a>ul>li:nth-child(2)').click(function () {

    });

    // 删除
    $('.detLis-a>ul>li:nth-child(3)').click(function () {
      var len=$('.list  .lister .lister-L-act').length;
      if(len<=0){
        layer.msg("<p style='color: #fff;'>请先选择！<p/>")
      }else{
        var arr=[];
        $('.list .lister .lister-L-act').each(function () {
          arr.push($(this).attr('mid'));
        });
        var len=arr.length;
        for(var i=0;i<len;i++){
          console.log(arr[i]);
          $(".list .lister .lister-L[mid="+arr[i]+"]").parent().remove()
        }
        if($('.list .lister').length<=0){
          $('.le').hide();
          $('.leMoe').show()
        }
      }
    })

  })
</script>

</body>
</html>