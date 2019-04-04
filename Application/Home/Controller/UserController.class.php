<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends HbaseController {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //上分
    public function shangfen(){
        $this->assign("title","上分");
        $this->display();
    }
    //投注记录
    public function record(){
        $map = array(
            "uid" => C('uid'),
        );
        $count = M('tz')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('tz')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $xj_tz_total = 0;
        $xj_win_total = 0;
        foreach($list as $k=>$v){
            $date_no = $v['date_no'];
            $state = M('kj')->where("date_no = '%s'",$date_no)->getField('state');
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
                $list[$k]['state']=$state;
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
    //下分
    public function xiafen(){
        if(IS_POST){
            $data = M('tx_jl')->create();
            $balance = $this->trans_balance();
            if($data['money']>$balance){
                $this->ajaxReturn('出仓金额不能大于余额');exit;
            }
            $data['uid'] = C('uid');
            $data['tx_time'] = date("Y-m-d H:i:s");
            if(M('tx_jl')->add($data)){
                $balance = $balance-$data['money'];
                if(M('user')->where("id=%d",C('uid'))->setField("balance",$balance)){
                    $state = 0;
                }else{
                    $state = 1;
                }
            }else{
                $state = 1;
            }
            $this->ajaxReturn($state);
        }
        $this->assign("balance",$this->trans_balance());
        $this->assign("title","出金");
        $this->display();
    }
    //个人中心
    public function yinhang(){
        $list = M('user_bank')->where("uid = %d",C('uid'))->select();
        $this->assign("list",$list);
        $this->assign("title","个人中心");
        $this->display();
    }
    /**
     * 新增银行信息
     * @return int $state
     */
    public function addbank(){
        $data = M('user_bank')->create();
        $data['uid'] = C('uid');
        $data['insert_time'] = date("Y-m-d H:i:s");
        if(M('user_bank')->add($data)){
            $state = 0;
        }else{
            $state = 1;
        }
        $this->ajaxReturn($state);
    }
    /**
     * 删除银行信息
     * @return int $state
     */
    public function delbank(){
        if(M('user_bank')->where("id = %d",I('bid'))->delete()){
            $state = 0;
        }else{
            $state = 1;
        }
        $this->ajaxReturn($state);
    }
    /**
     * 修改密码
     * @return $state [0:成功 1:原密码错误 2:修改失败]
     */
    public function editpass(){
        $oldpass = I('oldpass');
        $newpass = I('newpass');
        if(M('user')->where("id = %d AND password = '%s'",C('uid'),md5($oldpass))->find()){
            if(M('user')->where("id = %d",C('uid'))->setField("password",md5($newpass))){
                $state = 0;
            }else{
                $state = 2;
            }
        }else{
            $state = 1;
        }
        $this->ajaxReturn($state);
    }
}