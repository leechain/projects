<?php

namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	// 登录
    public function login(){

    	if(IS_POST){
    		$username=I('post.username');
    		$pwd=I('post.password');
    		$code=I('post.yzm');

      	// 	$Verify=new \Think\Verify();
      	// 	if(!$Verify->check($code)){
	    		// $this->error('验证码错误','',2);
      	// 	}

	    	$userModel=D('user');
	    	$userinfo=$userModel->where(array('username'=>$username))->find();

	    	if(!$userinfo){
	    		$this->error('用户名错误','',2);
	    	}
	    	if($userinfo['password']!==md5($pwd.$userinfo['salt'])){
	    		$this->error('密码错误','',2);
	    	}else{
	    		cookie('userid',$userinfo['password']);
	    		cookie('username',$userinfo['username']);

	    		$coo_kie=jm($userinfo['username'].$userinfo['password'].C('COO_KIE'));
	    		cookie('key',$coo_kie);
	    		$this->success('登录成功','/',3);
	    	}
    	}
    	$this->display(); 
    }

    public function logout(){
    	// 清除cookie即可
    	cookie('username',null);
    	cookie('userid',null);
    	cookie('key',null);
	    $this->success('退出成功','/',3);
    }

    public function yzm(){
      	$Verify=new \Think\Verify();
      	$Verify->fontSize=20;
      	$Verify->length=3;
    	$Verify->entry(); 	
    }

    public function msg(){

    	$this->display(); 
    }

    // 注册
    public function reg(){
    	if(IS_POST){
    		$userModel=D('User');
	    	if(!$userModel->create()){
	    		echo $userModel->getError();
	    		exit;
	    	}
	    	$s=$this->yan();
	    	$userModel->password=md5($userModel->password,$s);
	    	$userModel->salt=$s;
	    	$userModel->add();
    		// var_dump($_POST);

    	}
    	

    	$this->display(); 
    }

    public function yan(){
    	$str='sqw2h792bcsdcdc23vf';
    	//打乱字符串str_shuffle,截取前8个
    	$yan=substr(str_shuffle($str),0,8);
    	return $yan;
        // return substr(str_shuffle($str),0,8);
    }

}