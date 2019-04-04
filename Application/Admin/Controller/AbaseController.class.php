<?php
namespace Admin\Controller;
use Think\Controller;
class AbaseController extends Controller {
    function  _empty(){
		header( " HTTP/1.0  404  Not Found" );
        $this->display( 'Common:404' );
    }
    //初始化
    public function _initialize(){
        if(session("admin")==''){$this->redirect('/Admin/Login/login');}
        C('uid',session("admin.id"));
    }
    /**
     * 获取账户余额
     * @return $balance
     */
    public function trans_balance($uid){
        $balance = M('user')->where("id = %d",$uid)->getField('balance');
        $n = explode(".",$balance);
        if($n[1]=='00'){
            $b = $n[0];
        }else{
            $b = $balance;
        }
        return $b;
    }
    protected function set_config($name,$data){
        $info = "<?php\n return ".var_export($data,true)."\n?>";
        file_put_contents(CONF_PATH.$name.".php",$info);
    }
    protected function get_config($name){
        $config = array();
        $file = CONF_PATH.$name.'.php';
        if(file_exists($file)){
        $config = require $file;
        }
        return $config;
    }
    protected function get_siteconfig(){
        return $this->get_config('site');
    }
    protected function set_siteconfig($data){
        $this->set_config('site',$data);
    }
}