<?php
namespace Home\Controller;
use Think\Controller;
class HbaseController extends Controller {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //初始化
    public function _initialize(){
        if(session("loginuser")==''){$this->redirect('Login/sign');}
        C('uid',session("loginuser.id"));
    }
    /**
     * 获取账户余额
     * @return $balance
     */
    public function trans_balance(){
        $balance = M('user')->where("id = %d",C('uid'))->getField('balance');
        $n = explode(".",$balance);
        if($n[1]=='00'){
            $b = $n[0];
        }else{
            $b = $balance;
        }
        return $b;
    }
}