<?php

/**
 * @Author: lee li
 * @Date:   2017-12-09 09:36:14
 * @Last Modified by:   lee li
 * @Last Modified time: 2017-12-09 09:58:33
 */

namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	public $_validate=array(
		array('username','3,9','名字格式不正确','1','length',3),
		array('email','email','邮箱格式不正确','1','',3),
		array('password','3,18','密码格式不正确','1','length',3),
		array('repwd','password','两次密码不一致','1','confirm',3),
		array('username','','用户名已经存在了','1','unique',3),

	);
}