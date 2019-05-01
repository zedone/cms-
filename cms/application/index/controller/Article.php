<?php

/**
 * @Author: Huang LongPan
 * @Date:   2019-03-25 20:46:02
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-27 19:32:19
 */
namespace app\index\controller;

/**
 * 
 */
class Article extends Common
{
	
	public function index($id){
		$article=db('archives')->alias('a')->join('cate b','a.cate_id=b.id')->field('a.id,a.title,a.content,a.time,a.cate_id,b.catename,cate_attr,list_tmp,article_tmp,index_tmp')->find($id);
		$this->assign('archives',$article);

		$cates=db('cate')->find($article['cate_id']);
		$this->assign([
			'cates'=>$cates,
		]);

		//菜单栏的高亮
		$topstatic=$this->topid($article['cate_id']);
		$this->assign('top',$topstatic);


		//获取左侧菜单栏
		$this->leftcate($article['cate_id'],$article['cate_id']);


		//获取当前栏目的位置信息
		$this->now($article['cate_id']);

		return $this->fetch($this->confTemp.'/article_article.html');
	}
}