<?php

/**
 * @Author: Huang LongPan
 * @Date:   2019-03-26 20:38:01
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-27 19:34:51
 */
namespace app\index\model;
use think\Model;

/**
 * 
 */
class Index extends Model
{
	//关于我们
	public function aboutUs(){
		$cates=db('cate')->field('content')->find('72');
		$content=strip_tags($cates['content']);
		$content=cut_str($content,40);

		return $content;
	}

	//技术服务
	public function technology(){
		$cates=db('cate')->field('content')->find('76');
		$content=strip_tags($cates['content']);
		$content=cut_str($content,40);

		return $content;	
	}

	//公司新闻
	public function journalism(){
		$cates=db('archives')->field('id,title,description,time')->where('cate_id','78')->order('time desc')->limit(1)->find();
		$content=strip_tags($cates['description']);
		$content=cut_str($content,40);

		$data['id']=$cates['id'];
		$data['title']=$cates['title'];
		$data['time']=$cates['time'];
		$data['description']=$content;

		return $data;
	}

	//产品中心
	public function product(){
		$children=$this->childrenn(75);
		foreach ($children as $k => $v) {
			$arr[]=$v['id'];
		}
		$arr[]=(int)75;
		
		$data=db('archives')->field('id,title,litpic')->whereIn('cate_id',$arr)->limit(10)->select();
		// dump($data);
		return $data;
	}

	//查询当前栏目下的所有子栏目
	public function childrenn($id){
		$data=db('cate')->field('id,pid')->select();
		// return $data;
		return $this->_childrenn($id,$data);
	}

	//遍历获取产品中心下所有子产品的id
	public function _childrenn($id,$data){
		static $arr=array();
		foreach ($data as $k => $v){
			if($id==$v['pid']){
				$arr[]=$v;
				$this->_childrenn($v['id'],$data);
			}
		}
		return $arr;

	}


	//首页轮播图广告
	public function inner($id){
		$ad=db('ad')->field('img,link')->where(['adid'=>$id,'static'=>'1'])->order('sort desc')->select();
		// dump($ad);
		return $ad;
	}
}