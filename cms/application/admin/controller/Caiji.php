<?php
namespace app\admin\controller;
use QL\QueryList;
class Caiji extends Common
{

    public function index()
    {
       //采集某页面所有的超链接
       $url = 'http://mobile.csdn.net/';
		// 定义采集规则
		$rules = [
		    // 采集文章标题
		    'title' => ['.clearfix h2','text'],
		    // 采集文章作者
		    'author' => ['.name a','text'],
		    // 采集文章内容
		    'content' => ['.list_con','text'],
		    'time'   =>['.time dd','html']
		];
		$rt = QueryList::get($url)->rules($rules)->query()->getData();

		print_r($rt->all());
	}

	public function lst()
    {
       //采集某页面所有的超链接
       $url = 'http://yispace.net/category/philosophy-life';
		// 定义采集规则
		$rules = [
		    // 采集文章标题
		    'title' => ['.excerpt-tit a','text'],
		    'titleurl' => ['.excerpt-tit a','href'],
		    // 采集文章内容
		    'content' => ['.excerpt-tit','text'],
		    'time'   =>['.excerpt-time','text'],
		    'imgurl'   =>['.pic img','src'],
		];
		$rt = QueryList::get($url)->rules($rules)->query()->getData();

		print_r($rt->all());
		    }

}