<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        if(IS_POST){
            $data = M('user')->create();
            $data['password'] = md5($data['password']);
            $data['usertype'] = 0;
            if(M('user')->where($data)->find()){
                $info = M('user')->where($data)->find();
                session("admin",$info);
                $this->success("登录成功",'/Admin/Index/index');exit;
            }else{
                $this->error("用户名或密码错误");
            }
        }
        $this->assign("title","后台管理系统-登录");
        $this->display();
    }
    public function loginout(){
        session("admin",null);
        $this->redirect('login');
    }
}