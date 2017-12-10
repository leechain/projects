<?php

/**
 * @Author: lee li
 * @Date:   2017-12-04 09:32:07
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-04 20:58:56
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	public function add(){
		// echo C('WEB_NAME');//C函数读取配置文件里面参数的值
		// C('WEB_NAME','ssss');//C函数也可以设置配置文件里参数的值，只是运行的时候修改，并不会改变配置文件中的值
		// echo C('WEB_NAME');
		// exit;
		$a=123;
		$this->assign('a',$a);
		$this->display();
	}


	// 增
	public function ff(){
		// get=$_GET['id'];
		$get=I('id');
		echo $get;
		exit;


		$a=new \Home\Model\XxxModel;
		// $a->papa();
		// $a=D('Xxx');//子类，封装，虽然大小写对结果没有什么影响，但是要区分大小写
		// var_dump($a);


		// $b=M('Xxx');//父类
		// $b->add();

		// 面向过程化风格
		// $d=$a->add(['name'=>'lisi','age'=>16,'sex'=>'female']);
		// var_dump($d);

		// 面向对象风格
		$a->name='wangwu';
		$a->age=23;
		$a->sex='man';
		$a->add();
	}

	// 查
	public function cha(){
		$xxxModel=D('Xxx');
		//find只能查一条语句，select可以查询多条语句
		// var_dump($xxxModel->field('name,age')->where('id=6')->find());
		var_dump($xxxModel->field('id,name,age')->where('id<6')->order('id desc')->limit(2,3)->select());
	}

	// 改
	public function up(){
		$xxxModel=D('Xxx');
		$arr=array('name'=>'xiugai');
		$xxxModel->where('id=1')->save($arr);
	}

	// 查
	public function de(){
		$xxxModel=D('Xxx');
		// $xxxModel->delete(4);//删除主键值所在行
		$xxxModel->where('age=11')->delete();//删除符合where条件所对应的行
	}
}