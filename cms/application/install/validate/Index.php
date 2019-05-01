<?php
# @Author: huang longpan <huangpan>
# @Date:   2019-03-08T18:52:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T20:51:33+08:00

namespace app\install\Validate;
use think\Validate;
class Index extends Validate
{
    protected $rule = [
		'site_name' 	=> 	'require',
		'admin' 	=> 	'require|checkName:',
		'password' 	=> 	'require|confirm:rpassword|checkName:',
		'rpassword' 	=> 	'require',

		'hostname'=> 	'require',
		'database'=> 	'require',
		'username'=> 	'require',
		'password'=> 	'require',
		'prefix'=> 	'require',
		'hostport'=> 	'require',
	];

	protected $message = [
		'site_name.require'=> '信息不完整',

		'admin.require'=> '信息不完整',
		'admin.checkName'=> '账号格式不正确',
		'password.require'=> '信息不完整',
		'password.checkName'=> '密码格式不正确',
		'password.confirm'=>'两次密码不一致',
		'rpassword.require'=> '信息不完整',

		'hostname.require,database.require,username.require,password.require,prefix.require,hostport.require'=>'信息不完整',
		
	];
	//自定义验证规则
	protected function checkName($value,$rule)
	{
		if(preg_match('/^[a-zA-Z0-9_-]{5,10}$/',$value)){
			return true;
		}else{
			return false;
		}
		// return $rule == $value ? true : '名称错误';
	}

	protected $scene = [
		'admin'	 => ['site_name','admin','password','rpassword'],
		'hostname.require,database.require,username.require,password.require,prefix.require,hostport.require'=>'信息不完整',
		'db'	 => ['hostname','database','db_user','password','prefix','hostport'],
	];

}
