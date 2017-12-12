<?php

/**
 * @Author: lee li
 * @Date:   2017-12-10 15:38:39
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-11 12:58:03
 */

namespace Home\Tool;


abstract class ACartTool {
 /**
 * 向购物车中添加1个商品
 * @param $goods_id int ࠟߝid
 * @param $goods_name String ࠟݷߝ
 * @param $shop_price float հ໒
 * @return boolean
 */
 abstract public function add($goods_id,$goods_name,$shop_price);
 /**
 * 减少购物中1个商品的数量，如果减至0，则从购物车删除此商品
 * @param $goods_id int ࠟߝid
 */
 abstract public function decr($goods_id);
 /**
 * 列出购物车所有的商品
 * @param $goods_id ࠟߝid
 */
 abstract public function del($goods_id);
 /**
 * 从购物车删除某商品
 * @return Array
 */
 abstract public function items();
 /**
 * 返回购物车中有几种商品
 * @return int
 */
 abstract public function calcType();
 /**
 * 返回购物中商品的个数
 * @return int
 */
 abstract public function calcCnt();
 /**
 * 返回购物车中商品的总价格
 * @return float
 */
 abstract public function calcMoney();
 /**
 * 清空购物车
 * @return void
 */
 abstract public function clear();
}



class AddTool extends ACartTool{
	public $item=array();
	public static $ins=null;
	public static function getIns(){
		if(self::$ins==null){
			self::$ins=new self();
		}
		return self::$ins;
	}

	final protected function __construct(){
		$this->item=session('?kache')?session('kache'):array();
	}

	/**
	 * 向购物车中添加1个商品
	 * @param $goods_id int ࠟߝid
	 * @param $goods_name String ࠟݷߝ
	 * @param $shop_price float հ໒
	 * @return boolean
	 */
	 public function add($goods_id,$goods_name,$shop_price){
	 	if($this->item[$goods_id]){
	 		$this->item[$goods_id]['num']+=1;
	 	}else{
		 	$goods['goods_name']=$goods_name;
		 	$goods['shop_price']=$shop_price;
		 	$goods['num']=1;
		 	$this->item[$goods_id]=$goods;
	 	}

	 }
	 /**
	 * 减少购物中1个商品的数量，如果减至0，则从购物车删除此商品
	 * @param $goods_id int ࠟߝid
	 */
	 public function decr($goods_id){
	 	if($this->item[$goods_id]){
	 		$this->item[$goods_id]['num']-=1;
	 	}
	 	if($this->item[$goods_id]['num']<=0){
	 		$this->del($goods_id);
	 	}
	 }
	 /**
	 * 列出购物车所有的商品
	 * @param $goods_id ࠟߝid
	 */
	 public function del($goods_id){
	 	unset($this->item[$goods_id]);
	 }
	 /**
	 * 从购物车删除某商品
	 * @return Array
	 */
	 public function items(){
	 	return $this->item;
	 }
	 /**
	 * 返回购物车中有几种商品
	 * @return int
	 */
	 public function calcType(){
	 	return count($this->item);
	 }
	 /**
	 * 返回购物中商品的个数
	 * @return int
	 */
	 public function calcCnt(){
	 	$n=0;
	 	foreach ($this->item as $k => $v) {
	 		$n+=$v['num'];
	 	}
	 	return $n;
	 }
	 /**
	 * 返回购物车中商品的总价格
	 * @return float
	 */
	 public function calcMoney(){
	 	$n=0;
	 	foreach ($this->item as $k => $v) {
	 		$n+=$v['num']*$v['shop_price'];
	 	}
	 	return $n;
	 }
	 /**
	 * 清空购物车
	 * @return void
	 */
	 public function clear(){
	 	$this->item=array();
	 }

	 public function __destruct(){
	 	session('kache',$this->item);
	 }
}
