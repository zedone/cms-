<?php

/**
 * @Author: Huang LongPan
 * @Date:   2018-11-11 21:33:01
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2018-12-02 18:33:30
 */
namespace app\admin\Validate;
use think\Validate;
class ModelField extends Validate
{
    protected $rule = [
    	'model_id'  	=>	'require|gt:0',
		'field_cname' 	=> 	'require|max:60|unique:model_field',
		'field_ename'	=>	'require|max:60|unique:model_field|notIn:aid,id,title,keywords,description,writer,source,litpic,attr,content,time,model_id,cate_id,click',
		'field_type'	=>	'require|in:1,2,3,4,5,6,7,8,9',
	];

	protected $message = [
		'model_id.require'		=> '请选择模型',
		'model_id.max' 			=> '请选择正确的模型',
		'field_cname.require' 	=> '请输入字段中文名',
		'field_cname.max'		=> '字段中文名最长不得超过60个字符',
		'field_cname.unique' 	=> '该字段中文名已存在',
		'field_ename.require' 	=> '请输入字段英文名',
		'field_ename.max'  		=> '字段英文名不得超过60个字符',
		'field_ename.unique'	=> '该字段英文名已存在，请重新输入',
		'field_ename.notIn'		=> '该字段英文名已存在，请重新输入',
		'field_type.require'	=> '请选择字段类型',
		'field_type.in'			=> '请选择正确的字段类型',
	];

	protected $scene = [
		'add'	 => ['model_id','field_cname','field_ename','field_type'],
		'edit'	 => ['field_cname','field_ename','field_type'],
	];

}