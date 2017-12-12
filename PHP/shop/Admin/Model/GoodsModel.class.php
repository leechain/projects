<?php

/**
 * @Author: lee li
 * @Date:   2017-12-05 16:02:49
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-12 09:45:27
 */

namespace Admin\Model;
use Think\Model\RelationModel;

class GoodsModel extends RelationModel{
	public $_link=array(
		'comment'=>self::HAS_MANY,
	);

	//过滤，不在这里面的字段，不往数据库添加，将被自动过滤
	public $insertFields='goods_name,goods_sn';

	// 自动填充
	public $_auto=array(
		array('add_time','time',3,'function'),
	);

	// 验证
	protected $_validate=array(
		array('goods_name','3,12','你这个傻子，名字不对！','1','length','3'),
		array('goods_sn','','你这个傻子，货号不对！','1','unique','3'),
		array('shop_price','pr','shop_price错了','1','callback','3'),
	);

	public function pr(){
		return true;
	}
}