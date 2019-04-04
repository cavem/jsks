<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HbaseController {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //首页
    public function index(){
        $this->assign("title",C('title'));
        $this->display();
    }
    //房间
    public function fangjian(){
        if(date('His')-120000<0){
            $this->assign("isopen",0);
        }else {
            $this->assign("isopen",1);
        }
        $this->assign("title","房间");
        $this->display();
    }
}