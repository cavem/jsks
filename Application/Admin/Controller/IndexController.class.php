<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AbaseController {
    public function index(){
        $this->assign("title","后台管理系统");
        $this->display();
    }
    public function welcome(){
        $today = date("Y-m-d");
        $tz_money = 0;
        $tz_list = M('tz')->where(array("tz_time" => array('like','%'.$today.'%')))->field('tz_info')->select();
        foreach($tz_list as $k=>$v){
            $item_tz_money = 0;
            $tz_info = json_decode($v['tz_info'],true);
            foreach($tz_info as $k2=>$v2){
                $item_tz_money+=$v2['money'];
            }
            $tz_money+=$item_tz_money;
        }
        $data = array(
            "cz" => M('cz_jl')->where(array("time" => array('like','%'.$today.'%')))->sum('money'),
            "tz" => $tz_money,
            "zj" =>  M('tz')->where(array("tz_time" => array('like','%'.$today.'%')))->sum('win_money'),
            "tx" => M('tx_jl')->where(array("tx_time" => array('like','%'.$today.'%')))->sum('money'),
        );
        $this->assign("data",$data);
        $this->display();
    }
}