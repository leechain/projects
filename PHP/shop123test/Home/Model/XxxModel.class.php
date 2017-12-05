<?php

/**
 * @Author: lee li
 * @Date:   2017-12-04 10:37:19
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-04 19:52:02
 */

namespace Home\Model;
use Think\Model;

class XxxModel extends Model{
	public function papa(){
		$arr=array('name'=>'zhangsan','age'=>11,'sex'=>'man');
		$a = $this->add($arr);
		return $a;
	}
}