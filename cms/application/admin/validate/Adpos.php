<?php
# @Author: huang longpan <huangpan>
# @Date:   2019-03-08T18:52:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-09T16:41:01+08:00

namespace app\admin\Validate;
use think\Validate;
class Adpos extends Validate
{
    protected $rule = [
		'name' 	=> 	'require|max:60|unique:adpos',
		'width'	=>	'require|max:4|integer',
        'height'=>	'require|max:4|integer',
	];

	protected $message = [
		'name.require'=> '广告名称为必填',
		'name.max' 	=> '模型名称最长不能超过50个字符',
        'name.unique' => '模型名称不能重复',
		'width.require'=> '宽度为必填',
		'width.max' 	=> '宽度过长',
        'width.integer' => '宽度格式错误',
		'height.require'  => '高度为必填',
		'height.max'		=> '高度过长',
		'height.integer'	=> '高度格式错误'

	];

	protected $scene = [
		'add'	 => ['name','width','height'],
		'edit'	 => ['name','width','height'],
	];

}
