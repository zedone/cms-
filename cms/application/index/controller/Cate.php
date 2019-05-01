<?php

/**
 * @Author: Huang LongPan
 * @Date:   2019-03-24 19:11:30
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-27 19:20:08
 */
namespace app\index\controller;

/**
 * 
 */
class Cate extends Common
{
	public function index($id){
		$cates=db('cate')->find($id);
		$this->assign([
			'cates'=>$cates,
		]);
		$cateTmp=$cates['list_tmp'];
		$fetch=$this->confTemp.'/'.$cateTmp;
		
		//查询当前栏目及其子栏目下的所有文章信息分配给模板
		$arr=model('Index')->childrenn($id);
		foreach ($arr as $k => $v) {
			$ids[]=$v['id'];
		}
		$ids[]=(int)$id;
		$artRes=db('archives')->whereIn('cate_id',$ids)->select();
		$this->assign('artRes',$artRes);

		//获取左侧菜单栏
		$this->leftcate($cates['pid'],$id);

		//顶部菜单栏的高亮显示
		$topstatic=$this->topid($id);
		$this->assign('top',$topstatic);

		//获取当前栏目的位置信息
		$this->now($id);
		// dump($aaa);die;

		return $this->fetch($fetch);
	}
}