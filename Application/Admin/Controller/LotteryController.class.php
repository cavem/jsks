<?php
namespace Admin\Controller;
use Think\Controller;
class LotteryController extends AbaseController {
    public function lottery1(){
        $date_no = I('date_no');
        $kj_num = I('kj_num');
        $start_time = I('start_time');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($date_no)){
            $map['date_no'] = array('like','%'.$date_no.'%');
        }
        if(!empty($kj_num)){
            $map['kj_num'] = array('like','%'.$kj_num.'%');
        }
        if(!empty($start_time)){
            $map['start_time'] = array('like','%'.$start_time.'%');
        }
        $count = M('kj')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('kj')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function lottery2(){
        $date_no = I('date_no');
        $uid = I('uid');
        $tz_time = I('tz_time');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($date_no)){
            $map['date_no'] = array('like','%'.$date_no.'%');
            $this->assign("date_no",$date_no);
        }
        if(!empty($uid)){
            $map['uid'] = array('like','%'.$uid.'%');
            $this->assign("uid",$uid);
        }
        if(!empty($tz_time)){
            $map['tz_time'] = array('like','%'.$tz_time.'%');
            $this->assign("tz_time",$tz_time);
        }
        $count = M('tz')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('tz')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $xj_tz_total = 0;
        $xj_win_total = 0;
        foreach($list as $k=>$v){
            $tz_info = json_decode($v['tz_info'],true);
            $total_money = 0;
            $info = array();
            foreach($tz_info as $k2=>$v2){
                $wf = $v2['wf'];
                $val = $v2['val'];
                $money = $v2['money'];
                $pl = $v2['pl'];
                switch($wf){
                    case 'sj':$wf='三军';break;case 'dx':$wf='涨跌';break;case 'ds':$wf='红绿';break;case 'ws':$wf='指定全数';break;
                    case 'qs':$wf='全数';break;case 'hz':$wf='点数';break;case 'cp':$wf='长牌';break;case 'dp':$wf='短牌';break;
                }
                $info_item = array(
                    "wf" => $wf,
                    "val" => $val,
                    "money" => $money,
                    "pl" => $pl
                );
                array_push($info,$info_item);
                $total_money+=$money;
                $list[$k]['info']=$info;
                $list[$k]['total_money']=$total_money;
            }
            $xj_tz_total+=$total_money;
            $xj_win_total+=$v['win_money'];
        }
        $this->assign("xj_tz_total",$xj_tz_total);
        $this->assign("xj_win_total",$xj_win_total);
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }
    /**
     * 获取投注总计
     */
    public function get_tz_zj(){
        $date_no = I('date_no');
        $uid = I('uid');
        $tz_time = I('tz_time');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($date_no)){
            $map['date_no'] = array('like','%'.$date_no.'%');
        }
        if(!empty($uid)){
            $map['uid'] = array('like','%'.$uid.'%');
        }
        if(!empty($tz_time)){
            $map['tz_time'] = array('like','%'.$tz_time.'%');
        }
        $list = M('tz')->where($map)->field('tz_info,win_money')->select();
        $zj_tz_total = 0;
        $zj_win_total = 0;
        foreach($list as $k=>$v){
            $tz_info = json_decode($v['tz_info'],true);
            $total_money = 0;
            $info = array();
            foreach($tz_info as $k2=>$v2){
                $wf = $v2['wf'];
                $val = $v2['val'];
                $money = $v2['money'];
                $pl = $v2['pl'];
                switch($wf){
                    case 'sj':$wf='三军';break;case 'dx':$wf='涨跌';break;case 'ds':$wf='红绿';break;case 'ws':$wf='指定全数';break;
                    case 'qs':$wf='全数';break;case 'hz':$wf='点数';break;case 'cp':$wf='长牌';break;case 'dp':$wf='短牌';break;
                }
                $info_item = array(
                    "wf" => $wf,
                    "val" => $val,
                    "money" => $money,
                    "pl" => $pl
                );
                array_push($info,$info_item);
                $total_money+=$money;
                $list[$k]['info']=$info;
                $list[$k]['total_money']=$total_money;
            }
            $zj_tz_total+=$total_money;
            $zj_win_total+=$v['win_money'];
        }
        $data = array(
            "zj_tz_total" =>  $zj_tz_total,
            "zj_win_total" => $zj_win_total
        );
        $this->ajaxReturn(json_encode($data));
    }
    /**
     * 自定义开奖号码
     */
    public function edit_kj_num(){
        $id = I('id');
        $kj_num = I('kj_num');
        $date_no = I('date_no');
        if(M('kj')->where("id = %d AND state != '%s'",$id,'投注中')->find()){
            $this->ajaxReturn('已封盘，无法修改');exit;//已封盘，无法修改
        }else{
            if(M('kj')->where("id=%d",$id)->setField("kj_num",$kj_num)){
                M('tz')->where("date_no='%s'",$date_no)->setField("kj_num",$kj_num);
                $this->ajaxReturn('修改成功');
            }else{
                $this->ajaxReturn('修改失败');
            }
        }
    }
    /**
     * 获取倒计时
     * @return json $return_data
     */
    public function gettimer(){
        $curtime = time();
        $kj_info = M('kj')->order('id desc')->field('start_time,state')->find();
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
}