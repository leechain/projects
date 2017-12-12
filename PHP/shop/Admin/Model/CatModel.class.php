<?php

/**
 * @Author: lee li
 * @Date:   2017-12-05 10:17:31
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-12 13:04:22
 */

namespace Admin\Model;
use Think\Model;

class CatModel extends Model{
	// public function gettree($p=0){
	// 	$info=$this->select();//取出数据库所有数据

	// 	$tree=array();
	// 	foreach ($info as $k => $v) {
	// 		$tree=$v;
	// 		if($v['parent_id']==$p){
	// 			$this->gettree($v['cat_id']);
	// 		}
	// 		return ?
	// 	}
		
	// }

	public function gettree($p=0,$lv=0){
		//一层又一层递归循环
		$t=array();
		foreach ($this->cache(true)->select() as $k => $v) {
			if($v['parent_id']==$p){
				$v['lv']=$lv;
				$t[]=$v;
				//检查，递归调用
				$t=array_merge($t,$this->gettree($v['cat_id'],$lv+1));
			}
		}
		return $t;
	}

}