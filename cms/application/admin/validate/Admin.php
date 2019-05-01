<?php
# @Author: huang longpan <huangpan>
# @Date:   2019-03-08T18:52:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T20:51:33+08:00

namespace app\admin\Validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
		'username' 	=> 	'require|max:60|unique:admin',
		'password'	=>	'require|min:6',
        'groupid' =>'require|number'
	];

	protected $message = [
		'username.require'=> '用户名为必填',
		'username.max' 	=> '用户名最长不能超过50个字符',
        'username.unique' => '用户名不能重复',
		'password.require'=> '密码为必填',
		'password.min' 	=> '密码过短',
        'group_id.require'=>'所属用户组必填',
        'group_id.number'=>'所属用户组格式不正确',
	];

	protected $scene = [
		'add'	 => ['name','password','groupid'],
		'edit'	 => ['name','password'=>'min','groupid'],
	];

}
