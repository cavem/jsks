<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //登录
    public function sign(){
        if(IS_POST){
            //验证码是否正确
            $flag=$this->check_verify(I('code'));
            if($flag==0){$this->error("验证码错误");exit;}
            $data = M('user')->create();
            $data['password'] = md5($data['password']);
            $res = M('user')->where($data)->find();
            if(!$res){
                $this->error("用户名或密码错误");
            }else{
                $loginuser = M('user')->where("username = '%s'",$data['username'])->find();
                session("loginuser",$loginuser);
                $this->success("登录成功",'/Index/index');exit;
            }
        }
        
        $this->assign("title","登录");
        $this->display();
    }
    //注册
    public function register(){
        if(IS_POST){
            //验证码是否正确
            $flag=$this->check_verify(I('code'));
            if($flag==0){$this->error("验证码错误");exit;}
            //判断用户名是否已被注册
            $res = M('user')->where("username = '%s'",I('username'))->find();
            if($res){$this->error("该用户名已被注册");exit;}
            $data = M('user')->create();
            $data['password'] = md5($data['password']);
            $data['reg_time'] = date("Y-m-d H:i:s");
            if(M('user')->add($data)){
                $loginuser = M('user')->where("username = '%s'",$data['username'])->find();
                session("loginuser",$loginuser);
                $this->success("注册成功","/Index/index");exit;
            }
        }
        
        $this->assign("title","注册");
        $this->display();
    }
    //退出登录
    public function loginout(){
        session("loginuser",null);
        $this->redirect('sign');
    }
    //生成验证码
    public function verify()
    {
        $config = array(
            'fontSize' => 18, // 验证码字体大小
            'length' => 4, // 验证码位数4
            'imageH' => 45,
            'useImgBg' => true,//是否使用背景图片
            'bg' => array(200,200,200),
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
 
    //验证码校验
    public function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        $res = $verify->check($code, $id);
        return $res;
    }
}