<?php
namespace Home\Controller;
use Think\Controller;
class GameController extends HbaseController {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //首页
    public function index(){
        if(date("His")-120000<0){
            $timer = strtotime("12:00:10")-strtotime(date("His"));
            $this->assign("timer",$timer);
        }
        $this->assign("balance",$this->trans_balance());
        $this->assign("kfqq",C("kfqq"));
        $this->assign("kfws",C("kfws"));
        $this->assign("bankcard",C("bankcard"));
        $this->assign("title","开始建仓");
        $this->display();
    }
    //规则
    public function rule(){
        $this->assign("title","规则");
        $this->display();
    }
    //结果
    public function result(){
        $kj_info = M('kj')->order('id desc')->limit(10)->where("state = '已封盘'")->field('date_no,kj_num,start_time')->select();
        $list = array();
        $hzlist = array();
        foreach($kj_info as $k=>$v){
            $kj_info = $v;
            $kj_dateno = $kj_info["date_no"];
            $kj_num = $kj_info["kj_num"];
            $kj_time = $kj_info["start_time"];
            $n1 = substr($kj_num,0,1);
            $n2 = substr($kj_num,1,1);
            $n3 = substr($kj_num,2);
            $hz = $n1+$n2+$n3;
            if($hz>3&&$hz<11){
                $dx="跌";
            }
            if($hz>10&&$hz<18){
                $dx="涨";
            }
            if($hz%2==0){
                $ds="绿";
            }else{
                $ds="红";
            }
            $resarr = array(
                "n1" => $n1,
                "n2" => $n2,
                "n3" => $n3,
                "hz" => $hz,
                "dx" => $dx,
                "ds" => $ds,
                "dateno" => $kj_dateno,
                "start_time" => $kj_time
            );
            $list[$k] = $resarr;
            array_push($hzlist,$hz);
        }
        $this->assign("hzlist",json_encode($hzlist));
        $this->assign("list",$list);
        $this->assign("title","开盘结果");
        $this->display();
    }
    //公告
    public function sysinfo(){
        $this->assign("sysinfo",C("sysinfo"));
        $this->display();
    }
    //等待
    public function wait(){
        $timer = strtotime("12:00:00")-strtotime(date("His"));
        if($timer<0){
            $this->redirect("index");exit;
        }
        $this->assign("timer",$timer);
        $this->display();
    }
    /**
     * 保存投注信息
     * @return json 0:投注成功 1:余额不足
     */
    public function save_tzinfo(){
        $money = 0;
        $balance = $this->trans_balance();
        $tz_info = htmlspecialchars_decode(I('tz_info'));
        //遍历投注信息
        $tz_info_arr = json_decode($tz_info,true);
        foreach($tz_info_arr as $k=>$v){
            $money+=$v['money'];
        }
        //判断余额是否足够
        if($balance<$money){$this->ajaxReturn(json_encode(array("code" => 1,"msg" => "余额不足")));exit;}
        $data = array(
            "uid" => C('uid'),
            "date_no" => M('kj')->order('id desc')->getField('date_no'),
            "tz_info" => $tz_info,
            "kj_num" => M('kj')->order('id desc')->getField('kj_num'),
            "tz_time" => date("Y-m-d H:i:s")
        );
        if(M('tz')->add($data)){
            //扣除金额
            $balance = $balance-$money;
            if(M('user')->where('id = %d',C('uid'))->setField("balance",$balance)){
                $this->ajaxReturn(json_encode(array("code" => 0,"balance" => $balance)));
            }else{
                $this->ajaxReturn(json_encode(array("code" => 1,"msg" => "扣除金额失败")));
            }
        }else{
            $this->ajaxReturn(json_encode(array("code" => 1,"msg" => "投注失败")));
        }
    }
    /**
     * 获取倒计时
     * @return json $return_data
     */
    public function gettimer(){
        S(array('type'=>'redis','host'=>'127.0.0.1','port'=>'6379','expire'=>10800));
        $curtime = time();
        $kj_info = S("cur_state");
        $start_time = strtotime($kj_info['start_time']);
        switch($kj_info["state"]){
            case '投注中':
                $timer = C('kjsj')-round($curtime-$start_time);
                $return_data = array("state"=>"投注中","timer"=>$timer);
                break;
            case '开奖中':
                $return_data = array("state"=>"开奖中","timer"=>0);
                break;
            case '已封盘':
                $return_data = array("state"=>"已封盘","timer"=>0);
                break;
        }
        $this->ajaxReturn(json_encode($return_data));
    }
    /**
     * 获取本期期号
     */
    public function get_cur_kj(){
        S(array('type'=>'redis','host'=>'127.0.0.1','port'=>'6379','expire'=>10800));
        $this->ajaxReturn(S("cur_dateno"));
    }
    /**
     * 获取上期结果
     * @return 
     */
    public function get_pre_kj(){
        //上期期号开奖结果
        S(array('type'=>'redis','host'=>'127.0.0.1','port'=>'6379','expire'=>10800));
        $this->ajaxReturn(json_encode(S("pre_info")));
    }
    /**
     * 获取本期结果
     * @return 
     */
    public function get_kj(){
        //上期期号开奖结果
        $pre_kj_info = M('kj')->order('id desc')->field('date_no,kj_num')->find();
        $pre_kj_dateno = $pre_kj_info["date_no"];
        $pre_kj_num = $pre_kj_info["kj_num"];
        $n1 = substr($pre_kj_num,0,1);
        $n2 = substr($pre_kj_num,1,1);
        $n3 = substr($pre_kj_num,2);
        $hz = $n1+$n2+$n3;
        if($hz>3&&$hz<11){
            $dx="跌";
        }
        if($hz>10&&$hz<18){
            $dx="涨";
        }
        if($hz%2==0){
            $ds="绿";
        }else{
            $ds="红";
        }
        $resarr = array(
            "n1" => $n1,
            "n2" => $n2,
            "n3" => $n3,
            "hz" => $hz,
            "dx" => $dx,
            "ds" => $ds,
            "dateno" => $pre_kj_dateno
        );
        $this->ajaxReturn(json_encode($resarr));
    }
    /**
     *  获取当前期号开奖状态
     */ 
    // public function get_state(){
    //     S(array('type'=>'redis','host'=>'127.0.0.1','port'=>'6379','expire'=>10800));
    //     $state = S("cur_state");
    //     $this->ajaxReturn($state);
    // }
    /**
     * 获取余额
     */
    public function get_balance(){
        $balance = $this->trans_balance();
        $this->ajaxReturn($balance);
    }
}