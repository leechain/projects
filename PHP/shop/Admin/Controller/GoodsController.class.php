<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public $gm;
	public function __construct(){
		parent::__construct();
		$this->gm=D('goods');
	}

    public function goodsadd(){
    	if(IS_POST){
    		if(!$this->gm->create($_POST)){
    			echo $this->gm->getError();
    			exit;
    		}


    		$upload=new \Think\Upload(); //实例化上传类
    		$upload->maxSize=2145728; //设置附件上传大小
    		$upload->exts=array('jpg','gif','png','jpeg'); //设置附件上传类型
    		$upload->rootPath='./Upload/'; // 设置附件上传根目录
    		$upload->savePath='./'; //设置附件上传（子）目录

    		//上传文件
    		$info=$upload->upload();
    		if(!$info){//上传错误提示错误信息
    			$this->error($upload->getError());
    		}else{//上传成功
    			$img_path1='./Upload/'.$info['goods_img']['savapath'];
    			$img_path2=$info['goods_img']['savename'];

    			//生成缩略图，这里有问题！！！
    			$image=new \Think\Image();
    			$image->open($img_path1.$img_path2);
    			// 按照原图的比例生成一个最大为230*230的缩略图并保存为thumb.jpg
    			$img_xiao='./Upload/thumb/'.$img_path2;
    			$image->thumb(230,230)->save($img_xiao);
    			$this->gm->thumb_img=$img_xiao;

    			$this->gm->goods_img=$img_path1.$img_path2;


    			// var_dump($info);
    			// $this->success('上传成功！');
    		}


    		echo $this->gm->add()?'1':'0';
    	}
       $this->display();
    }

    public function goodslist(){
    	
    	$p = I('p')?I('p'):1;//默认第一页
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $list = $this->gm->cache(true)->order('goods_id')->page($p.',2')->select();
        $this->assign('list',$list);// 赋值数据集
        $count      = $this->gm->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // var_dump($show);//显示页码
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板


    	// $this->assign('list',$this->gm->select());
    	// $this->display();
    }

    public function del(){
    	$this->gm->delete(I('get.goods_id'));
    	$this->redirect('admin/goods/goodslist');
    }
}