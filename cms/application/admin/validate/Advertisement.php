<?php
# @Author: huang longpan <huangpan>
# @Date:   2019-03-08T18:52:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-16T10:33:39+08:00

namespace app\admin\Validate;
use think\Validate;
class Advertisement extends Validate
{
    protected $rule = [
		'name' 	=> 	'require|max:60|unique:ad',
		'static'	=>	'require|in:1,0',
	];

	protected $message = [
		'name.require'=>'请输入广告名称',
        'name.max'=>'广告名称过长',
        'name.unique'=>'广告名称已存在，请重新输入',
        'static.require'=>'请选择广告开启状态',
        'static.in'=>'广告开启状态格式不正确',
	];

	protected $scene = [
		'add'	 => ['name','static'],
		'edit'	 => ['name','static'],
	];

}
