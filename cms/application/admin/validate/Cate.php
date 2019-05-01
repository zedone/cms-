<?php
namespace app\admin\Validate;
use think\Validate;
class Cate extends Validate
{
    protected $rule = [
		'catename' => 'require|max:60|unique:cate',
		'title' => 	'require|max:60|unique:cate',
		'keyword'=>	'max:150',
		'desc'=>	'max:255',	
		'list_tmp' => 'require|max:60',
		'article_tmp'=>'require|max:60',
		'index_tmp'=>'require|max:60',
		'pid'=>'require|number',
		'model_id'=>'require|number',
	];

	protected $message = [
		'catename.require'=>'栏目名称不能为空',
		'catename.max'=>'栏目名称最长不能超过60个字符',
		'catename.unique'=>'栏目名称不能重复',
		'title.require'=>'栏目标题不能为空',
		'title.max'=>'栏目标题最长不能超过60个字符',
		'title.unique'=>'栏目标题不能重复',
		'keyword.max'=>'关键词最长不能超过150个字符',
		'desc.max'=>'描述最长不能超过255个字符',
		'list_tmp.require'=>'请输入列表模板',
		'list_tmp.max'=>'列表模板字符最长不能超过60个字符',
		'article_tmp.require'=>'请输入内容页模板',
		'article_tmp.max'=>'内容页模板字符最长不能超过60个字符',
		'index_tmp.max'=>'频道页模板字符最长不能超过60个字符',
		'index_tmp.require'=>'请输入频道页模板',
		'pid.require'=>'请选择上级栏目',
		'pid.number'=>'请选择正确的上级栏目',
		'model_id.require'=>'请选择所属模型',
		'model_id.number'=>'请选择正确的所属模型',

	];

	protected $scene = [
		'add' => ['catename','title','keyword','desc','list_tmp','article_tmp','index_tmp','pid','model_id'],
		'add' => ['catename','title','keyword','desc','list_tmp','article_tmp','index_tmp','pid','model_id'],
	];

}