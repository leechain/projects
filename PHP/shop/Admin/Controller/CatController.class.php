<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {
    public function cateadd(){
    	if(IS_POST){//如果有数据提交
    		$catModel=D('Cat');
    		if($catModel->add($_POST)){
                $this->redirect('admin/cat/catelist');
                exit;
            };
    	}

    	// else{
    	// 	echo 2;
    	// 	exit;
    	// }

    	// 无论提不提交数据都要显示这个页面
        $this->display();
    }

    public function catelist(){
        $catModel=D('Cat');

        $cat=S('cat');//取缓存
        if(!$cat){
            echo 1;
            $cat=$catModel->gettree();
            // S('cat',$cat,3);

        }

        $this->assign('catlist',$cat);
        $this->display();
    }

     public function cateedit(){
        $catModel=D('Cat');

        if(IS_POST){//如果有数据提交
            $catModel=D('Cat');
            $cat_id=I('cat_id');

            if($catModel->where('cat_id='.$cat_id)->save($_POST)){
                $this->redirect('admin/cat/catelist');
                exit;
            };
        }

        $this->assign('gettree',$catModel->gettree());
        $this->assign('catinfo',$catModel->find(I('cat_id')));
        $this->display();
    }

    public function catedel(){
        $catModel=D('Cat');
        if($catModel->delete(I('get.cat_id'))){
            $this->redirect('admin/cat/catelist');
            exit;
        };
    }
}