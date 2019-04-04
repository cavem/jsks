<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends AbaseController {
    public function setting(){
        $siteinfo = $this->get_siteconfig();		
		$this->assign ( "siteinfo", $siteinfo );
        $this->display();
    }
    public function set(){
        $siteinfo = $_POST['siteinfo'];
		if(!$siteinfo){
			$this->error ( "非法操作" );
			exit();
		}
        $this->set_siteconfig($siteinfo);
        if(M('setting')->where('id=1')->save($siteinfo)){
            $this->success ( "保存成功！");
        }else{
            $this->success ( "保存成功！");
        }	
		
    }
}