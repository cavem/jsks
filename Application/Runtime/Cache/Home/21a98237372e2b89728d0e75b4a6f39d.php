<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/Public/css/swiper.min.css">
  <link rel="stylesheet" href="/Public/css/animate.css">
  <link rel="stylesheet" href="/Public/css/style.css">
  <link rel="stylesheet" href="/Public/lib/css/pagination.css">
  <script src="/Public/js/jquery.min.js"></script>
  <script src="/Public/js/swiper.min.js"></script>
  <script src="/Public/layer/layer.js"></script>
  <script src="/Public/laypage/laypage.js"></script>
  <script src="/Public/js/important.js"></script>
  <title><?php echo ($title); ?></title>
</head>
<body>

<div class="mjl">

  <!--基本信息-->
  <div class="mjlF">
    <div class="mjlF-tit ">
      <ul class="flex">
        <li>基本信息</li>
        <!--<li id="grjl1"><a href="Javascript:;">编辑</a></li>-->
      </ul>
    </div>
    <div class="mjlF-l">
      <ul>
        <li class="flex">
          <p>姓名：</p>
          <p id="jbA1"><?php echo ($info['username']?$info['username']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>性别：</p>
          <p id="jbA2"><?php echo ($info['sex']?$info['sex']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>工作年限：</p>
          <p id="jbA3" data-val="<?php echo ($info['workage']?$info['workage']:'0'); ?>"><?php echo ($info['workage']?$info['workage']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>最高学历：</p>
          <p id="jbA4" data-val="<?php echo ($info['education']?$info['education']:'0'); ?>"><?php echo ($info['education']?$info['education']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>现居地址：</p>
          <p id="jbA5"><?php echo ($info['liveplace']?$info['liveplace']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>户口地：</p>
          <p id="jbA6"><?php echo ($info['birthplace']?$info['birthplace']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>出生日期：</p>
          <p id="jbA7"><?php echo ($info['birthdate']?$info['birthdate']:'未填写'); ?></p>
        </li>
      </ul>
    </div>
    <div class="mjTj mjTj-Bjxz" >
      <a href="javascript:;" id="mkFA1"><span>编辑基本信息</span></a>
    </div>
  </div>
  <!--求职意向-->
  <div class="mjlF">
    <div class="mjlF-tit mjlF-tit1">
      <ul class="flex">
        <li>求职意向</li>
        <!--<li><a href="Javascript:;">编辑</a></li>-->
      </ul>
    </div>
    <div class="mjlF-l">
      <ul>
        <li class="flex">
          <p>工作类型：</p>
          <p id="lx1" data-val="<?php echo ($info['work_type']?$info['work_type']:'0'); ?>"><?php echo ($info['work_type']?$info['work_type']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>地区：</p>
          <p id="lx2"><?php echo ($info['work_place']?$info['work_place']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>行业：</p>
          <p id="lx3" data-val="<?php echo ($info['work_industry']?$info['work_industry']:'0'); ?>"><?php echo ($info['work_industry']?$info['work_industry']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>求职意向：</p>
          <p id="lx4"><?php echo ($info['work_position']?$info['work_position']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>薪水：</p>
          <p id="lx5" data-val="<?php echo ($info['work_pay']?$info['work_pay']:'0'); ?>"><?php echo ($info['work_pay']?$info['work_pay']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>工作状态：</p>
          <p id="lx6" data-val="<?php echo ($info['work_state']?$info['work_state']:'0'); ?>"><?php echo ($info['work_state']?$info['work_state']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>到岗日期：</p>
          <p id="lx7" data-val="<?php echo ($info['work_attime']?$info['work_attime']:'0'); ?>"><?php echo ($info['work_attime']?$info['work_attime']:'未填写'); ?></p>
        </li>
      </ul>
    </div>
    <div class="mjTj mjTj-Bjxz" >
      <a href="javascript:;" id="mkFA2"><span>编辑求职意向</span></a>
    </div>
  </div>
  <!--联系方式-->
  <div class="mjlF">
    <div class="mjlF-tit mjlF-tit2">
      <ul class="flex">
        <li>联系方式</li>
      </ul>
    </div>
    <div class="mjlF-l">
      <ul>
        <li class="flex">
          <p>手机号码：</p>
          <p id="lf1"><?php echo ($info['telnum']?$info['telnum']:'未填写'); ?></p>
        </li>
        <li class="flex">
          <p>邮箱：</p>
          <p id="lf2"><?php echo ($info['mail']?$info['mail']:'未填写'); ?></p>
      </ul>
    </div>
    <div class="mjTj mjTj-Bjxz">
      <a href="javascript:;" id="lfBut"><span>编辑联系方式</span></a>
    </div>
  </div>
  <!--工作经验-->
  <div class="mjlF">
    <div class="mjlF-tit mjlF-tit3 mjlF-tit-xz">
      <ul class="flex">
        <li>工作经验</li>
      </ul>
    </div>
    <div class="mjlKL" id="gzjyList">
      <div class="mjlF-l animated" >
        <ul>
          <li class="flex">
            <p>公司名称：</p>
            <p>徐州萨瓦迪卡经济纠纷有限股份公司</p>
          </li>
          <li class="flex">
            <p>任职时间：</p>
            <p><span>2017-07</span>&nbsp;至&nbsp;<span>2018-02</span></p>
          </li>
          <li class="flex">
            <p>职位名称：</p>
            <p>软件工程师</p>
          </li>
          <li class="flex">
            <p>工作描述：</p>
            <p>我他啊有我他啊有弄啥哩我他啊有弄啥哩我他啊有弄啥哩我他啊有弄啥哩我他啊有弄啥哩弄啥哩</p>
          </li>
        </ul>
        <div class="mjlKL-rz mjlbjxG">
          <ul class="flex">
            <li><a href="javascript:;">删除</a></li>
            <li><a href="javascript:;">编辑</a></li>
          </ul>
        </div>
      </div>
      <div class="mjlF-l animated" >
        <ul>
          <li class="flex">
            <p>公司名称：</p>
            <p>徐州萨瓦迪卡经济纠纷有限股份公司</p>
          </li>
          <li class="flex">
            <p>任职时间：</p>
            <p><span>2017-07</span>&nbsp;至&nbsp;<span>2018-02</span></p>
          </li>
          <li class="flex">
            <p>职位名称：</p>
            <p>软件工22程师</p>
          </li>
          <li class="flex">
            <p>工作描述：</p>
            <p>我他啊有我他啊有弄啥22哩我他啊有弄啥哩我他啊有弄啥哩我他啊有弄啥哩我他啊有弄啥哩弄啥哩</p>
          </li>
        </ul>
        <div class="mjlKL-rz mjlbjxG">
          <ul class="flex">
            <li><a href="javascript:;">删除</a></li>
            <li><a href="javascript:;">编辑</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mjTj mjTj-tj">
      <a href="javascript:;" id="gzBut"><span>添加工作经验</span></a>
    </div>
  </div>
  <!--教育经历-->
  <div class="mjlF">
    <div class="mjlF-tit mjlF-tit4 mjlF-tit-xz">
      <ul class="flex">
        <li>教育经历</li>
      </ul>
    </div>
    <div class="mjlKL" id="gzjyList1">
      <div class="mjlF-l animated">
        <ul>
          <li class="flex">
            <p>学校名称：</p>
            <p>北京电影学院</p>
          </li>
          <li class="flex">
            <p>就读时间：</p>
            <p><span>2017-07</span>&nbsp;至&nbsp;<span>2018-02</span></p>
          </li>
          <li class="flex">
            <p>学历：</p>
            <p mid="4">幼儿园</p>
          </li>
          <li class="flex">
            <p>专业：</p>
            <p>jidainasd</p>
          </li>
          <li class="flex">
            <p>在校经历：</p>
            <p>在校荣誉</p>
          </li>
        </ul>
        <div class="mjlKL-rz mjlbjxG">
          <ul class="flex">
            <li><a href="javascript:;">删除</a></li>
            <li><a href="javascript:;">编辑</a></li>
          </ul>
        </div>
      </div>


    </div>
    <div class="mjTj mjTj-tj">
      <a href="javascript:;" id="jyBut"><span>添加教育经历</span></a>
    </div>
  </div>
  <!--自我评价-->
  <div class="mjlF">
    <div class="mjlF-tit mjlF-tit5 ">
      <ul class="flex">
        <li>自我评价</li>
      </ul>
    </div>
    <div class="mjlKL">
      <div class="mjlF-l animated">
        <ul>
          <li class="flex">
            <span id="pj" ><?php echo ($info['evaluation']?$info['evaluation']:'未填写'); ?></span>
          </li>
        </ul>
      </div>
    </div>
    <div class="mjTj mjTj-Bjxz">
      <a href="javascript:;" id="pjBut"><span>编辑自我评价</span></a>
    </div>
  </div>

</div>



<div class="mjkBakc"></div>
<div class="mjNF" id="gejl-Bn">
  <div class="mjNF1 mjNF-a1 animated">
    <div class="mjF1C">
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>姓名</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" id="jbB1" placeholder="请输入姓名">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>性别</p>
        </div>
        <div class="mjF1Ca3 mjF1Ca2" id="mjexc">
          <ul class="flex" >
            <li class="mhSex-act" data-val="男"><a href="javascript:;">男</a></li>
            <li data-val="女"><a href="javascript:;">女</a></li>
          </ul>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>工作年限</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="jbB2">
            <option value="0">请选择</option>
            <option>在读大学生</option>
            <option>应届毕业生</option>
            <option>一年以内</option>
            <option>一年以上</option>
            <option>两年以上</option>
            <option>三年以上</option>
            <option>五年以上</option>
            <option>八年以上</option>
            <option>十年以上</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>最高学历</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="jbB3">
            <option value="0">请选择</option>
            <option>小学</option>
            <option>初中</option>
            <option>高中</option>
            <option>大专</option>
            <option>本科</option>
            <option>MBA</option>
            <option>硕士</option>
            <option>博士</option>
            <option>博士后</option>
            <option>其他</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>现居地址</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" id="jbB4" placeholder="请输入现居地址">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>户口地</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" id="jbB5" placeholder="请输入户口地">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>出生日期</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" readonly   placeholder="请选择出生日期" id="date" data-options="{'type':'YYYY-MM-DD','beginYear':1900,'endYear':2100,'location':'before'}" >
        </div>
      </div>
      <div class="mjF1C-but flex">
        <button type="button">取消</button>
        <button type="button" id="jbaBut">保存</button>
      </div>
    </div>
  </div>
  <div class="mjNF1 mjNF-a2 animated">
    <!--<div class="mjF1-tit">-->
      <!--<a href="javascript:;"></a>-->
    <!--</div>-->
    <div class="mjF1C">
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>工作类型</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="lxA1">
            <option value="0">请选择</option>
            <option>全职</option>
            <option>兼职</option>
            <option>实习</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>地区</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" id="lxA2" placeholder="请输入意向区域">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>行业</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="lxA3">
            <option value="0">请选择</option>
            <option>计算机软件</option>
            <option>计算机硬件</option>
            <option>计算机服务(系统、数据服务，维修)</option>
            <option>通信/电信/网络设备</option>
            <option>通信/电信运营、增值服务</option>
            <option>互联网/电子商务</option>
            <option>网络游戏</option>
            <option>电子技术/半导体/集成电路</option>
            <option>仪器仪表/工业自动化</option>
            <option>会计/审计</option>
            <option>金融/投资/证券</option>
            <option>银行</option>
            <option>保险</option>
            <option>贸易/进出口</option>
            <option>批发/零售</option>
            <option>快速消费品(食品,饮料,化妆品)</option>
            <option>服装/纺织/皮革</option>
            <option>家具/家电/工艺品/玩具/珠宝</option>
            <option>办公用品及设备</option>
            <option>机械/设备/重工</option>
            <option>汽车及零配件</option>
            <option>制药/生物工程</option>
            <option>医疗/护理/保健/卫生</option>
            <option>医疗设备/器械</option>
            <option>广告</option>
            <option>公关/市场推广/会展</option>
            <option>影视/媒体/艺术</option>
            <option>文字媒体/出版</option>
            <option>印刷/包装/造纸</option>
            <option>房地产开发</option>
            <option>建筑/建材/工程</option>
            <option>家居/室内设计/装潢</option>
            <option>物业管理/商业中心</option>
            <option>中介服务</option>
            <option>专业服务(咨询，人力资源)</option>
            <option>外包服务</option>
            <option>检测，认证</option>
            <option>法律</option>
            <option>教育/培训</option>
            <option>学术/科研</option>
            <option>餐饮业</option>
            <option>酒店/旅游</option>
            <option>娱乐/休闲/体育</option>
            <option>美容/保健</option>
            <option>生活服务</option>
            <option>交通/运输/物流</option>
            <option>航天/航空</option>
            <option>石油/化工/矿产/地质</option>
            <option>采掘业/冶炼</option>
            <option>电力/水利</option>
            <option>原材料和加工</option>
            <option>政府</option>
            <option>非盈利机构</option>
            <option>环保</option>
            <option>农业/渔业/林业/牧/木/业</option>
            <option>多元化业务集团公司</option>
            <option>其他行业</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>职位</p>
        </div>
        <div class="mjF1Ca2">
          <input type="text" id="lxA4" placeholder="请输入意向职位">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>期望薪水</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="lxA5">
            <option value="0">请选择</option>
            <option>面议</option>
            <option>499-1000</option>
            <option>999-1500</option>
            <option>1499-2000</option>
            <option>1999-2500</option>
            <option>2499-3000</option>
            <option>2999-3500</option>
            <option>3499-4000</option>
            <option>3999-4500</option>
            <option>4499-5000</option>
            <option>4999-6000</option>
            <option>5999-8000</option>
            <option>7999-10000</option>
            <option>9999-15000</option>
            <option>14999-20000</option>
            <option>19999-30000</option>
            <option>29999-50000</option>
            <option>50000及以上</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>工作状态</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="lxA6">
            <option value="0">请选择</option>
            <option>在职</option>
            <option>离职</option>
            <option>离职已审批</option>
            <option>离职待审批</option>
          </select>
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>到岗时间</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <select name="" id="lxA7">
            <option value="0">请选择</option>
            <option>即时</option>
            <option>一周以内</option>
            <option>一个月以内</option>
            <option>1-3个月</option>
            <option>三个月以后</option>
            <option>待定</option>
          </select>
        </div>
      </div>
      <div class="mjF1C-but flex">
        <button type="button">取消</button>
        <button type="button" id="lxBut">保存</button>
      </div>
    </div>
  </div>
  <div class="mjNF1 mjNF-a3 animated">
    <div class="mjF1C">
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>手机号</p>
        </div>
        <div class="mjF1Ca2 ">
          <input type="text" id="lfA1" placeholder="请输入手机号">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>邮箱</p>
        </div>
        <div class="mjF1Ca2">
          <input type="email" id="lfA2" placeholder="请输入邮箱">
        </div>
      </div>
      <div class="mjF1C-but flex">
        <button type="button">取消</button>
        <button type="button" id="lfABut">保存</button>
      </div>
    </div>
  </div>
  <div class="mjNF1 mjNF-a4 animated">
    <div class="mjF1C">
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>公司名称</p>
        </div>
        <div class="mjF1Ca2 ">
          <input type="text" id="gzA1" placeholder="请输入公司名称">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>任职时间</p>
        </div>
        <div class="mjF1CaLp flex">
          <div class="mjF1Ca2 mjF1Ca4">
            <input type="text" placeholder="入职年份" readonly id="date1" data-options="{'type':'YYYY-MM','beginYear':1900,'endYear':2100}">
          </div>
          <div class="mjF1Ca2 mjF1Ca4">
            <input type="text" placeholder="离职年份" readonly id="date2" data-options="{'type':'YYYY-MM','beginYear':1900,'endYear':2100}">
          </div>
        </div>

      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>所属职位</p>
        </div>
        <div class="mjF1Ca2 ">
          <input type="text" id="gzA2" placeholder="请输入职位">
        </div>
      </div>
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>工作描述</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca5">
          <textarea name="" id="gzA3" placeholder="描述工作内容、工作职责范围及成绩等，限2000字" maxlength="2000"></textarea>
        </div>
      </div>
      <div class="mjF1C-but flex">
        <button type="button">取消</button>
        <button type="button" id="gzAbut">保存</button>
      </div>
    </div>
  </div>
  <div class="mjNF1 mjNF-a5 animated">
  <div class="mjF1C">
    <div class="mjF1Ca flex">
      <div class="mjF1Ca1">
        <p>学校名称</p>
      </div>
      <div class="mjF1Ca2 ">
        <input type="text" id="gy1" placeholder="请输入学校名称">
      </div>
    </div>
    <div class="mjF1Ca flex">
      <div class="mjF1Ca1">
        <p>就读时间</p>
      </div>
      <div class="mjF1CaLp flex">
        <div class="mjF1Ca2 mjF1Ca4">
          <input type="text" placeholder="入职年份" readonly id="date3" data-options="{'type':'YYYY-MM','beginYear':1900,'endYear':2100}">
        </div>
        <div class="mjF1Ca2 mjF1Ca4">
          <input type="text" placeholder="离职年份" readonly id="date4" data-options="{'type':'YYYY-MM','beginYear':1900,'endYear':2100}">
        </div>
      </div>

    </div>
    <div class="mjF1Ca flex">
      <div class="mjF1Ca1">
        <p>专业名称</p>
      </div>
      <div class="mjF1Ca2 ">
        <input type="text" id="gy2" placeholder="请输入专业名称">
      </div>
    </div>
    <div class="mjF1Ca flex">
      <div class="mjF1Ca1">
        <p>学历</p>
      </div>
      <div class="mjF1Ca2 mjF1Ca4">
        <select name="" id="gy3">
          <option value="0">请选择</option>
          <option>小学</option>
          <option>初中</option>
          <option>高中</option>
          <option>大专</option>
          <option>本科</option>
          <option>MBA</option>
          <option>硕士</option>
          <option>博士</option>
          <option>博士后</option>
          <option>其他</option>
        </select>
      </div>
    </div>
    <div class="mjF1Ca flex">
      <div class="mjF1Ca1">
        <p>在校经历</p>
      </div>
      <div class="mjF1Ca2 mjF1Ca5">
        <textarea name="" id="gy4" placeholder="描述你学校担任的职务，获得的荣誉，所学的主要课程、专业，限2000字" maxlength="2000"></textarea>
      </div>
    </div>
    <div class="mjF1C-but flex">
      <button type="button">取消</button>
      <button type="button" id="gyAbut">保存</button>
    </div>
  </div>
</div>
  <div class="mjNF1 mjNF-a6 animated">
    <div class="mjF1C">
      <div class="mjF1Ca flex">
        <div class="mjF1Ca1">
          <p>自我评价</p>
        </div>
        <div class="mjF1Ca2 mjF1Ca5">
          <textarea name="" id="pjA" placeholder="描述你对自己的简短评价，限2000字" maxlength="2000"></textarea>
        </div>
      </div>
      <div class="mjF1C-but flex">
        <button type="button">取消</button>
        <button type="button" id="pjAbut">保存</button>
      </div>
    </div>
  </div>
</div>




<div class="detLisHei"></div>
<div class="detLis flex">
  <div class="detLis-a">
    <ul class="flex">
      <li><a href="index.html">去找工作</a></li>
      <li><a href="Gcenter.html">会员中心</a></li>
    </ul>
  </div>
  <div class="detLis-b">
    <a href="javascript:;"></a>
  </div>
</div>

<script src="/Public/js/jquery.date.js"></script>
<script>
  $.date('#date');
  $.date('#date1');
  $.date('#date2');
  $.date('#date3');
  $.date('#date4');


  // 关闭弹窗动画
  function keep(id) {
    id.removeClass('show');
    id.addClass('flipOutX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function () {
      $(this).removeClass('flipOutX');
      $('.mjkBakc').hide();
      id.hide();
    });
  }

  // 显示弹窗动画
  function cancel(id){
    $('.mjkBakc').show();
    id.show();
    id.addClass('show');
    id.addClass('flipInX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function () {
      $(this).removeClass('flipInX');
    });
  }

  $(function () {
    // 基本信息编辑
    $('#mkFA1').click(function () {
      var jba1=$('#jbA1').html()=='未填写'?'':$('#jbA1').html();
      var jba2=$('#jbA2').html()=='未填写'?'':$('#jbA2').html();
      var jba3=$('#jbA3').data('val');
      var jba4=$('#jbA4').data('val');
      var jba5=$('#jbA5').html()=='未填写'?'':$('#jbA5').html();
      var jba6=$('#jbA6').html()=='未填写'?'':$('#jbA6').html();
      var jba7=$('#jbA7').html()=='未填写'?'':$('#jbA7').html();
      $('#jbB1').val(jba1);
      if(jba2=='男'){
        $('#mjexc>ul>li:nth-child(1)').addClass('mhSex-act').siblings().removeClass('mhSex-act');
      }else{
        $('#mjexc>ul>li:nth-child(2)').addClass('mhSex-act').siblings().removeClass('mhSex-act');
      }
      $('#jbB2').val(jba3);
      $('#jbB3').val(jba4);
      $('#jbB4').val(jba5);
      $('#jbB5').val(jba6);
      $('#date').val(jba7);
      cancel($('.mjNF-a1'))
    });

    // 基本信息编辑保存
    $('#jbaBut').click(function () {
      var j1=$('#jbB1').val();
      var j2=$('#mjexc>ul>.mhSex-act').data('val');
      var j3=$('#jbB2').val();
      var j4=$('#jbB3').val();
      var j5=$('#jbB4').val();
      var j6=$('#jbB5').val();
      var j7=$('#date').val();
      if(j1==''){
        layer.msg("<p style='color: #fff'>姓名不能为空！</p>")
      }else if(j3==0){
        layer.msg("<p style='color: #fff'>请选择工作年限！</p>")
      }else if(j4==0){
        layer.msg("<p style='color: #fff'>请选择最高学历！</p>")
      }else if(j5==''){
        layer.msg("<p style='color: #fff'>请输入现居住地！</p>")
      }else if(j6==''){
        layer.msg("<p style='color: #fff'>请输入户口地！</p>")
      }else {
        layer.load();
        var data = {
          "realname":j1,
          "sex":j2,
          "workage":j3,
          "education":j4,
          "liveplace":j5,
          "birthplace":j6,
          "birthdate":j7
        };
        $.ajax({
          url:'',
          data:data,
          type:"POST",
          dataType:"json",
          success:function(data){
            layer.closeAll();
            if(data==0){
              layer.msg("<p style='color: #fff'>保存成功！</p>")
              window.location.reload();
            }else{
              layer.msg("<p style='color: #fff'>保存失败！</p>")
            }
            keep($('.mjNF-a1'))
          }
        })
      }
    });

    // 求职意向编辑
    $('#mkFA2').click(function () {
      var lx1=$('#lx1').data('val');
      var lx2=$('#lx2').html()=='未填写'?'':$('#lx2').html();
      var lx3=$('#lx3').data('val');
      var lx4=$('#lx4').html()=='未填写'?'':$('#lx4').html();
      var lx5=$('#lx5').data('val');
      var lx6=$('#lx6').data('val');
      var lx7=$('#lx7').data('val');
      $('#lxA1').val(lx1);
      $('#lxA2').val(lx2);
      $('#lxA3').val(lx3);
      $('#lxA4').val(lx4);
      $('#lxA5').val(lx5);
      $('#lxA6').val(lx6);
      $('#lxA7').val(lx7);
      cancel($('.mjNF-a2'))
    });

    // 求职意向保存
    $('#lxBut').click(function(){
      var lx1=$('#lxA1').val();
      var lx2=$('#lxA2').val();
      var lx3=$('#lxA3').val();
      var lx4=$('#lxA4').val();
      var lx5=$('#lxA5').val();
      var lx6=$('#lxA6').val();
      var lx7=$('#lxA7').val();
      if(lx1==0){
        layer.msg("<p style='color: #fff'>请选择工作类型！</p>")
      }else if(lx2==''){
        layer.msg("<p style='color: #fff'>请输入地区！</p>")
      }else if(lx3==0){
        layer.msg("<p style='color: #fff'>请选择行业！</p>")
      }else if(lx4==''){
        layer.msg("<p style='color: #fff'>请输入职位！</p>")
      }else if(lx5==0){
        layer.msg("<p style='color: #fff'>请选择期望薪水！</p>")
      }else if(lx6==0){
        layer.msg("<p style='color: #fff'>请选择工作状态！</p>")
      }else if(lx7==0){
        layer.msg("<p style='color: #fff'>请选择到岗时间！</p>")
      }else{
        layer.load();
        var data = {
          "work_type":lx1,
          "work_place":lx2,
          "work_industry":lx3,
          "work_position":lx4,
          "work_pay":lx5,
          "work_state":lx6,
          "work_attime":lx7
        };
        $.ajax({
          url:'',
          data:data,
          type:"POST",
          dataType:"json",
          success:function(data){
            layer.closeAll();
            if(data==0){
              layer.msg("<p style='color: #fff'>保存成功！</p>")
              window.location.reload();
            }else{
              layer.msg("<p style='color: #fff'>保存失败！</p>")
            }
            keep($('.mjNF-a2'))
          }
        })
      }
    });
    
    // 联系方式编辑
    $('#lfBut').click(function () {
      var lf1=$('#lf1').html()=='未填写'?'':$('#lf1').html();
      var lf2=$('#lf2').html()=='未填写'?'':$('#lf2').html();
      $('#lfA1').val(lf1);
      $('#lfA2').val(lf2);
      cancel($('.mjNF-a3'))
    });

    // 联系方式保存
    $('#lfABut').click(function () {
      var lf1=$('#lfA1').val();
      var lf2=$('#lfA2').val();
      if(!(/^1(3|4|5|7|8)\d{9}$/.test(lf1))){
        layer.msg("<p style='color: #fff;'>请正确填写手机号！</p>")
      }else if(!(/^([\w\.\-]+)\@(\w+)(\.([\w^\_]+)){1,2}$/).test(lf2)){
        layer.msg("<p style='color: #fff;'>请正确填写邮箱！</p>")
      }else{
        layer.load();
        var data = {
          "telnum":lf1,
          "mail":lf2
        };
        $.ajax({
          url:'',
          data:data,
          type:"POST",
          dataType:"json",
          success:function(data){
            layer.closeAll();
            if(data==0){
              layer.msg("<p style='color: #fff'>保存成功！</p>")
              window.location.reload();
            }else{
              layer.msg("<p style='color: #fff'>保存失败！</p>")
            }
            keep($('.mjNF-a3'))
          }
        })
      }
    });
    // 工作经验遍历
    function eachgj(){
      var gjarr=new Array();
      $('#gzjyList').children('.mjlF-l').each(function(){
        var gz1=$(this).find('ul').children('li').eq(0).find('p:nth-child(2)').html();
        var gz2A=$(this).find('ul').children('li').eq(1).find('p:nth-child(2)').find('span:nth-child(1)').html();
        var gz2B=$(this).find('ul').children('li').eq(1).find('p:nth-child(2)').find('span:nth-child(2)').html();
        var gz3=$(this).find('ul').children('li').eq(2).find('p:nth-child(2)').html();
        var gz4=$(this).find('ul').children('li').eq(3).find('p:nth-child(2)').html();
        var obj={
          "公司名称":gz1,
          "任职时间":{"任职时间f":gz2A,"任职时间t":gz2B},
          "职位名称":gz3,
          "工作描述":gz4
        };
        gjarr.push(obj);
      })
      console.log(JSON.stringify(gjarr));
    }
    var isadd = true;
    var index = 0;
    // 工作经验添加
    $('#gzBut').click(function () {
      cancel($('.mjNF-a4'));
      isadd = true;
    });
    // 工作经验编辑
    $('#gzjyList').on('click','.mjlF-l .mjlKL-rz>ul>li:nth-child(2)',function () {
      isadd = false;
      index = $(this).closest('.mjlF-l').index();
      var gz1=$(this).parent().parent().prev().children().eq(0).find('p:nth-child(2)').html();
      var gz2A=$(this).parent().parent().prev().children().eq(1).find('p:nth-child(2)').find('span:nth-child(1)').html();
      var gz2B=$(this).parent().parent().prev().children().eq(1).find('p:nth-child(2)').find('span:nth-child(2)').html();
      var gz3=$(this).parent().parent().prev().children().eq(2).find('p:nth-child(2)').html();
      var gz4=$(this).parent().parent().prev().children().eq(3).find('p:nth-child(2)').html();
      $('#gzA1').val(gz1);
      $('#date1').val(gz2A);
      $('#date2').val(gz2B);
      $('#gzA2').val(gz3);
      $('#gzA3').val(gz4);
      cancel($('.mjNF-a4 '));
    });
    // 工作经验保存
    $('#gzAbut').click(function () {
      var gz1=$('#gzA1').val();
      var date=$('#date1').val();
      var date1=$('#date2').val();
      var gz2=$('#gzA2').val();
      var gz3=$('#gzA3').val();
      if(gz1==''){
        layer.msg("<p style='color: #fff;'>请输入公司名称</p>")
      }else if(date==''){
        layer.msg("<p style='color: #fff;'>请输入入职时间</p>")
      }else if(date1==''){
        layer.msg("<p style='color: #fff;'>请输入离职时间</p>")
      }else if(gz2==''){
        layer.msg("<p style='color: #fff;'>请输入所属职位</p>")
      }else if(gz3==''){
        layer.msg("<p style='color: #fff;'>请输入工作描述</p>")
      }else{
        //添加
        if(isadd){
          $('#gzjyList').append('<div class="mjlF-l animated">'+
          '<ul>'+
            '<li class="flex">'+
              '<p>公司名称：</p>'+
              '<p>'+gz1+'</p>'+
            '</li>'+
            '<li class="flex">'+
              '<p>任职时间：</p>'+
              '<p><span>'+date+'</span>&nbsp;至&nbsp;<span>'+date1+'</span></p>'+
            '</li>'+
            '<li class="flex">'+
              '<p>职位名称：</p>'+
              '<p>'+gz2+'</p>'+
            '</li>'+
            '<li class="flex">'+
              '<p>工作描述：</p>'+
              '<p>'+gz3+'</p>'+
            '</li>'+
          '</ul>'+
          '<div class="mjlKL-rz mjlbjxG">'+
            '<ul class="flex">'+
              '<li><a href="javascript:;">删除</a></li>'+
              '<li><a href="javascript:;">编辑</a></li>'+
            '</ul>'+
          '</div>'+
        '</div>');
        }else{
          var elem = $('#gzjyList').children('.mjlF-l').eq(index);
          elem.find('ul').children('li').eq(0).find('p:nth-child(2)').html(gz1);
          elem.find('ul').children('li').eq(1).find('p:nth-child(2)').find('span:nth-child(1)').html(date);
          elem.find('ul').children('li').eq(1).find('p:nth-child(2)').find('span:nth-child(2)').html(date1);
          elem.find('ul').children('li').eq(2).find('p:nth-child(2)').html(gz2);
          elem.find('ul').children('li').eq(3).find('p:nth-child(2)').html(gz3);
        }
        eachgj();
        $.ajax({
          url:'',
          data:{},
          type:"POST",
          dataType:"json",
          success:function(data){
            console.log(data);
            keep($('.mjNF-a4'))
          }
        })
      }
    });

    // 工作经验删除信息
    $('#gzjyList').on('click','.mjlF-l .mjlKL-rz>ul>li:nth-child(1)',function () {
      var that=$(this);
      layer.open({
        title:'提示',
        content:'确认删除吗？',
        shadeClose:true,
        scrollbar:false,
        btn:['取消','确定'],
        btn2:function(index){
          that.parent().parent().parent().addClass('fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function () {
            $(this).remove();
            eachgj();
          });
          
          $.ajax({
            url:'',
            data:{},
            type:"POST",
            dataType:"json",
            success:function (data) {
              console.log(data);
              layer.msg("<p style='color: #fff;'>删除成功</p>")
            }
          });
        }
      })
    });

    // 教育经历添加
    $('#jyBut').click(function () {
      cancel($('.mjNF-a5 '));
    });

    // 教育经历删除
    $('#gzjyList1').on('click','.mjlF-l .mjlKL-rz>ul>li:nth-child(1)',function () {
      var that=$(this);
      layer.open({
        title:'提示',
        content:'确认删除吗？',
        shadeClose:true,
        scrollbar:false,
        btn:['取消','确定'],
        btn2:function(index){
          $.ajax({
            url:'',
            data:{},
            type:"POST",
            dataType:"json",
            success:function (data) {
              console.log(data);
              that.parent().parent().parent().addClass('fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function () {
                $(this).remove();
                layer.msg("<p style='color: #fff;'>删除成功</p>")
              });
            }
          });
        }
      })
    });

    // 教育经历编辑
    $('#gzjyList1').on('click',' .mjlF-l .mjlKL-rz>ul>li:nth-child(2)',function () {
      var gy1=$(this).parent().parent().prev().children().eq(0).find('p:nth-child(2)').html();
      var gy2A=$(this).parent().parent().prev().children().eq(1).find('p:nth-child(2)').find('span:nth-child(1)').html();
      var gy2B=$(this).parent().parent().prev().children().eq(1).find('p:nth-child(2)').find('span:nth-child(2)').html();
      var gy2=$(this).parent().parent().prev().children().eq(2).find('p:nth-child(2)').data('val');
      var gy3=$(this).parent().parent().prev().children().eq(3).find('p:nth-child(2)').html();
      var gy4=$(this).parent().parent().prev().children().eq(4).find('p:nth-child(2)').html();
      console.log(gy3);
      $('#gy1').val(gy1);
      $('#date3').val(gy2A);
      $('#date4').val(gy2B);
      $('#gy2').val(gy3);
      $('#gy3').val(gy2);
      $('#gy4').val(gy4);
      cancel($('.mjNF-a5 '))
    });

    // 教育经历点击保存
    $('#gyAbut').click(function () {
      var jy1=$('#gy1').val();
      var jy2A=$('#date3').val();
      var jy2B=$('#date4').val();
      var jy2=$('#gy2').val();
      var jy3=$('#gy3').val();
      var jy4=$('#gy4').val();
      if(jy1==''){
        layer.msg("<p style='color: #fff;'>请输入学校名称</p>")
      }else if(jy2==''){
        layer.msg("<p style='color: #fff;'>请输入专业名称</p>")
      }else if(jy3==0){
        layer.msg("<p style='color: #fff;'>请选择学历</p>")
      }else if(jy4==''){
        layer.msg("<p style='color: #fff;'>请填写在校经历</p>")
      }else{
        $.ajax({
          url:'',
          data:{},
          type:"POST",
          dataType:"json",
          success:function(data){
            console.log(data);
            keep($('.mjNF-a5'))
          }
        })
      }
    });

    // 自我评价编辑
    $('#pjBut').click(function () {
      var text=$('#pj').html()=='未填写'?'':$('#pj').html();
      $('#pjA').val(text);
      cancel($('.mjNF-a6'));
    });

    // 自我评价点击保存
    $('#pjAbut').click(function () {
      var text=$('#pjA').val();
      if(text==''){
        layer.msg("<p style='color: #fff;'>内容不能为空！</p>")
      }else{
        layer.load();
        $.ajax({
          url:'',
          data:{"evaluation":text},
          type:"POST",
          dataType:"json",
          success:function(data){
            layer.closeAll();
            if(data==0){
              layer.msg("<p style='color: #fff'>保存成功！</p>")
              window.location.reload();
            }else{
              layer.msg("<p style='color: #fff'>保存失败！</p>")
            }
            keep($('.mjNF-a6'))
          }
        })
      }
    })





  })



</script>



</body>
</html>