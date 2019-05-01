<?php
namespace app\admin\Validate;
use think\Validate;
class Conf extends Validate
{
    protected $rule = [
		'cname' => 'require|max:60|unique:conf',
		'ename' => 'require|max:60|alphaDash|unique:conf',
		'dt_type'=>'require|in:1,2,3,4,5,6',
		'cf_type'=>'require|in:1,2,3',	
		'values' => 'max:255',
	];

	protected $message = [
		'cname.require' => '名称为必填',
		'cname.max'     => '名称最多不能超过60个字符',
		'cname.unique'  => '中文名称不得重复',
		'ename.require' => '英文名称为必填',
		'ename.max'     => '名称最多不能超过60个字符',
		'ename.alphaDash'   => '英文名称必须为英文',
		'ename.unique'  => '英文名称不得重复',
		'dt_type.requir'=> '配置类型为必选',
		'dt_type.in'    => '配置类型不存在',
		'cf_type.requir'=> '配置分类为必选',
		'cf_type.in'    => '配置分类不存在',
		'values.max'    => '可选值最长不得超过255个字符',
	];

	protected $scene = [
		'add' => ['cname','ename','dt_type','cf_type','values'],
		'edit' => ['cname','ename','dt_type','cf_type','values'],
	];

}