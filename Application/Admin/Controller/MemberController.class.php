<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends AbaseController {
    public function member1(){
        $id = I('id');
        $username = I('username');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($id)){
            $map['id'] = $id;
        }
        if(!empty($username)){
            $map['username'] = array('like','%'.$username.'%');
        }
        if(!empty($reg_time)){
            $map['reg_time'] = array('like','%'.$reg_time.'%');
        }
        $count = M('user')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('user')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function member1_edit(){
        if(IS_POST){
            $data = M('user')->create();
            if(empty($data['password'])){
                unset($data['password']);
            }else{
                $data['password'] = md5($data['password']);
            }
            if(M('user')->save($data)){
                $this->success("保存成功");exit;
            }else{
                $this->success("保存失败");exit;
            }
        }
        $id = I('id');
        $info = M('user')->where("id=%d",$id)->find();
        $this->assign("info",$info);
        $this->display();
    }
    public function member1_view(){
        $uid = I('id');
        $ubank_list = M('user_bank')->where("uid = %d",$uid)->select();
        $this->assign("ubank_list",$ubank_list);
        $this->assign("id",$uid);
        $this->display();
    }
    public function member1_pay(){
        $uid = I('id');
        if(IS_POST){
            $data = M('cz_jl')->create();
            $data['time'] = date("Y-m-d H:i:s");
            if(M('cz_jl')->add($data)){
                $balance = $this->trans_balance($data['uid'])+$data['money'];
                if(M('user')->where("id = %d",$data['uid'])->setField("balance",$balance)){
                    $this->success("充值成功");exit;
                }else{
                    $this->error("充值失败1");
                }
            }else{
                $this->error("充值失败2");
            }
        }
        $this->assign("id",$uid);
        $this->display();
    }
    public function member2(){
        $this->display();
    }
    //充值管理
    public function member3(){
        $uid = I('uid');
        $ordernum = I('ordernum');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($uid)){
            $map['uid'] = $uid;
        }
        if(!empty($ordernum)){
            $map['ordernum'] = array('like','%'.$ordernum.'%');
        }
        if(!empty($time)){
            $map['time'] = array('like','%'.$time.'%');
        }
        $count = M('cz_jl')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('cz_jl')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }
    //提现管理
    public function member4(){
        $uid = I('uid');
        $tx_time = I('tx_time');
        $state = I('state');
        $qr_time = I('qr_time');
        $map = array(
            "_logic" => 'AND'
        );
        if(!empty($uid)){
            $map['uid'] = $uid;
        }
        if(!empty($tx_time)){
            $map['tx_time'] = array('like','%'.$tx_time.'%');
        }
        if(!empty($state)){
            $map['state'] = array('like','%'.$state.'%');
        }
        if(!empty($qr_time)){
            $map['qr_time'] = array('like','%'.$qr_time.'%');
        }
        $count = M('tx_jl')->where($map)->count();
        $Page  = new \Org\Wdc\Page($count,10);
        $show  = $Page->show();
        $list = M('tx_jl')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }
    /**
     * 提现
     */
    public function qrtx(){
        $id = I('id');
        $data = array(
            "state" => "已确认",
            "qr_time" => date("Y-m-d H:i:s")
        );
        if(M('tx_jl')->where("id = %d",$id)->save($data)){
            $state = 0;
        }else{
            $state = 1;
        }
        $this->ajaxReturn($state);
    }
}