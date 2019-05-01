<?php
namespace app\admin\Validate;
use think\Validate;
class Model extends Validate
{
    protected $rule = [
		'model_name' 	=> 	'require|max:50|unique:model',
		'table_name'	=>	'require|max:50|unique:model|notIn:cate,conf,model,model_field,archives',
		'state'			=>	'require|in:0,1',
	];

	protected $message = [
		'model_name.require'=> '模型名称为必填',
		'model_name.max' 	=> '模型名称最长不能超过50个字符',
		'model_name.unique' => '模型名称不能重复',
		'table_name.require'=> '附加表名为必填',
		'table_name.max' 	=> '附加表名最长不能超过50个字符',
		'table_name.unique' => '附加表名不能重复',
		'table_name.notIn'  => '无法使用该附加表名',
		'state.require'		=> '请选择开启状态',
		'state.in'			=> '开启状态不正确'

	];

	protected $scene = [
		'add'	 => ['model_name','table_name','state'],
		'edit'	 => ['model_name','table_name','state'],
	];

}