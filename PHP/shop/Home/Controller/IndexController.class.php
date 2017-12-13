<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
    	// $addTool=new \Home\Tool\AddTool();
    	// var_dump($addTool->user());
    	// exit;

    	$catModel=D('Admin/Cat');
    	$this->assign('cattree',$catModel->gettree());

    	// 热销
    	$goodsModel=D('Admin/goods');
    	$hot = $goodsModel->field('goods_id,goods_name,shop_price,goods_img,market_price')->where('is_hot=1')->order('goods_id desc')->limit('0,4')->select();
        $this->assign('hot',$hot);
    	$this->display(); 
    }
}