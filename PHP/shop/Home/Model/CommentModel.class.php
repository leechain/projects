<?php

/**
 * @Author: lee li
 * @Date:   2017-12-12 08:40:09
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-12 09:39:09
 */

namespace Home\Model;
use Think\Model\RelationModel;

class CommentModel extends RelationModel{
	public $_validate=array(
		array('content','6,200','请输入评论数在6-200位字符','1','length','3'),
	);
}